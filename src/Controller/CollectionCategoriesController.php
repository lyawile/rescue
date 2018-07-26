<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CollectionCategories Controller
 *
 * @property \App\Model\Table\CollectionCategoriesTable $CollectionCategories
 *
 * @method \App\Model\Entity\CollectionCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectionCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $collectionCategories = $this->paginate($this->CollectionCategories);

        $this->set(compact('collectionCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Collection Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collectionCategory = $this->CollectionCategories->get($id, [
            'contain' => []
        ]);

        $this->set('collectionCategory', $collectionCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collectionCategory = $this->CollectionCategories->newEntity();
        if ($this->request->is('post')) {
            $collectionCategory = $this->CollectionCategories->patchEntity($collectionCategory, $this->request->getData());
            if ($this->CollectionCategories->save($collectionCategory)) {
                $this->Flash->success(__('The collection category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection category could not be saved. Please, try again.'));
        }
        $this->set(compact('collectionCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collection Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collectionCategory = $this->CollectionCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collectionCategory = $this->CollectionCategories->patchEntity($collectionCategory, $this->request->getData());
            if ($this->CollectionCategories->save($collectionCategory)) {
                $this->Flash->success(__('The collection category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection category could not be saved. Please, try again.'));
        }
        $this->set(compact('collectionCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collection Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collectionCategory = $this->CollectionCategories->get($id);
        if ($this->CollectionCategories->delete($collectionCategory)) {
            $this->Flash->success(__('The collection category has been deleted.'));
        } else {
            $this->Flash->error(__('The collection category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
