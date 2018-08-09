<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DisqualifiedCandidateQualifications Controller
 *
 * @property \App\Model\Table\DisqualifiedCandidateQualificationsTable $DisqualifiedCandidateQualifications
 *
 * @method \App\Model\Entity\DisqualifiedCandidateQualification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisqualifiedCandidateQualificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DisqualifiedCandidates']
        ];
        $disqualifiedCandidateQualifications = $this->paginate($this->DisqualifiedCandidateQualifications);

        $this->set(compact('disqualifiedCandidateQualifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Disqualified Candidate Qualification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->get($id, [
            'contain' => ['DisqualifiedCandidates']
        ]);

        $this->set('disqualifiedCandidateQualification', $disqualifiedCandidateQualification);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->newEntity();
        if ($this->request->is('post')) {
            $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->patchEntity($disqualifiedCandidateQualification, $this->request->getData());
            if ($this->DisqualifiedCandidateQualifications->save($disqualifiedCandidateQualification)) {
                $this->Flash->success(__('The disqualified candidate qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate qualification could not be saved. Please, try again.'));
        }
        $disqualifiedCandidates = $this->DisqualifiedCandidateQualifications->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidateQualification', 'disqualifiedCandidates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disqualified Candidate Qualification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->patchEntity($disqualifiedCandidateQualification, $this->request->getData());
            if ($this->DisqualifiedCandidateQualifications->save($disqualifiedCandidateQualification)) {
                $this->Flash->success(__('The disqualified candidate qualification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disqualified candidate qualification could not be saved. Please, try again.'));
        }
        $disqualifiedCandidates = $this->DisqualifiedCandidateQualifications->DisqualifiedCandidates->find('list', ['limit' => 200]);
        $this->set(compact('disqualifiedCandidateQualification', 'disqualifiedCandidates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disqualified Candidate Qualification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disqualifiedCandidateQualification = $this->DisqualifiedCandidateQualifications->get($id);
        if ($this->DisqualifiedCandidateQualifications->delete($disqualifiedCandidateQualification)) {
            $this->Flash->success(__('The disqualified candidate qualification has been deleted.'));
        } else {
            $this->Flash->error(__('The disqualified candidate qualification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
