<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * AttachmentTypes Controller
 *
 * @property \App\Model\Table\AttachmentTypesTable $AttachmentTypes
 */
class HomesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->loadModel('Users');
        $totalEmployee = $this->Users->find()->count();
        $birthdayInfo = $this->Users->find()->where(['MONTH(dob)' => 'MONTH(NOW())', 'DAY(dob)' => 'DAY(NOW())'])->count();

        $this->loadModel('Projects');
        $runningProjects = $this->Projects->find()->where(['actual_end_date IS' => NULL])->count();

        $this->loadModel('Notices');
        $notices = $this->Notices->find()->where(['action_date <=' => 'NOW()'])->count();

        $proejcts = $this->Projects->find()->where(['actual_end_date IS' => NULL]);

        $connection = ConnectionManager::get('default');

        if ($proejcts) {
            foreach ($proejcts as $project) {
                $sprintQuery = $connection->execute(
                                "
                                 SELECT a.`sprint`, COUNT(b.`id`) total,
                                (SELECT COUNT(id) FROM sprints WHERE is_completed = 1 AND `project_id` = 1 AND sprint = a.`sprint`) completed
                                FROM sprints a
                                INNER JOIN tasks b
                                ON a.`project_id` = b.`project_id` AND a.`task_id` = b.`id`
                                WHERE a.`project_id` = $project->id
                                GROUP BY a.`sprint`
                                "
                        )
                        ->fetchAll('assoc');
                
                if($sprintQuery){
                    foreach($sprintQuery as $sprint){
                        $sprintStatus[$project->id][] = json_encode(['sprint' => $sprint['sprint'],'total' => $sprint['total'], 'completed' => $sprint['completed'], 'pending' => ($sprint['total'] - $sprint['completed'])]);
                    }
                }
            }
        }


        $this->set(compact('totalEmployee', 'runningProjects', 'notices', 'birthdayInfo', 'proejcts', 'sprintStatus'));
    }

}
