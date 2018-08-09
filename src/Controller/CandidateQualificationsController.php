<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CandidateQualifications Controller
 *
 * @property \App\Model\Table\CandidateQualificationsTable $CandidateQualifications
 *
 * @method \App\Model\Entity\CandidateQualification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidateQualificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates']
        ];
        $candidateQualifications = $this->paginate($this->CandidateQualifications);

        $this->set(compact('candidateQualifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate Qualification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateQualification = $this->CandidateQualifications->get($id, [
            'contain' => ['Candidates']
        ]);

        $this->set('candidateQualification', $candidateQualification);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateQualification = $this->CandidateQualifications->newEntity();
        if ($this->request->is('post')) {
            $candidateQualification = $this->CandidateQualifications->patchEntity($candidateQualification, $this->request->getData());
            if ($this->CandidateQualifications->save($candidateQualification)) {
                $this->Flash->success(__('The candidate qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate qualification could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateQualifications->Candidates->find('list', ['limit' => 200]);
        $this->set(compact('candidateQualification', 'candidates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate Qualification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateQualification = $this->CandidateQualifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidateQualification = $this->CandidateQualifications->patchEntity($candidateQualification, $this->request->getData());
            if ($this->CandidateQualifications->save($candidateQualification)) {
                $this->Flash->success(__('The candidate qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate qualification could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateQualifications->Candidates->find('list', ['limit' => 200]);
        $this->set(compact('candidateQualification', 'candidates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate Qualification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateQualification = $this->CandidateQualifications->get($id);
        if ($this->CandidateQualifications->delete($candidateQualification)) {
            $this->Flash->success(__('The candidate qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
