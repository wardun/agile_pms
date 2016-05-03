<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Sprints Controller
 *
 * @property \App\Model\Table\SprintsTable $Sprints
 */
class SprintsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $projectId = '';
        $sprintHtml = '';

        $this->loadModel('Projects');
        $projects = $this->Projects->find('all')->select(['id', 'title']);
        if (isset($this->request->query['project_id'])) {
            $projectId = $this->request->query['project_id'];
            $sprintId = $this->request->query['sprint_id'];

            $sprints = $this->Sprints->find()->where(['project_id' => $projectId])->select(['sprint'])->group('sprint');
            if ($sprints) {
                foreach ($sprints as $sprint) {
                    $selected = ($sprintId == $sprint->sprint) ? 'selected = selected' : '';
                    $sprintHtml.='<option value="' . $sprint->sprint . '" ' . $selected . '> Sprint ' . $sprint->sprint . '</option>';
                }
                unset($sprint);
            }

            // check sprint started or not
            $connection = ConnectionManager::get('default');
            $sprintQuery = $connection->execute(
                            "SELECT a.`sprint` , DATE(MIN(b.`start_date`)) sprint_start, DATE(MAX(b.`end_date`)) sprint_end, IF(b.`start_date` < NOW(),'started','not_yet_started') sprint_status
                    FROM sprints a
                    INNER JOIN tasks b
                    ON a.`project_id` = b.`project_id` AND a.`task_id` = b.`id`
                    WHERE a.`project_id` = $projectId AND a.`sprint` = $sprintId
                    ORDER BY b.`start_date` ASC
                    LIMIT 1"
                    )
                    ->fetchAll('assoc');

            $sprintCheck = $sprintQuery[0];

            if ($sprintCheck['sprint_status'] == 'started') {
                // get info of current sprint
                $singleValues['sprint_start'] = $sprintCheck['sprint_start'];
                $singleValues['sprint_end'] = $sprintCheck['sprint_end'];

                $lastDate = new \DateTime($sprintCheck['sprint_end']);
                $today = new \DateTime();
                
                $singleValues['remaining_days'] = $today->diff($lastDate)->format("%R%a");
                
                $taskStatusQuery = $connection->execute("
                               SELECT COUNT(b.`id`) total,
                               (SELECT COUNT(id) FROM sprints WHERE is_completed = 1 AND `project_id` = $projectId AND `sprint` = $sprintId) completed,
                               (SELECT COUNT(*) FROM tasks WHERE end_date BETWEEN DATE(MIN(b.`start_date`)) AND DATE(MAX(b.`end_date`)) AND `project_id` = $projectId) sprint_plan
                               FROM sprints a
                               INNER JOIN tasks b
                               ON a.`project_id` = b.`project_id` AND a.`task_id` = b.`id`
                               WHERE a.`project_id` = $projectId AND a.`sprint` = $sprintId
                            ")->fetchAll('assoc');
                
                $taskStatus = $taskStatusQuery[0];
                
                //sprint details
                $sprintTasks = $this->Sprints->find()->where(['Sprints.project_id' => $projectId, 'Sprints.sprint' => $sprintId])->contain(['Tasks']);
                
                //user wise info
                $userTasks = $this->Sprints->find()->where(['Sprints.project_id' => $projectId, 'Sprints.sprint' => $sprintId])->contain(['Tasks'])->select(['Tasks.assgined_to'])->group(['Tasks.assgined_to']);
                if($userTasks){
                    $this->loadModel('Users');
                    foreach ($userTasks as $dev){
                        $developer [] = $this->Users->get($dev->Tasks->assgined_to);
                    }
                    unset($dev);
                }
                
                $userTaskDetail = $connection->execute("
                                SELECT b.`task_name`, b.`start_date`, b.`assgined_to`, HOUR(b.`actual_end_date` - b.`start_date`) hours, a.`is_completed`, (SELECT COUNT(*) FROM task_bugs WHERE task_id = b.id) bugs
                                FROM sprints a
                                INNER JOIN tasks b
                                ON a.`project_id` = b.`project_id` AND a.`task_id` = b.`id`
                                WHERE a.`project_id` = $projectId AND a.`sprint` = $sprintId
                            ")->fetchAll('assoc');
                
                $userTaskStatus = $connection->execute("
                                SELECT b.`assgined_to`, COUNT(*) total,
                                (SELECT COUNT(*) FROM sprints WHERE a.`project_id` = $projectId AND a.`sprint` = $sprintId AND is_completed = 1) completed
                                FROM sprints a
                                INNER JOIN tasks b
                                ON a.`project_id` = b.`project_id` AND a.`task_id` = b.`id`
                                WHERE a.`project_id` = $projectId AND a.`sprint` = $sprintId
                                GROUP BY b.`assgined_to`
                            ")->fetchAll('assoc');
                if($userTaskStatus){
                    foreach ($userTaskStatus as $u){
                        $userTaskCount[$u['assgined_to']] = json_encode(['total' => $u['total'], 'completed' =>$u['completed'], 'pending' =>($u['total'] - $u['completed'])]);
                    }
                    unset($u);
                }
                
            }
        }
        $this->set(compact(
                'sprints', 'projects', 'sprintHtml', 'projectId', 'sprintCheck', 'singleValues', 'taskStatus', 'sprintTasks', 'developer',
                'userTaskDetail', 'userTaskCount'
                ));
    }

    /**
     * View method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $sprint = $this->Sprints->get($id, [
            'contain' => ['Projects', 'Tasks']
        ]);

        $this->set('sprint', $sprint);
        $this->set('_serialize', ['sprint']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sprint = $this->Sprints->newEntity();
        if ($this->request->is('post')) {
            $sprint = $this->Sprints->patchEntity($sprint, $this->request->data);
            if ($this->Sprints->save($sprint)) {
                $this->Flash->success(__('The sprint has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sprint could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Sprints->Projects->find('list', ['limit' => 200]);
        $tasks = $this->Sprints->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('sprint', 'projects', 'tasks'));
        $this->set('_serialize', ['sprint']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $sprint = $this->Sprints->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sprint = $this->Sprints->patchEntity($sprint, $this->request->data);
            if ($this->Sprints->save($sprint)) {
                $this->Flash->success(__('The sprint has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sprint could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Sprints->Projects->find('list', ['limit' => 200]);
        $tasks = $this->Sprints->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('sprint', 'projects', 'tasks'));
        $this->set('_serialize', ['sprint']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $sprint = $this->Sprints->get($id);
        if ($this->Sprints->delete($sprint)) {
            $this->Flash->success(__('The sprint has been deleted.'));
        } else {
            $this->Flash->error(__('The sprint could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function tasks() {
        $projectId = $this->request->data['projectId'];
        $this->loadModel('Sprints');
        $sprints = $this->Sprints->find('all')->where(['project_id' => $projectId])->group(['sprint'])->select(['id', 'sprint']);

        $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint ';

        if ($sprints) {
            foreach ($sprints as $t) {
                echo '<div id="sprints" ' . $t->id . '"> Sprints' . $t->sprint . ':</div><div>' . $t->sprint . '</div>';
            }
            unset($t);
        }
        exit;
    }

    public function userStories() {
        $this->loadModel('Projects');
        $projects = $this->Projects->find('all')->select(['id', 'title']);

//        $this->loadModel('Sprints');
//        $sprints = $this->Sprints->find('all')->where(['project_id' => 1])->group(['sprint'])->select(['id', 'sprint']);
        //$tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name as Tname,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint ';

        $this->set(compact('projects'));
        //$this->set(compact('sprints', 'sprints'));
    }

    public function getProjectSprint() {
        $projectId = $this->request->data['projectId'];
        $sprints = $this->Sprints->find()->where(['project_id' => $projectId])->select(['sprint'])->group('sprint');
        if ($sprints) {
            foreach ($sprints as $sprint) {
                echo '<option value="' . $sprint->sprint . '"> Sprint ' . $sprint->sprint . '</option>';
            }
            unset($sprint);
        }
        exit;
    }

    public function getTasksofSprint() {
        $projectId = $this->request->data['projectId'];
        $sprintId = $this->request->data['sprintId'];
        $connection = ConnectionManager::get('default');
        $tasks = $connection->execute('SELECT b.`sprint`, a.`task_name` tname, a.`detail` details FROM tasks a INNER JOIN sprints b ON a.`id` = b.`task_id` AND a.`project_id` = b.`project_id` WHERE b.`sprint` = ' . $sprintId . ' and a.`project_id` =' . $projectId)
                ->fetchAll('assoc');

        if ($tasks) {
            echo '<table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                    <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task Details</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($tasks as $task) {
                echo '<tr>
                    <td>' . $task['tname'] . '</td>
                    <td>' . $task['details'] . '</td>
                </tr>';
            }
            unset($task);
            echo '</tbody></table>';
        }
        exit;
    }

}
