<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Setasign\Fpdf;

date_default_timezone_set('Africa/Nairobi');

/**
 * Bills Controller
 *
 * @property \App\Model\Table\BillsTable $Bills
 *
 * @method \App\Model\Entity\Bill[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillsController extends AppController {
    // Allowing the action to be ignored in authentication
//    public function initialize() {
//        parent::initialize();
//        $this->Auth->allow(['pay']);
//                
//    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // get the login username 
        $currentLoggedInUser = $this->request->getSession()->read('Auth.User.username');
        // check if the user is admin, if he is, show all bills otherwise show only bills related to user
        $currentLoggedInUserPrivillege = $this->request->getSession()->read('Auth.User.group_id');
        if ($currentLoggedInUserPrivillege === 1) {
            $bills = $this->paginate($this->Bills);
        } else {
            $bills = $this->paginate($this->Bills->find()->where(['userUpdated' => $currentLoggedInUser]));
        }
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
//        var_dump($payerDetails); exit;
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
        // posting billing information for candidates 
        if ($this->request->is('post') && !empty($exam_type)) {
            // create bill
            $this->createBill();
        }
        // posting billing information related to non-candidates reg 
        if ($this->request->is('post') && empty($exam_type)) {
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
                    . '<BillItemEqvAmt>' . $amount . '</BillItemEqvAmt>'
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
        $currentLoggedInUser = $this->request->getSession()->read('Auth.User.username');
        $bill = $this->Bills->newEntity();
        $billItem = $this->loadModel('BillItems');
        $collections = $this->loadModel('Collections');
        $bill = $this->Bills->patchEntity($bill, $postedData);
        $bill->reference = 'NECTA' . date("Y") . date("mdhis", time()); // assumed reference number, will be changed later on consensus
        $bill->amount = 0; // not right place just fix amount for now
        $bill->equivalent_amount = 0;
        $bill->misc_amount = 0;
        $generatedDate = date("Y-m-d H:i:s");
        $expireDate = date('Y-m-d H:i:s', strtotime($generatedDate . ' + 3 days'));
        $bill->expire_date = $expireDate; // assumed
        $bill->generated_date = $generatedDate;
        $bill->has_reminder = 0;
        $bill->userUpdated = $currentLoggedInUser;
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
//            $this->Flash->success(__('The bill has been saved.'));
            $this->request->session()->write('bill', $bill_id);
            $this->requestControlNumber($bill_id);
            return $this->redirect(['action' => 'getBill']);
        } // end of the loop to iterate through each service added by the user
        $errors = $bill->getErrors();
        $this->set(compact('errors'));
//        $this->Flash->error(__('The bill could not be saved. Please, try again.'));
    }

//    // temporary function for requesting the control number 
    private function requestControlNumber($billUniqueNumber) {
        $URL = "http://localhost/xmltest/index.php?bill_id=$billUniqueNumber";

        //setting the curl parameters.
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $billUniqueNumber);

        if (curl_errno($ch)) {
            // moving to display page to display curl errors
            echo curl_errno($ch);
            echo curl_error($ch);
        } else {
            //getting response from server
            $response = curl_exec($ch);
            $data = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($data);
            $dataArray = json_decode($json, TRUE);
//           var_dump($dataArray);
            $controlNumber = $dataArray['BillTrx']['PayCntrNum'];
            $billIdReturnedFromGePG = $dataArray['BillTrx']['BillId'];
            curl_close($ch);

            if (isset($controlNumber) && !empty($controlNumber)) {
                // update the control number for the bill in bills table 
//                $billsTable = TableRegistry::get('Bills');
//                $billsData = $billsTable->get($billIdReturnedFromGePG);
//                $billsData->control_number = $controlNumber;
//                $billsTable->save($billsData);
//                
//            =========================================
                // Update the control number value based on the bill id
                $query = $this->Bills->query();
                $query->update()
                        ->set(['control_number' => $controlNumber])
                        ->where(['id' => $billIdReturnedFromGePG])
                        ->execute();
                // Prepare the XML response for gepgBillSubRespAck
                $gepgBillSubRespAck = "<gepgBillSubRespAck>
                                            <TrxStsCode>7101</TrxStsCode>
                                        </gepgBillSubRespAck>";
                // send the xml success response to GePG
                $this->curl($gepgBillSubRespAck);
            } else {
                $gepgBillSubRespAck = "<gepgBillSubRespAck>
                                        <TrxStsCode>7201</TrxStsCode>
                                       </gepgBillSubRespAck>";
                // send the xml failure response to GePG
                $this->curl($gepgBillSubRespAck);
            }
        }
    }
    private function curl($content) {
        //setting the curl parameters.
        $curlConf = curl_init();
        $url = "http://localhost/xmltest/resp.php";

        curl_setopt($curlConf, CURLOPT_URL, $url);
        curl_setopt($curlConf, CURLOPT_VERBOSE, 1);
        curl_setopt($curlConf, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curlConf, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlConf, CURLOPT_POST, 1);
        curl_setopt($curlConf, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlConf, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
        curl_setopt($curlConf, CURLOPT_POSTFIELDS, $content);

        if (curl_errno($curlConf)) {
            // moving to display page to display curl errors
            echo curl_errno($curlConf);
            echo curl_error($curlConf);
        } else {
            $response = curl_exec($curlConf);
// Don't remove below lines, zinaniamsha kwenye debugging            
//            echo curl_getinfo($curlConf) . '<br/>';
//            echo curl_errno($curlConf) . '<br/>';
//            echo curl_error($curlConf) . '<br/>';
            curl_close($curlConf);
        }
    }
    // TESTING ONLY
    // grab your control number, check your bill id in the bills/index and set the amount paid the execute the function
    public function pay($controlNumber, $billId, $amount) {

        // Get the submitted XML 
//        $gepgPmtSpInfo = file_get_contents('php://input');

        // Pre populated xml data-structre for testing
        $gepgPmtSpInfo = "<gepgPmtSpInfo>
                                    <PymtTrxInf>
                                    <TrxId>45522212</TrxId>
                                    <SpCode>12333</SpCode>
                                    <PayRefId>12121211545</PayRefId>
                                    <BillId>$billId</BillId>
                                    <PayCtrNum>$controlNumber</PayCtrNum>
                                    <BillAmt>$amount</BillAmt>
                                    <PaidAmt>$amount</PaidAmt>
                                    <BillPayOpt>1</BillPayOpt>
                                    <CCy>TZS</CCy>
                                    <TrxDtTm>2018-08-25T08:00:45</TrxDtTm>
                                    <UsdPayChnl>Tigo</UsdPayChnl>
                                    <PyrCellNum>0718440572</PyrCellNum>
                                    <PyrName>Hassan Lyawile</PyrName>
                                    <PyrEmail>webdev271@gmail.com</PyrEmail>
                                    <PspReceiptNumber>454545115454</PspReceiptNumber>
                                    <PspName>Mimi</PspName>
                                    <CtrAccNum>0J54512452555</CtrAccNum >
                                    </PymtTrxInf>
                                </gepgPmtSpInfo>";
        $xmlObjectgepgPmtSpInfo = simplexml_load_string($gepgPmtSpInfo, "SimpleXMLElement", LIBXML_NOCDATA);
        $jsonData = json_encode($xmlObjectgepgPmtSpInfo);
        $dataArray = json_decode($jsonData, TRUE);

//        var_dump($dataArray);
        $pyrName = $dataArray['PymtTrxInf']['PyrName'];
        $ctrAccNum = $dataArray['PymtTrxInf']['CtrAccNum'];
        // update the bills 
//        $queryForUpdatingBills = $this->Bills->query();
//        $queryForUpdatingBills->update()
//                        ->set(['payer_idx' => $IDONT_KNOW_WHICH_DATA_FROM_XML_I_SHOULD_USE])
//                        ->where(['id' => $billId])
//                        ->execute();
//Load Payments model 
        $payments = $this->loadModel('payments');

//       Set payments data for saving 
        $payVars = $payments->newEntity();
        $payVars->transaction_idx = $dataArray['PymtTrxInf']['TrxId'];
        $payVars->transaction_date = $dataArray['PymtTrxInf']['TrxDtTm'];
        $payVars->gepg_receipt = '012455';
        $payVars->control_number = $dataArray['PymtTrxInf']['PayCtrNum'];
        $payVars->bill_amount = $dataArray['PymtTrxInf']['BillAmt'];
        $payVars->paid_amount = $dataArray['PymtTrxInf']['PaidAmt'];
        $payVars->bill_payment_option = $dataArray['PymtTrxInf']['BillPayOpt'];
        $payVars->currency = $dataArray['PymtTrxInf']['CCy'];
        $payVars->payment_channel = $dataArray['PymtTrxInf']['UsdPayChnl'];
        $payVars->payer_mobile = $dataArray['PymtTrxInf']['PyrCellNum'];
        $payVars->payer_email = $dataArray['PymtTrxInf']['PyrEmail'];
        $payVars->provider_receipt = $dataArray['PymtTrxInf']['PspReceiptNumber'];
        $payVars->provider_name = $dataArray['PymtTrxInf']['PspName'];
        $payVars->credited_account = $dataArray['PymtTrxInf']['CtrAccNum'];
        $payVars->bill_id = $dataArray['PymtTrxInf']['BillId'];
        $payVars->is_consumed = 1;

        // insert the payments details into the payments table 
        $dataReturnedFromPaymentSave = $payments->save($payVars);
        $paymentSavedId = $dataReturnedFromPaymentSave->id;
        if (isset($paymentSavedId) && !empty($paymentSavedId)) {
            // Prepare the response for acknowledgement gepgBillSubReqAck to GePG
            //TrxStsCode
            //7101: Successful
            //7242: Failed - Bill Content Irregular
            //7201: Failed - General Error
            $gepgBillSubReqAck = "<gepgBillSubReqAck>
                                    <TrxStsCode>7101</TrxStsCode>
                                </gepgBillSubReqAck>";
        } else {
            $gepgBillSubReqAck = "<gepgBillSubReqAck>
                                    <TrxStsCode>7201</TrxStsCode>
                                </gepgBillSubReqAck>";
        }
        // Send the response gepgBillSubReqAck
        // codes go here
        // exit execution 
        exit();
    }

    public function getPdfBill($bill_id) {
        // set the bill_id in session 
        $this->request->getSession()->write('bill', $bill_id);
        // get the bills details 
        $queryDetails = $this->Bills->find()->where(['Bills.id' => $bill_id]);
//        $queryDetails->innerJoinWith('BillItems', function($data) {
//            $billIdentification = $this->request->getSession()->read('bill');
//            return $data->where(['Bills.id' => $billIdentification]);
//        });
        $this->loadModel('BillItems');
        $this->loadModel('Collections');
        $this->loadModel('CollectionCategories');
        $billIdentification = $this->request->getSession()->read('bill');
        $billDetails = $this->BillItems->find('all', ['contain' => 'Collections'])
                ->select(['BillItems.amount', 'BillItems.quantity', 'BillItems.unit', 'Collections.name', 'Collections.amount', 'Collections.collection_categorie_id'])
                ->where(['BillItems.bill_id' => $billIdentification]);
        // read total from the bill
        $queryTotal = $this->Bills->find()->select('amount')->where(['id' => $billIdentification]);
        foreach ($queryTotal as $queryT) {
            $totalAmount = $queryT['amount'];
        }
        $this->request->getSession()->delete('bill');
        foreach ($queryDetails as $billsData) {
            
        }
        

        $pdf = new pdfBill();
        $pdf->AddPage();
        // THE BODY OF THE PDF BILL STARTS HERE
        //      $thisw for payer name
//        $pdf->Cell('', 17, '', '', 1);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(18, 0, "Bill To: ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(12, 0, $billsData->payer_name, 0, 1);
//      Row for control number
        $pdf->SetY(63);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(40, 0, "Control Number : ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(0, 0, $billsData->control_number, 0, 1);
//      Row for phone number 
        $pdf->SetY(70);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(38, 0, "Phone number : ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(0, 0, $billsData->payer_mobile, 0, 1);
//      $pdfw for email address
        $pdf->SetY(77);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(35, 0, "Email address : ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(0, 0, $billsData->payer_email, 0, 1);
//      Row for bill generated at
        $pdf->SetY(84);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(33, 0, "Generated on : ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(0, 0, $billsData->generated_date->i18nFormat('dd-MM-yyyy HH:mm:ss'), 0, 1);
//      $pdfw for Bill due date
        $pdf->SetY(91);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(23, 0, "Due date : ", 0, 0);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(0, 0, $billsData->expire_date->i18nFormat('dd-MM-yyyy HH:mm:ss'), 0, 1);
        $pdf->Cell(0, 20, "The following are the bill items you have selected:", 0, 1);
        $pdf->SetY(105);
//        $pdf->SetFillColor(87.1,93.3,82.0);
//        Header for bill items 
        $pdf->SetFont('Arial', 'B', 13);
        // Item Serial number
        $pdf->SetFillColor(230);
        $pdf->Cell(10, 10, 'SN ', 0, '', '', TRUE);
        // Item Description
        $pdf->SetFillColor(230);
        $pdf->Cell(85, 10, 'ITEM DESCRIPTION ', 0, '', '', TRUE);
        // Item Serial number
        $pdf->SetFillColor(230);
        $pdf->Cell(15, 10, 'QTY ', 0, "", "C", TRUE);
        // Total for each service
        $pdf->SetFillColor(230);
        $pdf->Cell(37, 10, 'UNIT PRICE ', 0, "", "R", TRUE);
        // Total for each service
        $pdf->SetFillColor(230);
        $pdf->Cell(40, 10, 'TOTAL ', 0, 1, "R", TRUE);
        $pdf->SetFont('Arial', '', 13);
        $i = 0;
        // iterate to fill up the bill PDF output 
        foreach ($billDetails as $billData) {

            // Item Serial number
            $pdf->Cell(10, 10, $i + 1, 0, '', '');
            // Item Description
            $pdf->Cell(85, 10, $billData['collection']['name'], 0, '', '');
            // Item Serial number
            $pdf->Cell(15, 10, $billData['quantity'], 0, '', "C");
            // Total for each service
            $pdf->Cell(37, 10, number_format($billData['collection']['amount'], 2), 0, '', "R");
            // Total for each service
            $pdf->Cell(40, 10, number_format($billData['amount'], 2), 0, 1, "R");
            $pdf->SetFillColor(230);
            $pdf->Cell(187, 0.5, '', 0, 1, "R", true);
            $i++;
        }
        $pdf->Cell(187, 5, '', 0, 1, "R");
        $pdf->SetFont('Arial');
        $pdf->SetFont('Arial', 'B');
        $pdf->Cell(135);
        $pdf->SetFillColor(230);
        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(230);
        $pdf->Cell(22, 10, 'TOTAL', 1, '', '', true);
        $pdf->Cell(30, 10, number_format($billsData->amount, 2), 1, 1, "R");
        $pdf->Cell(0, 5, '', '', 1);
        $pdf->SetFont('', 'I', 10);
        if (isset($billsData->control_number)) {
            $controlNumber = "You can pay in one out of these payment options: Bank, Mobile (Tigo, Vodacom, Airtel, TTCL or Zantel) or MaxMalipo with control number " . $billsData->control_number;
        } else {
            $controlNumber = 'The control number was not received for this bill, try to generate new bill or keep on waiting for sometime and view this bill again.';
        }
        $pdf->SetTextColor(50);
        $pdf->MultiCell(0, 5, $controlNumber);

        // Diplay the PDF
        $pdf->Output();
        exit;
    }

}
