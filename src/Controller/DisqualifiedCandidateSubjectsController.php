<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DisqualifiedCandidateSubjects Controller
 *
 * @property \App\Model\Table\DisqualifiedCandidateSubjectsTable $DisqualifiedCandidateSubjects
 *
 * @method \App\Model\Entity\DisqualifiedCandidateSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisqualifiedCandidateSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subjects', 'DisqualifiedCandidates']
        ];
        $disqualifiedCandidateSubjects = $this->paginate($this->DisqualifiedCandidateSubjects);

        $this->set(compact('disqualifiedCandidateSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Disqualified Candidate Subject id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->get($id, [
            'contain' => ['Subjects', 'DisqualifiedCandidates']
        ]);

        $this->set('disqualifiedCandidateSubject', $disqualifiedCandidateSubject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->newEntity();
        if ($this->request->is('post')) {
            $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->patchEntity($disqualifiedCandidateSubject, $this->request->getData());
            if ($this->DisqualifiedCandidateSubjects->save($disqualifiedCandidateSubject)) {
                $this->Flash->success(__('The disqualified candidate subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate subject could not be saved. Please, try again.'));
        }
        $subjects = $this->DisqualifiedCandidateSubjects->Subjects->find('list', ['limit' => 200]);
        $disqualifiedCandidates = $this->DisqualifiedCandidateSubjects->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidateSubject', 'subjects', 'disqualifiedCandidates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disqualified Candidate Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->patchEntity($disqualifiedCandidateSubject, $this->request->getData());
            if ($this->DisqualifiedCandidateSubjects->save($disqualifiedCandidateSubject)) {
                $this->Flash->success(__('The disqualified candidate subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate subject could not be saved. Please, try again.'));
        }
        $subjects = $this->DisqualifiedCandidateSubjects->Subjects->find('list', ['limit' => 200]);
        $disqualifiedCandidates = $this->DisqualifiedCandidateSubjects->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidateSubject', 'subjects', 'disqualifiedCandidates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disqualified Candidate Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disqualifiedCandidateSubject = $this->DisqualifiedCandidateSubjects->get($id);
        if ($this->DisqualifiedCandidateSubjects->delete($disqualifiedCandidateSubject)) {
            $this->Flash->success(__('The disqualified candidate subject has been deleted.'));
        } else {
            $this->Flash->error(__('The disqualified candidate subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
