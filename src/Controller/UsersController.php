<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();

//        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupRegionId = $this->request->getSession()->read('Auth.User.region_id');

        if (is_null($groupRegionId))
            $permissionRegions = $this->Regions->find('list');
        else
            $permissionRegions = $this->Regions->find('list', ['conditions' => ['Regions.id' => $groupRegionId]]);

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data, ['associated' => ['GroupDistrictRegionSchoolUsers']]);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'permissionRegions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupRegionId = $this->request->getSession()->read('Auth.User.region_id');

        if (is_null($groupRegionId))
            $permissionRegions = $this->Regions->find('list');
        else
            $permissionRegions = $this->Regions->find('list', ['conditions' => ['Regions.id' => $groupRegionId]]);

        $user = $this->Users->get($id, [
            'contain' => ['GroupDistrictRegionSchoolUsers']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => ['GroupDistrictRegionSchoolUsers']]);

            if ($this->Users->save($user, ['associated' => ['GroupDistrictRegionSchoolUsers']])) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'permissionRegions'));
    }

    public function login()
    {
        // Identify user
        if ($this->request->is('post')) {
            $this->loadModel('GroupDistrictRegionSchoolUsers');
            $user = $this->Auth->identify();

            if ($user) {
                $permission = $this->GroupDistrictRegionSchoolUsers->findByUserId($user['id'])->first();
                if (is_null($permission)) {
                    $this->Flash->error(__('User permissions not set'));
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }

                $user['region_id'] = $permission->region_id;
                $user['district_id'] = $permission->district_id;
                $user['centre_id'] = $permission->centre_id;

                //Set session variables
                $this->request->getSession()->write('regionId', $permission->region_id);
                $this->request->getSession()->write('districtId', $permission->district_id);
                $this->request->getSession()->write('centreId', $permission->centre_id);

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            // User not identified
            $this->Flash->error(__('Your username or password is incorrect'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Logged out successfully'));
        $session = $this->getRequest()->getSession();
        $session->delete('regionId');
        $session->delete('districtId');
        $session->delete('centreId');
        return $this->redirect($this->Auth->logout());
    }

    public function changeUserPassword($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData(), ['fieldList' => 'password']);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password has been changed'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Password could not be changed. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    public function changePassword()
    {

        $user = $this->Users->get($this->request->getSession()->read('Auth.User.id'));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, [
                'old_password' => $this->request->getData('old_password'),
                'password' => $this->request->getData('password1'),
                'password1' => $this->request->getData('password1'),
                'password2' => $this->request->getData('password2')
            ],
                ['validate' => 'password']
            );

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password has been changed'));
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Password could not be changed. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function reload()
    {
        $session = $this->getRequest()->getSession();
        $session->write('regionId', $this->request->getQuery('regionId'));
        $session->write('districtId', $this->request->getQuery('districtId'));
        $session->write('centreId', $this->request->getQuery('centreId'));
        $session->write('examTypeId', $this->request->getQuery('examTypeId'));
        return $this->response->withType("application/json")->withStringBody(json_encode(['response' => true]));
    }
}
