<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disabilities Controller
 *
 * @property \App\Model\Table\DisabilitiesTable $Disabilities
 *
 * @method \App\Model\Entity\Disability[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisabilitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $disabilities = $this->paginate($this->Disabilities);

        $this->set(compact('disabilities'));
    }

    /**
     * View method
     *
     * @param string|null $id Disability id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disability = $this->Disabilities->get($id, [
            'contain' => []
        ]);

        $this->set('disability', $disability);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disability = $this->Disabilities->newEntity();
        if ($this->request->is('post')) {
            $disability = $this->Disabilities->patchEntity($disability, $this->request->getData());
            if ($this->Disabilities->save($disability)) {
                $this->Flash->success(__('The disability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disability could not be saved. Please, try again.'));
        }
        $this->set(compact('disability'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disability = $this->Disabilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disability = $this->Disabilities->patchEntity($disability, $this->request->getData());
            if ($this->Disabilities->save($disability)) {
                $this->Flash->success(__('The disability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disability could not be saved. Please, try again.'));
        }
        $this->set(compact('disability'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disability = $this->Disabilities->get($id);
        if ($this->Disabilities->delete($disability)) {
            $this->Flash->success(__('The disability has been deleted.'));
        } else {
            $this->Flash->error(__('The disability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
