<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;

/**
 * Permissions Controller
 *
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->loadModel('Groups');
        $this->loadModel('Regions');
        $this->loadModel('Districts');
        $this->loadModel('Centres');
        $this->loadModel('GroupDistrictRegionSchoolUsers');

        $groups = $this->Groups->find('list');
        $groupRegionId = $this->request->getSession()->read('Auth.User.region_id');

        if (is_null($groupRegionId))
            $permissionRegions = $this->Regions->find('list');
        else
            $permissionRegions = $this->Regions->find('list', ['conditions' => ['Regions.id' => $groupRegionId]]);

        if ($this->request->is(['post'])) {

            $data = $this->request->getData();

            $data['group_district_region_school_users'] = [
                'group_id' => $this->request->getData('group_id'),
                'region_id' => $this->request->getData('region_id'),
                'district_id' => $this->request->getData('district_id')
            ];

            $groupPermission = $this->GroupDistrictRegionSchoolUsers->findByGroupId($this->request->getData('group_id'))->first();
            if(is_null($groupPermission))
                $groupPermission = $this->GroupDistrictRegionSchoolUsers->newEntity();
            $groupPermission = $this->GroupDistrictRegionSchoolUsers->patchEntity($groupPermission, $data);

            if($this->GroupDistrictRegionSchoolUsers->save($groupPermission)){
                $this->Flash->success(__("Permissions has been saved!"));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__("Permissions could not be saved"));
        }

        $this->set(compact('groups'));
        $this->set(compact('permissionRegions'));
    }

    public function save(){

    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);

        $this->set('permission', $permission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $this->set(compact('permission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $this->set(compact('permission'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
