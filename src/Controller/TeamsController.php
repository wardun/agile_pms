<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
//            'contain' => ['Projects', 'Users']
            'contain' => ['TeamDetails']
        ];
        
        $this->loadModel('Users');
        $users = $this->Users->find('all')->where(['role !=' => 1])->select(['id', 'username']);
        if($users){
            foreach ($users as $user){
                $userList[$user->id] = $user->username;
            }
            unset($user);
        }
        $teams = $this->paginate($this->Teams);

        $this->set(compact('teams', 'userList'));
        $this->set('_serialize', ['teams']);
    }

    /**
     * View method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $team = $this->Teams->get($id, [
            //'contain' => ['Projects', 'Users']
        ]);

        $this->set('team', $team);
        $this->set('_serialize', ['team']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $team = $this->Teams->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data);exit;
            $team = $this->Teams->patchEntity($team, $this->request->data);
            if ($this->Teams->save($team)) {
                foreach ($this->request->data['user_id'] as $user){
                    $this->loadModel('TeamDetails');
                    $teamDetailData = TableRegistry::get('TeamDetails');
                    $teamDetailData = $teamDetailData->newEntity();
                    $teamDetailData->team_id = $team->id;
                    $teamDetailData->user_id = $user;

                    $this->TeamDetails->save($teamDetailData);
                }
                $this->Flash->success(__('The team has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team could not be saved. Please, try again.'));
            }
        }
        //$projects = $this->Teams->Projects->find('list', ['limit' => 200]);
        $this->loadModel('Users');
        $users = $this->Users->find('all')->where(['role !=' => 1])->select(['id', 'username']);
        
        $this->set(compact('team', 'users'));
        //$this->set('_serialize', ['team']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $team = $this->Teams->patchEntity($team, $this->request->data);
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('The team has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team could not be saved. Please, try again.'));
            }
        }
        //$projects = $this->Teams->Projects->find('list', ['limit' => 200]);
        //$users = $this->Teams->Users->find('list', ['limit' => 200]);
        $this->set(compact('team'));
        $this->set('_serialize', ['team']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $team = $this->Teams->get($id);
        if ($this->Teams->delete($team)) {
            $this->Flash->success(__('The team has been deleted.'));
        } else {
            $this->Flash->error(__('The team could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
