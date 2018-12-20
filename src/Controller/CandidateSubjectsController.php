<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CandidateSubjects Controller
 *
 * @property \App\Model\Table\CandidateSubjectsTable $CandidateSubjects
 *
 * @method \App\Model\Entity\CandidateSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidateSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates', 'Subjects']
        ];
        $candidateSubjects = $this->paginate($this->CandidateSubjects);

        $this->set(compact('candidateSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateSubject = $this->CandidateSubjects->get($id, [
            'contain' => ['Candidates', 'Subjects']
        ]);

        $this->set('candidateSubject', $candidateSubject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateSubject = $this->CandidateSubjects->newEntity();
        if ($this->request->is('post')) {
            $candidateSubject = $this->CandidateSubjects->patchEntity($candidateSubject, $this->request->getData());
            if ($this->CandidateSubjects->save($candidateSubject)) {
                $this->Flash->success(__('The candidate subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate subject could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateSubjects->Candidates->find('list', ['limit' => 200]);
        $subjects = $this->CandidateSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateSubject', 'candidates', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateSubject = $this->CandidateSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidateSubject = $this->CandidateSubjects->patchEntity($candidateSubject, $this->request->getData());
            if ($this->CandidateSubjects->save($candidateSubject)) {
                $this->Flash->success(__('The candidate subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate subject could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateSubjects->Candidates->find('list', ['limit' => 200]);
        $subjects = $this->CandidateSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('candidateSubject', 'candidates', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateSubject = $this->CandidateSubjects->get($id);
        if ($this->CandidateSubjects->delete($candidateSubject)) {
            $this->Flash->success(__('The candidate subject has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
