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

                if ($sprintQuery) {
                    foreach ($sprintQuery as $sprint) {
                        $sprintStatus[$project->id][] = json_encode(['sprint' => $sprint['sprint'], 'total' => $sprint['total'], 'completed' => $sprint['completed'], 'pending' => ($sprint['total'] - $sprint['completed'])]);
                    }
                }
            }
        }

        //todays tasks
        $this->loadModel('Tasks');
        $todaysTasks = $this->Tasks->find()->where(['DATE(Tasks.start_date) <=' => 'DATE(NOW()', 'Tasks.actual_end_date' => '0000-00-00 00:00:00'])->contain(['AssignedUser', 'Projects']);

        //todays scrum report
        $todaysScrums = $connection->execute("
                        SELECT b.`title`, a.`file_name`, a.`origiginal_file_name`,a.`id`
                        FROM attachments a 
                          INNER JOIN projects b 
                            ON b.id = a.project_id 
                        WHERE a.attachment_type_id = 3 
                          AND DATE(a.created_at) = DATE(NOW())
                         ")
                ->fetchAll('assoc');

        //calendar info
        $calendarInfo = $this->Tasks->find()->select(['Projects.title', 'Tasks.task_name', 'Tasks.start_date', 'Tasks.end_date'])->contain(['Projects']);
        if ($calendarInfo) {
            $i=0;
            foreach ($calendarInfo as $calendar) {
                $dashboardCalendar[$i]['title'] = $calendar->project->title . ' : ' . $calendar->task_name;
                $dashboardCalendar[$i]['start'] = date('Y-m-d', strtotime($calendar->start_date));
                $dashboardCalendar[$i]['end'] = date('Y-m-d', strtotime($calendar->end_date));
                $dashboardCalendar[$i]['backgroundColor'] = '#f39c12';
                $dashboardCalendar[$i]['borderColor'] = '#f39c12';
                $i++;
            }
            unset($calendar);
        }
        
        
        $this->set(compact('totalEmployee', 'runningProjects', 'notices', 'birthdayInfo', 'proejcts', 'sprintStatus', 'todaysTasks', 'todaysScrums', 'dashboardCalendar'));
    }

}
