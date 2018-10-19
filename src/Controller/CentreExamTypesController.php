<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CentreExamTypes Controller
 *
 * @property \App\Model\Table\CentreExamTypesTable $CentreExamTypes
 *
 * @method \App\Model\Entity\CentreExamType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CentreExamTypesController extends AppController
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
        $centreExamTypes = $this->paginate($this->CentreExamTypes);

        $this->set(compact('centreExamTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Centre Exam Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $centreExamType = $this->CentreExamTypes->get($id, [
            'contain' => ['ExamTypes', 'Centres']
        ]);

        $this->set('centreExamType', $centreExamType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $centreExamType = $this->CentreExamTypes->newEntity();
        if ($this->request->is('post')) {
            $centreExamType = $this->CentreExamTypes->patchEntity($centreExamType, $this->request->getData());
            if ($this->CentreExamTypes->save($centreExamType)) {
                $this->Flash->success(__('The centre exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centre exam type could not be saved. Please, try again.'));
        }
        $examTypes = $this->CentreExamTypes->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->CentreExamTypes->Centres->find('list', ['limit' => 200]);
        $this->set(compact('centreExamType', 'examTypes', 'centres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Centre Exam Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $centreExamType = $this->CentreExamTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centreExamType = $this->CentreExamTypes->patchEntity($centreExamType, $this->request->getData());
            if ($this->CentreExamTypes->save($centreExamType)) {
                $this->Flash->success(__('The centre exam type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centre exam type could not be saved. Please, try again.'));
        }
        $examTypes = $this->CentreExamTypes->ExamTypes->find('list', ['limit' => 200]);
        $centres = $this->CentreExamTypes->Centres->find('list', ['limit' => 200]);
        $this->set(compact('centreExamType', 'examTypes', 'centres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Centre Exam Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $centreExamType = $this->CentreExamTypes->get($id);
        if ($this->CentreExamTypes->delete($centreExamType)) {
            $this->Flash->success(__('The centre exam type has been deleted.'));
        } else {
            $this->Flash->error(__('The centre exam type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
