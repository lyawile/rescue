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
        var_dump($_SESSION);
        exit();
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
        // Check if all the session value keys are set and valid
        // values from the session 
        $payer_name = 'admin';
        $exam_type = 2;
        $payer_mobile = '0718440572';
        $payer_email = 'test@eservice.com';
        $numberOfCands = 2; // this is equal to the quantity in billing 
        if (true) {
           return $this->redirect(['action' => 'verifyBill']);
        } else {
            $services = TableRegistry::getTableLocator()->get('collections');
            $services = $services->find('list');
//        $services = $services->find('list')->select(['id', 'name', 'amount']);
            $bill = $this->Bills->newEntity();
            $billItem = $this->loadModel('BillItems');
            $collections = $this->loadModel('Collections');

            // get the current amount for a requested service
            $data = $collections->find('all', array('fields' => array('amount')))
                    ->where(['is_current' => 1, 'exam_type_id' => $exam_type]);
            foreach ($data as $data) {
                $amount = $data->amount;
            }
            if ($this->request->is('post')) {
                // get collection id to determine the service cost 
                $postedData = $this->request->getData();

                $bill = $this->Bills->patchEntity($bill, $postedData);
                $bill->reference = 'NECTA' . date("Y") . date("mdhis", time()); // assumed reference number, will be changed later on consensus
                $bill->amount = $amount; // not right place just fix amount for now
                $bill->equivalent_amount = $amount;
                $bill->misc_amount = $amount;
                $bill->expire_date = '2018-12-01'; // assumed
                $bill->generated_date = date("Y-m-d");
                $bill->has_reminder = 0;
                $totalAmount = 0;
                if ($t = $this->Bills->save($bill)) {
                    $bill_id = $t->id;
                    for ($i = 0; $i < count($postedData['collection_id']); $i++) {
//                For debugging purpose only
//                echo $coll_id = $postedData['collection_id'][$i];
//                echo "-----------";
//                echo $quantity = $postedData['quantity'][$i];
//                echo "<br/>";
//              Business logic 
                        $collectionId = $postedData['collection_id'][$i];
                        // get the service amount
                        $collectionsData = $collections->find()->where(["id" => $collectionId]);
                        foreach ($collectionsData as $d) {
                            $amount = $d->amount;
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
                        $billItem->save($bill_item_var);
                    }
                    // Update the amount Bills table
                    $query = $this->Bills->query();
                    $query->update()
                            ->set(['amount' => $totalAmount, 'equivalent_amount' => $totalAmount, 'misc_amount' => $totalAmount])
                            ->where(['id' => $bill_id])
                            ->execute();
                    $this->Flash->success(__('The bill has been saved.'));
                    return $this->redirect(['action' => 'getInvoice', 'bill_id' => $bill_id]);
                } // end of the loop to iterate through each service added by the user

                $this->Flash->error(__('The bill could not be saved. Please, try again.'));
            }
            $this->set(compact('services'));
        }
    }

    public function getInvoice($bill_id) {
        // get the customer details 
        echo $this->request->query('bill_id');
        $queryDetails = $this->Bills->find();
        $queryDetails->innerJoinWith('BillItems', function($data) {
            return $data->where(['Bills.id' => $this->request->query('bill_id')]);
        });
        // get the bill items 
        $this->loadModel('BillItems');
        $this->loadModel('Collections');
        $billDetails = $this->BillItems->find('all', ['contain' => 'Collections'])
                ->select(['BillItems.amount', 'BillItems.quantity', 'BillItems.unit', 'Collections.name', 'Collections.amount'])
                ->where(['BillItems.bill_id' => $this->request->query('bill_id')]);
        // read total from the bill
        $queryTotal = $this->Bills->find()->select('amount')->where(['id' => $this->request->query('bill_id')]);
        foreach ($queryTotal as $queryT) {
            $totalAmount = $queryT['amount'];
        }
        $this->set(compact('queryDetails', 'billDetails', 'totalAmount'));
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
    public function verifyBill(){
        echo "Test";
    }

}
