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
        $services = TableRegistry::getTableLocator()->get('collections');
        $services = $services->find('list');
//        $services = $services->find('list')->select(['id', 'name', 'amount']);
        $bill = $this->Bills->newEntity();
        $billItem = $this->loadModel('BillItems');
        $collections = $this->loadModel('Collections');
        
        if ($this->request->is('post')) {
            // get collection id to determine the service cost 
            $postedData = $this->request->getData();

            $bill = $this->Bills->patchEntity($bill, $postedData);
            $bill->reference = 'NECTA' . date("Y") . date("mdhis", time()); // assumed reference number, will be changed later on consensus
            $bill->amount = 1000; // not right place just fix amount for now
            $bill->equivalent_amount = 1000;
            $bill->misc_amount = 1000;
            $bill->expire_date = '2018-12-01'; // assumed
            $bill->generated_date = date("Y-m-d");
            $bill->has_reminder = 0;
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
                    $bill_item = $billItem->newEntity();
                    $bill_item_var = $billItem->patchEntity($bill_item, $postedData);
                    $bill_item_var->bill_id = $bill_id; // last inserted bill id
                    $bill_item_var->detail = "Test details";
                    $bill_item_var->amount = $amount; // testing
                    $bill_item_var->misc_amount = $amount;
                    $bill_item_var->equivalent_amount = $amount;
                    $bill_item_var->unit = "Each";
                    $bill_item_var->collection_id = $collectionId;
                    $bill_item_var->quantity = $postedData['quantity'][$i];
//                    debug($bill_item_var);
                    $billItem->save($bill_item_var);
                }
                // get the amount of money that a customer needs to pay by summing up the services cost he has selected
                
                $this->Flash->success(__('The bill has been saved.'));
                return $this->redirect(['action' => 'index']);
            } // end of the loop to iterate through each service added by the user
            
            $this->Flash->error(__('The bill could not be saved. Please, try again.'));
        }
        $this->set(compact('services'));
    }
    public function getInvoice(){
        $test =  "Ahaa!! This is your invoice";
        $this->set(compact('test'));
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

}
