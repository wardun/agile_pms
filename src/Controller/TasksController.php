<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
       $tasks = "";
        $projects = [];
         
         $this->loadModel('Projects');
         $projectData = $this->Projects->find('all', ['limit' => 200]);
         if ($projectData) {
            foreach ($projectData as $project) {
                $projects[$project->id] = $project->title;
            }
            unset($project);
        }
      
        //if submit 
        if (isset($this->request->query['project_id'])) {
            $projectId = $this->request->query['project_id'];
            
             $this->paginate = [
                'contain' => ['Projects']
            ];
             
             $tasks = $this->paginate($this->Tasks->find()->where(['Tasks.project_id' =>$projectId]));
        }
        
        $this->set(compact('tasks','projects'));
        $this->set('_serialize', ['tasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $task = $this->Tasks->get($id, [
            'contain' => ['Projects', 'Attachments', 'Sprints']
        ]);

        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $allprojects = $this->Tasks->Projects->find('all')->where(['actual_end_date IS' => NULL])->select(['id', 'title']);
        if ($allprojects) {
            foreach ($allprojects as $project) {
                $projects[$project->id] = $project->title;
            }
            unset($project);
        }
        $this->set(compact('task', 'projects'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200]);
        $this->set(compact('task', 'projects'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function assignTask($id = null) {
        $tasks = $this->Tasks->get($id);
        $projects = $this->Tasks->Projects->get($tasks->project_id);
        $teamId = $projects->team_id;

        $users = [];
        $connection = ConnectionManager::get('default');
        $teamMembers = $connection->execute('
                                SELECT b.`id`, b.`username`
                                FROM team_details a
                                INNER JOIN users b
                                ON a.`user_id` = b.`id`
                                WHERE a.`team_id` = 1')
                ->fetchAll('assoc');
        if ($teamMembers) {
            foreach ($teamMembers as $member) {
                $users[$member['id']] = $member['username'];
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $tasks['start_date'] = $this->request->data['assign_date'] . ' ' . $this->request->data['start_time'];
            $tasks['end_date'] = $this->request->data['delivery_date'] . ' ' . $this->request->data['end_time'];
            $tasks = $this->Tasks->patchEntity($tasks, $this->request->data);
            if ($this->Tasks->save($tasks)) {
                // sprint calculation start
                $this->loadModel('Sprints');
                $check_project_task = $this->Sprints->find()->where(['project_id' => $tasks->project_id, 'task_id' => $id]);
                if (empty($check_project_task->first())) {
                    $check_empty = $this->Sprints->find()->where(['project_id' => $tasks->project_id]);
                    if (empty($check_empty->first())) {
                        //first entry
                        $sprint = $this->Sprints->newEntity();
                        $sprint->sprint = 1;
                        $sprint->project_id = $tasks->project_id;
                        $sprint->task_id = $id;
                        $sprint = $this->Sprints->patchEntity($sprint, $this->request->data);
                        $this->Sprints->save($sprint);
                    } else {
                        $sprint = $this->Sprints->newEntity();
                        $sprint->sprint = $this->get_sprint_info($tasks->project_id, $tasks->task_duration);
                        $sprint->project_id = $tasks->project_id;
                        $sprint->task_id = $id;
                        $sprint = $this->Sprints->patchEntity($sprint, $this->request->data);
                        $this->Sprints->save($sprint);
                    }
                }

                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('tasks', 'users'));
    }

    function get_sprint_info($project_id = null, $hour = null) {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('
                                SELECT  a.`sprint` sprint, a.`project_id`,SUM(b.`task_duration`) total_hour, (SELECT `sprint_duration`  FROM settings) sprint_duration
                                FROM sprints a
                                INNER JOIN tasks b
                                ON a.`task_id` = b.`id`
                                WHERE a.`project_id` = ' . $project_id . ' AND a.`sprint` = sprint')
                ->fetchAll('assoc');
        if ($query[0]['sprint_duration'] >= ($query[0]['total_hour'] + $hour)) {
            $sprintInfo = $query[0]['sprint'];
        } else {
            $sprintInfo = $query[0]['sprint'] + 1;
        }

        return ($sprintInfo);
    }
    
    public function qa($id = null){
        /*  $task = $this->Tasks->get($id, [
            'contain' => ['Projects']
        ]);*/
        /*
        $task = $this->TaskBugs->newEntity();
        if ($this->request->is('post')) {
            $task = $this->TaskBugs->patchEntity($task, $this->request->data);
            if ($this->TaskBugs->save($task)) {
                //$this->set('is_completed = 0', $this->Sprints->findById($id));
               // $data = array('id' => $id, 'is_completed' => '0');
               // $this->Sprints->save($data);
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        
        $this->set('task', $task);*/
    }

}
