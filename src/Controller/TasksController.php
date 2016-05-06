<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

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
        if (isset($this->request->query['projectid'])) {
            $projectId = $this->request->query['projectid'];

            $this->paginate = [
                'contain' => ['Projects', 'Sprints', 'AssignedUser']
            ];

            if ($this->Auth->user('role') == 1 || $this->Auth->user('role') == 2) {
                $tasks = $this->paginate($this->Tasks->find()->where(['Tasks.project_id' => $projectId]));
            } else if ($this->Auth->user('role') == 3) {
                $tasks = $this->paginate($this->Tasks->find()->where(['Tasks.project_id' => $projectId, 'Tasks.assgined_to' => $this->Auth->user('id')]));
            } else if ($this->Auth->user('role') == 4) {
                $tasks = $this->paginate($this->Tasks->find()->where(['Tasks.project_id' => $projectId, 'Tasks.is_completed' => 2]));
            }
        }

        $this->set(compact('tasks', 'projects'));
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
            if (isset($this->request->data['force_assign'])) {
                $this->request->data['is_new'] = 1;
            }

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
                        if (isset($this->request->data['force_assign'])) {
                            $sprint->is_new = 1;
                        }
                        $sprint = $this->Sprints->patchEntity($sprint, $this->request->data);
                        $this->Sprints->save($sprint);
                    } else {
                        $sprint = $this->Sprints->newEntity();

                        $sprintInfo = $this->Sprints->find()->where(['project_id' => $tasks->project_id])->select(['sprint'])->last();
                        $currentSprint = $sprintInfo->sprint;

                        $firstTaskOfSprint = $this->Sprints->find()->where(['project_id' => $tasks->project_id, 'sprint' => $currentSprint])->select(['task_id'])->first();

                        $taskInfo = $this->Tasks->get($firstTaskOfSprint->task_id);
                        $startDate = date('Y-m-d', strtotime($taskInfo->start_date));

                        $this->loadModel('Settings');
                        $setting = $this->Settings->find()->first();

                        $sprintStartDate = new \DateTime($startDate);
                        $sprintStartDate->modify("+$setting->sprint_duration day");
                        $sprintEndDate = $sprintStartDate->format('Y-m-d');

                        $datetime1 = new \DateTime($tasks['end_date']);
                        $datetime2 = new \DateTime($sprintEndDate);
                        $interval = $datetime1->diff($datetime2);

                        if (isset($this->request->data['force_assign'])) {
                            $sprint->sprint = $currentSprint;
                            $sprint->is_new = 1;
                        } else {
                            if ($interval->format('%R%a') > 0) {
                                $sprint->sprint = $currentSprint;
                            } else {
                                $sprint->sprint = $currentSprint + 1;
                            }
                        }

                        //$sprint->sprint = $this->get_sprint_info($tasks->project_id, $tasks->task_duration);
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

    public function qa($id = null) {
        $task = $this->Tasks->get($id);

        $this->loadModel('TaskBugs');
        $taskBug = $this->TaskBugs->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['is_completed'])) {
                $this->request->data['bug_free'] = 1;
            }
            $taskbug = $this->TaskBugs->patchEntity($taskBug, $this->request->data);
            if ($this->TaskBugs->save($taskbug)) {
                if (isset($this->request->data['is_completed'])) {
                    $this->loadModel('Sprints');
                    $sprint = $this->Sprints->find()->where(['task_id' => $id])->first();
                    $data['is_completed'] = 1;
                    $sprint = $this->Sprints->patchEntity($sprint, $data);
                    $this->Sprints->save($sprint);

                    $taskData['is_completed'] = 1;
                    $taskData['actual_end_date'] = Time::createFromTimestamp(time());
                    $task = $this->Tasks->patchEntity($task, $taskData);
                    $this->Tasks->save($task);
                }

                $this->loadModel('Notifications');
                $notification = $this->Notifications->newEntity();
                $notificationData['receiverid'] = $task->assgined_to;
                $notificationData['message'] = 'You have a new QA report';
                $notificationData['link'] = 'tasks/view/' . $id;
                $notificationData['status'] = 0;

                $notification = $this->Notifications->patchEntity($notification, $notificationData);

                $this->Notifications->save($notification);

                $this->Flash->success(__('The QA report has been submitted.'));
                return $this->redirect(['action' => 'index?projectid=' . $task->project_id]);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }


        $this->loadModel('TaskBugs');
        $bugLists = $this->TaskBugs->find()->where(['task_id' => $id]);

        $this->set(compact('task', 'taskBug', 'bugLists'));
    }

    public
            function taskComplete($id = null) {
        $task = $this->Tasks->get($id);
        $data['is_completed'] = 2;
        $task = $this->Tasks->patchEntity($task, $data);
        if ($this->Tasks->save($task)) {
            $this->loadModel('Notifications');
            $notification = $this->Notifications->newEntity();
            $notificationData['receiverid'] = 13;
            $notificationData['message'] = 'You have a new QA report';
            $notificationData['link'] = 'tasks/view/' . $id;
            $notificationData['status'] = 0;

            $notification = $this->Notifications->patchEntity($notification, $notificationData);

            $this->Notifications->save($notification);

            $this->Flash->success(__('The task report has been sucessfully updated.'));
            return $this->redirect(['action' => 'index?projectid=' . $task->project_id]);
        } else {
            $this->Flash->error(__('The task report could not be saved. Please, try again.'));
        }
        exit;
    }

}
