<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Centres Controller
 *
 * @property \App\Model\Table\CentresTable $Centres
 *
 * @method \App\Model\Entity\Centre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CentresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Districts']
        ];
        $centres = $this->paginate($this->Centres);

        $this->set(compact('centres'));
    }

    /**
     * View method
     *
     * @param string|null $id Centre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $centre = $this->Centres->get($id, [
            'contain' => ['Districts']
        ]);

        $this->set('centre', $centre);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $centre = $this->Centres->newEntity();
        if ($this->request->is('post')) {
            $centre = $this->Centres->patchEntity($centre, $this->request->getData());
            if ($this->Centres->save($centre)) {
                $this->Flash->success(__('The centre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centre could not be saved. Please, try again.'));
        }
        $districts = $this->Centres->Districts->find('list', ['limit' => 200]);
        $this->set(compact('centre', 'districts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Centre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $centre = $this->Centres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centre = $this->Centres->patchEntity($centre, $this->request->getData());
            if ($this->Centres->save($centre)) {
                $this->Flash->success(__('The centre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centre could not be saved. Please, try again.'));
        }
        $districts = $this->Centres->Districts->find('list', ['limit' => 200]);
        $this->set(compact('centre', 'districts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Centre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $centre = $this->Centres->get($id);
        if ($this->Centres->delete($centre)) {
            $this->Flash->success(__('The centre has been deleted.'));
        } else {
            $this->Flash->error(__('The centre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
