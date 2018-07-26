<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DisqualifiedCandidates Controller
 *
 * @property \App\Model\Table\DisqualifiedCandidatesTable $DisqualifiedCandidates
 *
 * @method \App\Model\Entity\DisqualifiedCandidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisqualifiedCandidatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExamTypes', 'Centres']
        ];
        $disqualifiedCandidates = $this->paginate($this->DisqualifiedCandidates);

        $this->set(compact('disqualifiedCandidates'));
    }

    /**
     * View method
     *
     * @param string|null $id Disqualified Candidate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disqualifiedCandidate = $this->DisqualifiedCandidates->get($id, [
            'contain' => ['ExamTypes', 'Centres']
        ]);

        $this->set('disqualifiedCandidate', $disqualifiedCandidate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disqualifiedCandidate = $this->DisqualifiedCandidates->newEntity();
        if ($this->request->is('post')) {
            $disqualifiedCandidate = $this->DisqualifiedCandidates->patchEntity($disqualifiedCandidate, $this->request->getData());
            if ($this->DisqualifiedCandidates->save($disqualifiedCandidate)) {
                $this->Flash->success(__('The disqualified candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate could not be saved. Please, try again.'));
        }
        $examTypes = $this->DisqualifiedCandidates->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->DisqualifiedCandidates->Centres->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidate', 'examTypes', 'centres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disqualified Candidate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disqualifiedCandidate = $this->DisqualifiedCandidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disqualifiedCandidate = $this->DisqualifiedCandidates->patchEntity($disqualifiedCandidate, $this->request->getData());
            if ($this->DisqualifiedCandidates->save($disqualifiedCandidate)) {
                $this->Flash->success(__('The disqualified candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate could not be saved. Please, try again.'));
        }
        $examTypes = $this->DisqualifiedCandidates->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->DisqualifiedCandidates->Centres->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidate', 'examTypes', 'centres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disqualified Candidate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disqualifiedCandidate = $this->DisqualifiedCandidates->get($id);
        if ($this->DisqualifiedCandidates->delete($disqualifiedCandidate)) {
            $this->Flash->success(__('The disqualified candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The disqualified candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
