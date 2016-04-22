<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['login', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['EmployeeSalaries', 'Teams']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data);
//            exit;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $userId = $user->id;
                if ($this->request->data['salary']) {
                    $this->loadModel('EmployeeSalaries');
                    $employeeData = TableRegistry::get('EmployeeSalaries');
                    $employeeData = $employeeData->newEntity();
                    $employeeData->user_id = $user->id;
                    $employeeData->current_salaty = $this->request->data['salary'];

                    $this->EmployeeSalaries->save($employeeData);
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->loadModel('EmployeeSalaries');
        $salaryInfo = $this->EmployeeSalaries->find()->where(['user_id' => $id])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                if ($this->request->data['salary']) {
                    $employeeData = TableRegistry::get('EmployeeSalaries');
                    $employeeData = $employeeData->newEntity();
                    $employeeData->id = $salaryInfo->id;
                    $employeeData->user_id = $id;
                    $employeeData->current_salaty = $this->request->data['salary'];
                    $employeeData->last_increment_date = $this->request->data['last_increment_date'];
                    $employeeData->last_increment_amount = $this->request->data['last_increment_amount'];

                    $this->EmployeeSalaries->save($employeeData);
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user', 'salaryInfo'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $pageTitle = 'Login Panel';
        $this->viewBuilder()->layout('login_layout');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
        $this->set(compact('pageTitle'));
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function changepassword($id = null) {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
           // debug($this->request->data);
          debug($this->request->data['password'] = $this->request->data['new_password']);
             $user = $this->Users->patchEntity($user, $this->request->data);
             ///id,  2 field
           // exit;
            // new_pass == confirm
            if($this->request->data['new_password'] === $this->request->data['confirm_password']){
               if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
               }
            }
             else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('user'));
    }

}
