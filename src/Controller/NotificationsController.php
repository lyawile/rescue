<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $notifications = $this->paginate($this->Notifications);

        $this->set(compact('notifications'));
    }

    public function inbox(){
        $userId =  $this->request->getSession()->read('Auth.User.id');
        if(isset($userId)){
            $user = $this->Users->get($userId, ['contain' => ['Notifications']]);
            $inboxNotifications = $user->notifications;
        }

        $this->set(compact('inboxNotifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('notification', $notification);
    }

    public function inboxView($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('notification', $notification);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Groups');
        $notification = $this->Notifications->newEntity();

        if ($this->request->is('post')) {
            $this->loadModel('Users');

            $groupUsers = $this->Users->find('all', [
                'fields' => ['id'],
                'conditions' => ['Users.group_id IN' => $this->request->getData('groups')]
                ]
            );

            $data = $this->request->getData();
            $groupUsers = $groupUsers->extract('id')->toArray();

            $data['users'] = ['_ids' => $groupUsers];
            $notification = $this->Notifications->patchEntity($notification, $data);

            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
//        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $groups = $this->Groups->find('list');
        $this->set(compact('notification','groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notification = $this->Notifications->get($id);
        if ($this->Notifications->delete($notification)) {
            $this->Flash->success(__('The notification has been deleted.'));
        } else {
            $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
