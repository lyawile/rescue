<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Bills Controller
 *
 * @property \App\Model\Table\BillsTable $Bills
 *
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $bills = $this->paginate($this->Bills);
        var_dump($this->Auth->user());
//        var_dump($_SESSION);
//        exit();
        $this->set(compact('bills'));
    }

    /**
     * View method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $bill = $this->Bills->get($id, [
            'contain' => ['BillItems', 'Payments']
        ]);

        $this->set('bill', $bill);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $payerDetails = $this->request->getSession()->read('candfee');
        // grab the session values for the payer
        $requestId = @$payerDetails['reqid'];
        $payer_name = @$payerDetails['fullname'];
        $payer_mobile = @$payerDetails['phone'];
        $payer_email = @$payerDetails['email'];
        $exam_type = @$payerDetails['examid'];
        $numberOfCands = $payerDetails['count']; // this is equal to the quantity in billing
        $services = TableRegistry::getTableLocator()->get('collections');
        //var_dump($payerDetails); exit;
        if (isset($payer_name) && !empty($payer_name) && isset($exam_type) && !empty($exam_type)) {
            $services = $services->find('all', array('fields' => array('amount', 'name', 'id')))->where(['exam_type_id' => $exam_type, 'is_current' => 1]);
            foreach ($services as $serv) {
                $amountForRequestedService = $serv->amount;
                $requestedServiceName = $serv->name;
                $requestedServiceId = $serv->id;
            }
        } else {
            $services = $services->find('list')
                    ->where(['exam_type_id in' => array(10)]);
            // Only for dubbugging, will be removed or adjusted later
            foreach ($services as $d) {
                $x[] = $d;
            }
            $this->loadModel('collections');
            foreach ($x as $serviceName) {
                $serviceNew = $this->collections->find('all', array('fields' => array('amount', 'name', 'id')))
                        ->where(['exam_type_id in' => array(10), 'name' => $serviceName]);
                foreach ($serviceNew as $t) {
                    $serviceAmount[] = $t->amount;
                }
            }
            // get the exact amount for the collection
//            echo "<br><br>";
        }
//        $services = $services->find('list')->select(['id', 'name', 'amount']);
//        $bill = $this->Bills->newEntity();
//        $billItem = $this->loadModel('BillItems');
//        $collections = $this->loadModel('Collections');
        if (isset($payer_name) && !empty($payer_name) && isset($exam_type) && !empty($exam_type)) {
            $switcher = 1;
//           return $this->redirect(['action' => 'verifyBill']);
            $this->set(compact(['payer_name', 'payer_mobile', 'payer_email', 'amount', 'numberOfCands', 'switcher', 'amountForRequestedService', 'requestedServiceName', 'requestedServiceId', 'requestId']));
// unset all the session values of the payer except the request id
            $this->request->session()->delete('candfee.examid');
            $this->request->session()->delete('candfee.fullname');
            $this->request->session()->delete('candfee.phone');
            $this->request->session()->delete('candfee.email');
        }
        if ($this->request->is('post') && $exam_type <> 10) {
            // create bill
            $this->createBill();
        }

        if ($this->request->is('post')) {
            // create bill
            $this->createBill();
        }
        $this->set(compact('services', 'serviceAmount'));
    }

    public function getBill() {
        // get the customer details for a supplied bill id through the session
        $billIdentification = $this->request->getSession()->read('bill');
        $billGeneratedBy = $this->request->getSession()->read('Auth.User.first_name') . " " . $this->request->getSession()->read('Auth.User.surname');
        $queryDetails = $this->Bills->find();
        $queryDetails->innerJoinWith('BillItems', function($data) {
            $billIdentification = $this->request->session()->read('bill');
            return $data->where(['Bills.id' => $billIdentification]);
        });
        $this->loadModel('BillItems');
        $this->loadModel('Collections');
        $this->loadModel('CollectionCategories');

        $billDetails = $this->BillItems->find('all', ['contain' => 'Collections'])
                ->select(['BillItems.amount', 'BillItems.quantity', 'BillItems.unit', 'Collections.name', 'Collections.amount', 'Collections.collection_categorie_id'])
                ->where(['BillItems.bill_id' => $billIdentification]);
        // read total from the bill
        $queryTotal = $this->Bills->find()->select('amount')->where(['id' => $billIdentification]);
        foreach ($queryTotal as $queryT) {
            $totalAmount = $queryT['amount'];
        }
        $this->set(compact('queryDetails', 'billDetails', 'totalAmount'));
        // prepare data for adding into the XML file
        //Query bill details
        foreach ($queryDetails as $customerDetails) {
            $billGeneratedDate = $customerDetails['generated_date'];
//            $billExpireDate = $customerDetails['expire_date'];
            $billExpireDate = '2019-01-01';
            $payerMobileNumber = $customerDetails['payer_mobile'];
            $payerName = $customerDetails['payer_name'];
            $payerEmail = $customerDetails['payer_email'];
        }
        // query bill items into xml format for gepgBillSubReq
        $data = '';
        foreach ($billDetails as $billData) {
            $amount = $billData['collection']['amount'] * $billData['quantity'];
            $collectionCategoryId = $billData['collection']['collection_categorie_id'];
            $collectionsC = $this->CollectionCategories->find()->select(['gfscode'])->where(['id' => $collectionCategoryId]);
            foreach ($collectionsC as $collectionCategoryRes) {
                $gfsCode = $collectionCategoryRes->gfscode;
            }
            $data .= '<BillItem>'
                    . '<BillItemRef>788578851</BillItemRef>'
                    . '<UseItemRefOnPay>N</UseItemRefOnPay>'
                    . '<BillItemAmt>' . $amount . '</BillItemAmt>'
                    . '<BillItemEqvAmt>'.$amount.'</BillItemEqvAmt>'
                    . ' <BillItemMiscAmt>' . $amount . '</BillItemMiscAmt>'
                    . '<GfsCode>' . trim($gfsCode) . '</GfsCode>'
                    . '</BillItem>';
        }

        $billGenDateObj = date_create($billGeneratedDate);
        $billGeneratedDate = date_format($billGenDateObj, "c");
        $billExpireDateObj = date_create($billExpireDate);
        $billExpireDate = date_format($billExpireDateObj, "c");
        //xml request to GEPG
        $gepgBillSubReq = "<gepgBillSubReq>
    <BillHdr>
        <SpCode>SP110</SpCode>
        <RtrRespFlg>true</RtrRespFlg>
    </BillHdr>
    <BillTrxInf>
        <BillId>$billIdentification</BillId>
        <SubSpCode>1002</SubSpCode>
        <SpSysId>TNECTA001</SpSysId>
        <BillAmt>$totalAmount</BillAmt>
        <MiscAmt>$totalAmount</MiscAmt>
        <BillExprDt>$billExpireDate</BillExprDt>
        <PyrId>Samizi</PyrId>
        <PyrName>$payerName</PyrName>
        <BillDesc>Bill Number 7885</BillDesc>
        <BillGenDt>$billGeneratedDate</BillGenDt>
        <BillGenBy>$billGeneratedBy</BillGenBy>
        <BillApprBy>Hashim</BillApprBy>
        <PyrCellNum>$payerMobileNumber</PyrCellNum>
        <PyrEmail>$payerEmail</PyrEmail>
        <Ccy>TZS</Ccy>
        <BillEqvAmt>$totalAmount</BillEqvAmt>
        <RemFlag>true</RemFlag>
        <BillPayOpt>1</BillPayOpt>
        <BillItems>" . $data . " </BillItems>
    </BillTrxInf>
</gepgBillSubReq>";
//         instantiate the object for sending XML
        $xmlSend = new EpayController();
        $xmlSend->gepgrequest($gepgBillSubReq);
//        FOR DEBUGGING, DON'T REMOVE COMMENTS BELOW FOR NOW
//        var_dump($test) ;
//
//        echo '<xmp>';
//        var_dump($test);
//        echo '</xmp>';
//         echo '<xmp>';
//        var_dump($gepgBillSubReq);
//        echo '</xmp>';
//        exit();
        //xml for acknowledgement
        // possible values for TrxStsCode = 7101 is successful, 7242 is failed - Bill content irregular,
        // 7201 is failed - General Error
        $gepgBillSubReqAck = "<gepgBillSubReqAck>
                                <TrxStsCode>7101</TrxStsCode>
                              </gepgBillSubReqAck>";
        // xml for response from GePG
        // possible values for TrxSts are GF - GePG failure and GS - GePG Success
        $gepgBillSubResp = "<gepgBillSubResp>
                                <BillTrx>
                                    <BillId>7885</BillId>
                                    <TrxSts>GF</TrxSts>
                                    <PayCntrNum>0</PayCntrNum>
                                    <TrxStsCode>7242;7627</TrxStsCode >
                                </BillTrx >
                            </gepgBillSubResp>";
        // xml for Bill Submission Response Acknowledgement
        $gepgBillSubRespAck = "<gepgBillSubRespAck>
                                    <TrxStsCode>7101</TrxStsCode>
                               </gepgBillSubRespAck>";
        // XML FOR PAYMENT STARTS HERE
        // GePG Payment Information posting
        $gepgPmtSpInfo = "<gepgPmtSpInfo>
                                    <PymtTrxInf>
                                                <TrxId></TrxId>
                                                <SpCode></SpCode>
                                                <PayRefId></PayRefId>
                                                <BillId></BillId>
                                                <PayCtrNum></PayCtrNum>
                                                <BillAmt></BillAmt>
                                                <PaidAmt></PaidAmt>
                                                <BillPayOpt></BillPayOpt>
                                                <CCy></CCy>
                                                <TrxDtTm></TrxDtTm>
                                                <UsdPayChnl></UsdPayChnl>
                                                <PyrCellNum></PyrCellNum>
                                                <PyrName></PyrName>
                                                <PyrEmail></PyrEmail>
                                                <PspReceiptNumber></PspReceiptNumber>
                                                <PspName></PspName>
                                                <CtrAccNum></CtrAccNum >
                                    </PymtTrxInf>
                                    </gepgPmtSpInfo>";
        // GePG Payment Information posting Acknowledgement
        $gepgPmtSpInfoAck = "<gepgPmtSpInfoAck>
                                 <TrxStsCode>7101</TrxStsCode>
                            </gepgPmtSpInfoAck>";

        // send the request
    }

    /**
     * Edit method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bill = $this->Bills->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bill = $this->Bills->patchEntity($bill, $this->request->getData());
            if ($this->Bills->save($bill)) {
                $this->Flash->success(__('The bill has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill could not be saved. Please, try again.'));
        }
        $this->set(compact('bill'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bill id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bill = $this->Bills->get($id);
        if ($this->Bills->delete($bill)) {
            $this->Flash->success(__('The bill has been deleted.'));
        } else {
            $this->Flash->error(__('The bill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function createBill() {
        $postedData = $this->request->getData();
        $bill = $this->Bills->newEntity();
        $billItem = $this->loadModel('BillItems');
        $collections = $this->loadModel('Collections');
        $bill = $this->Bills->patchEntity($bill, $postedData);
        $bill->reference = 'NECTA' . date("Y") . date("mdhis", time()); // assumed reference number, will be changed later on consensus
        $bill->amount = 0; // not right place just fix amount for now
        $bill->equivalent_amount = 0;
        $bill->misc_amount = 0;
        $bill->expire_date = '2018-12-01'; // assumed
        $bill->generated_date = date("Y-m-d");
        $bill->has_reminder = 0;
        $totalAmount = 0;
        if ($t = $this->Bills->save($bill)) {
            $bill_id = $t->id;
            for ($i = 0; $i < count($postedData['collection_id']); $i++) {
                $collectionId = $postedData['collection_id'][$i];
                // get the service amount
//                        $collectionsData = $collections->find()->where(["id" => $collectionId]);// old
                // get the current amount for a requested service
                $data = $collections->find('all', array('fields' => array('amount')))
                        ->where(["id" => $collectionId]);
                foreach ($data as $data) {
                    $amount = $data->amount;
                }
                $quantity = $postedData['quantity'][$i];
                $bill_item = $billItem->newEntity();
                $bill_item_var = $billItem->patchEntity($bill_item, $postedData);
                $bill_item_var->bill_id = $bill_id; // last inserted bill id
                $bill_item_var->detail = "Test details";
                $bill_item_var->amount = $amount * $quantity; // testing
                $bill_item_var->misc_amount = $amount * $quantity;
                $bill_item_var->equivalent_amount = $amount * $quantity;
                $bill_item_var->unit = "Each";
                $bill_item_var->collection_id = $collectionId;
                $bill_item_var->quantity = $quantity;
//                    debug($bill_item_var);
                // get the amount of money that a customer needs to pay by summing up the services cost he has selected
                $totalAmount += $amount * $quantity;
                $bill_item_data = $billItem->save($bill_item_var);
                $bill_item_id_last = $bill_item_data->id;
                $this->request->session()->write('billItemId', $bill_item_id_last);
                // instantiate the candidate object
                $candidates = new EpayController();
                $billItemId = $this->request->session()->read('billItemId');
                $requestId = $this->request->session()->read('candfee')['reqid'];
                if (!empty($requestId) && isset($requestId)) {
                    $candidates->paidcands($requestId, $billItemId);
                }
            }
            // Update the amount on Bills table
            $query = $this->Bills->query();
            $query->update()
                    ->set(['amount' => $totalAmount, 'equivalent_amount' => $totalAmount, 'misc_amount' => $totalAmount])
                    ->where(['id' => $bill_id])
                    ->execute();
            $this->Flash->success(__('The bill has been saved.'));
            $this->request->session()->write('bill', $bill_id);
            return $this->redirect(['action' => 'getBill']);
        } // end of the loop to iterate through each service added by the user

        $this->Flash->error(__('The bill could not be saved. Please, try again.'));
    }

}
