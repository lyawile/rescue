<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DisabilityDisqualifiedCandidates Controller
 *
 * @property \App\Model\Table\DisabilityDisqualifiedCandidatesTable $DisabilityDisqualifiedCandidates
 *
 * @method \App\Model\Entity\DisabilityDisqualifiedCandidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisabilityDisqualifiedCandidatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Disabilities', 'DisqualifiedCandidates']
        ];
        $disabilityDisqualifiedCandidates = $this->paginate($this->DisabilityDisqualifiedCandidates);

        $this->set(compact('disabilityDisqualifiedCandidates'));
    }

    /**
     * View method
     *
     * @param string|null $id Disability Disqualified Candidate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->get($id, [
            'contain' => ['Disabilities', 'DisqualifiedCandidates']
        ]);

        $this->set('disabilityDisqualifiedCandidate', $disabilityDisqualifiedCandidate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->newEntity();
        if ($this->request->is('post')) {
            $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->patchEntity($disabilityDisqualifiedCandidate, $this->request->getData());
            if ($this->DisabilityDisqualifiedCandidates->save($disabilityDisqualifiedCandidate)) {
                $this->Flash->success(__('The disability disqualified candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disability disqualified candidate could not be saved. Please, try again.'));
        }
        $disabilities = $this->DisabilityDisqualifiedCandidates->Disabilities->find('list', ['limit' => 200]);
        $disqualifiedCandidates = $this->DisabilityDisqualifiedCandidates->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disabilityDisqualifiedCandidate', 'disabilities', 'disqualifiedCandidates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disability Disqualified Candidate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->patchEntity($disabilityDisqualifiedCandidate, $this->request->getData());
            if ($this->DisabilityDisqualifiedCandidates->save($disabilityDisqualifiedCandidate)) {
                $this->Flash->success(__('The disability disqualified candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disability disqualified candidate could not be saved. Please, try again.'));
        }
        $disabilities = $this->DisabilityDisqualifiedCandidates->Disabilities->find('list', ['limit' => 200]);
        $disqualifiedCandidates = $this->DisabilityDisqualifiedCandidates->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disabilityDisqualifiedCandidate', 'disabilities', 'disqualifiedCandidates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disability Disqualified Candidate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disabilityDisqualifiedCandidate = $this->DisabilityDisqualifiedCandidates->get($id);
        if ($this->DisabilityDisqualifiedCandidates->delete($disabilityDisqualifiedCandidate)) {
            $this->Flash->success(__('The disability disqualified candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The disability disqualified candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
