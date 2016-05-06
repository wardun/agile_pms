<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $project = $this->Projects->get($id, [
            'contain' => ['Attachments', 'Sprints', 'Tasks']
        ]);
        
        $this->loadModel('Tasks');
        $totalTask = $this->Tasks->find()->where(['project_id' => $id])->count();
        $completedTask = $this->Tasks->find()->where(['project_id' => $id, 'is_completed' => 0])->count();
                
        $query = $this->Tasks->find()->where(['project_id' => $id,'is_new' => 0]);
        $hourBeforeProejctStart = $query->select(['task_hour' => $query->func()->sum('HOUR(TIMEDIFF(end_date, start_date))')])->first();
        
        $query1 = $this->Tasks->find()->where(['project_id' => $id,'is_completed' => 1]);
        $hoursCompleted = $query1->select(['task_hour' => $query->func()->sum('HOUR(TIMEDIFF(end_date, start_date))')])->first();
        
        $query3 = $this->Tasks->find()->where(['project_id' => $id, 'DATE(end_date) <=' => date('Y-m-d')]);
        $hoursWhenPlanned = $query3->select(['task_hour' => $query->func()->sum('HOUR(TIMEDIFF(end_date, start_date))')])->first();
        
        if($project->actual_end_date == '0000-00-00 00:00:00'){
            $query4 = $this->Tasks->find()->where(['project_id' => $id]);
            $hourAfterProejct = $query4->select(['task_hour' => $query->func()->sum('HOUR(TIMEDIFF(actual_end_date, start_date))')])->first();
        }else{
            $query4 = $this->Tasks->find()->where(['project_id' => $id]);
            $hourAfterProejct = $query4->select(['task_hour' => $query->func()->sum('HOUR(TIMEDIFF(end_date, start_date))')])->first();
        }
        
        $startHour = $hourBeforeProejctStart->task_hour;
        $completedHour = $hoursCompleted->task_hour;
        $planedHour = $hoursWhenPlanned->task_hour;
        $finaldHour = $hourAfterProejct->task_hour;
        
        $allTasks = $this->Tasks->find()->where(['project_id' => $id]);
        
        
        $this->set(compact('project', 'startHour', 'completedHour', 'planedHour', 'finaldHour', 'totalTask', 'completedTask', 'allTasks'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data);exit;
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Users');
        $users = $this->Users->find('all')->where(['role' => 2])->select(['id', 'username']);
        if ($users) {
            foreach ($users as $user) {
                $managers[$user->id] = $user->username;
            }
            unset($user);
        }

        $this->set(compact('project', 'managers'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('project'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function teams() {
        $managerId = $this->request->data['managerId'];
        $this->loadModel('TeamDetails');
        $teams = $this->TeamDetails->find()->where(['user_id' => $managerId])->group(['team_id'])->contain(['Teams']);
        if ($teams) {
            foreach ($teams as $t) {
                echo '<option value="' . $t->team->id . '">' . $t->team->title . '</option>';
            }
            unset($t);
        }
        exit;
//$this->set(compact('teams'));
    }

}
