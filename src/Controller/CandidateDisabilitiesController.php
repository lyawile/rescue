<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CandidateDisabilities Controller
 *
 * @property \App\Model\Table\CandidateDisabilitiesTable $CandidateDisabilities
 *
 * @method \App\Model\Entity\CandidateDisability[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidateDisabilitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates', 'Disabilities']
        ];
        $candidateDisabilities = $this->paginate($this->CandidateDisabilities);

        $this->set(compact('candidateDisabilities'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate Disability id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateDisability = $this->CandidateDisabilities->get($id, [
            'contain' => ['Candidates', 'Disabilities']
        ]);

        $this->set('candidateDisability', $candidateDisability);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateDisability = $this->CandidateDisabilities->newEntity();
        if ($this->request->is('post')) {
            $candidateDisability = $this->CandidateDisabilities->patchEntity($candidateDisability, $this->request->getData());
            if ($this->CandidateDisabilities->save($candidateDisability)) {
                $this->Flash->success(__('The candidate disability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate disability could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateDisabilities->Candidates->find('list', ['limit' => 200]);
        $disabilities = $this->CandidateDisabilities->Disabilities->find('list', ['limit' => 200]);
        $this->set(compact('candidateDisability', 'candidates', 'disabilities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate Disability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateDisability = $this->CandidateDisabilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidateDisability = $this->CandidateDisabilities->patchEntity($candidateDisability, $this->request->getData());
            if ($this->CandidateDisabilities->save($candidateDisability)) {
                $this->Flash->success(__('The candidate disability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate disability could not be saved. Please, try again.'));
        }
        $candidates = $this->CandidateDisabilities->Candidates->find('list', ['limit' => 200]);
        $disabilities = $this->CandidateDisabilities->Disabilities->find('list', ['limit' => 200]);
        $this->set(compact('candidateDisability', 'candidates', 'disabilities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate Disability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateDisability = $this->CandidateDisabilities->get($id);
        if ($this->CandidateDisabilities->delete($candidateDisability)) {
            $this->Flash->success(__('The candidate disability has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate disability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
