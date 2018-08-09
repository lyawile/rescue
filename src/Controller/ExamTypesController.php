<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExamTypes Controller
 *
 * @property \App\Model\Table\ExamTypesTable $ExamTypes
 *
 * @method \App\Model\Entity\ExamType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $examTypes = $this->paginate($this->ExamTypes);

        $this->set(compact('examTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examType = $this->ExamTypes->get($id, [
            'contain' => ['Candidates', 'Collections', 'DisqualifiedCandidates', 'Subjects']
        ]);

        $this->set('examType', $examType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examType = $this->ExamTypes->newEntity();
        if ($this->request->is('post')) {
            $examType = $this->ExamTypes->patchEntity($examType, $this->request->getData());
            if ($this->ExamTypes->save($examType)) {
                $this->Flash->success(__('The exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam type could not be saved. Please, try again.'));
        }
        $this->set(compact('examType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examType = $this->ExamTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examType = $this->ExamTypes->patchEntity($examType, $this->request->getData());
            if ($this->ExamTypes->save($examType)) {
                $this->Flash->success(__('The exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam type could not be saved. Please, try again.'));
        }
        $this->set(compact('examType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examType = $this->ExamTypes->get($id);
        if ($this->ExamTypes->delete($examType)) {
            $this->Flash->success(__('The exam type has been deleted.'));
        } else {
            $this->Flash->error(__('The exam type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
