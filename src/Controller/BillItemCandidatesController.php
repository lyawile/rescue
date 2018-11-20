<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BillItemCandidates Controller
 *
 * @property \App\Model\Table\BillItemCandidatesTable $BillItemCandidates
 *
 * @method \App\Model\Entity\BillItemCandidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillItemCandidatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates', 'BillItems']
        ];
        $billItemCandidates = $this->paginate($this->BillItemCandidates);

        $this->set(compact('billItemCandidates'));
    }

    /**
     * View method
     *
     * @param string|null $id Bill Item Candidate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billItemCandidate = $this->BillItemCandidates->get($id, [
            'contain' => ['Candidates', 'BillItems']
        ]);

        $this->set('billItemCandidate', $billItemCandidate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billItemCandidate = $this->BillItemCandidates->newEntity();
        if ($this->request->is('post')) {
            $billItemCandidate = $this->BillItemCandidates->patchEntity($billItemCandidate, $this->request->getData());
            if ($this->BillItemCandidates->save($billItemCandidate)) {
                $this->Flash->success(__('The bill item candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill item candidate could not be saved. Please, try again.'));
        }
        $candidates = $this->BillItemCandidates->Candidates->find('list', ['limit' => 200]);
        $billItems = $this->BillItemCandidates->BillItems->find('list', ['limit' => 200]);
        $this->set(compact('billItemCandidate', 'candidates', 'billItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bill Item Candidate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billItemCandidate = $this->BillItemCandidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billItemCandidate = $this->BillItemCandidates->patchEntity($billItemCandidate, $this->request->getData());
            if ($this->BillItemCandidates->save($billItemCandidate)) {
                $this->Flash->success(__('The bill item candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bill item candidate could not be saved. Please, try again.'));
        }
        $candidates = $this->BillItemCandidates->Candidates->find('list', ['limit' => 200]);
        $billItems = $this->BillItemCandidates->BillItems->find('list', ['limit' => 200]);
        $this->set(compact('billItemCandidate', 'candidates', 'billItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bill Item Candidate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billItemCandidate = $this->BillItemCandidates->get($id);
        if ($this->BillItemCandidates->delete($billItemCandidate)) {
            $this->Flash->success(__('The bill item candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The bill item candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
