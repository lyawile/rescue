<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BillItems Controller
 *
 * @property \App\Model\Table\BillItemsTable $BillItems
 *
 * @method \App\Model\Entity\BillItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Collections', 'Bills']
        ];
        $billItems = $this->paginate($this->BillItems);

        $this->set(compact('billItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Bill Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billItem = $this->BillItems->get($id, [
            'contain' => ['Collections', 'Bills', 'BillItemCandidates']
        ]);

        $this->set('billItem', $billItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billItem = $this->BillItems->newEntity();
        if ($this->request->is('post')) {
            $billItem = $this->BillItems->patchEntity($billItem, $this->request->getData());
            if ($this->BillItems->save($billItem)) {
                $this->Flash->success(__('The bill item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill item could not be saved. Please, try again.'));
        }
        $collections = $this->BillItems->Collections->find('list', ['limit' => 200]);
        $bills = $this->BillItems->Bills->find('list', ['limit' => 200]);
        $this->set(compact('billItem', 'collections', 'bills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bill Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billItem = $this->BillItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billItem = $this->BillItems->patchEntity($billItem, $this->request->getData());
            if ($this->BillItems->save($billItem)) {
                $this->Flash->success(__('The bill item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill item could not be saved. Please, try again.'));
        }
        $collections = $this->BillItems->Collections->find('list', ['limit' => 200]);
        $bills = $this->BillItems->Bills->find('list', ['limit' => 200]);
        $this->set(compact('billItem', 'collections', 'bills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bill Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billItem = $this->BillItems->get($id);
        if ($this->BillItems->delete($billItem)) {
            $this->Flash->success(__('The bill item has been deleted.'));
        } else {
            $this->Flash->error(__('The bill item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
