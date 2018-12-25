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
    public function index($userGroupId = null)
    {
        $this->loadModel('Groups');
        $groups = $this->Groups->find('list');

        if(isset($userGroupId) && !is_null($userGroupId)){
            $this->viewBuilder()->enableAutoLayout(false);
            $this->set(compact('userGroupId'));
            return $this->render('/Permissions/list_permissions');
        }

        $this->set(compact('groups', 'acos', 'headers', 'actions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($groupId, $permission, $action)
    {
        $permission = str_replace('-', '/', $permission);

        if ($action === 'allow')
            $this->allowPermission($groupId, $permission);
        else
            $this->denyPermisson($groupId, $permission);

        $this->autoRender = false; //prevent template rendering
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

    private function allowPermission($groupId, $permission)
    {
        switch ($permission) {
            default:
                $this->Acl->allow(['Groups' => ['id' => $groupId]], $permission);
                break;
        }
    }

    private function denyPermisson($groupId, $permission)
    {
        switch ($permission) {
            default:
                $this->Acl->deny(['Groups' => ['id' => $groupId]], $permission);
                break;
        }
    }
}
