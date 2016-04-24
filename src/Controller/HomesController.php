<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttachmentTypes Controller
 *
 * @property \App\Model\Table\AttachmentTypesTable $AttachmentTypes
 */
class HomesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {        
        $this->loadModel('Projects');
        $projects = $this->Projects->find('all')->select(['id', 'title']);
        
         $this->loadModel('Sprints');
         $sprints = $this->Sprints->find('all')->where(['project_id' => 1 ])->group(['sprint'])->select(['id', 'sprint']);
         
         $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name as Tname,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint '; 
         
         $this->set(compact('sprints', 'projects'));
         //$this->set(compact('sprints', 'sprints'));
    }
    
    public function tasks(){
        
        $projectId = $this->request->data['projectId'];
        $this->loadModel('Sprints');
        $sprints = $this->Sprints->find('all')->where(['project_id' => $projectId ])->group(['sprint'])->select(['id', 'sprint']);
         
        $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint '; 
         
        if ($sprints) {
            foreach ($sprints as $t) {
                echo '<option value="' . $t->team->id . '">' . $t->team->title . '</option>';
            }
            unset($t);
        }
        exit;

    }
       public function sprint_wise_tasks(){
        
        $sprintId = $this->request->data['sprintId'];
        $this->loadModel('Sprints');
        $sprints = $this->Sprints->find('all')->where(['project_id' => $sprintId ])->group(['sprint'])->select(['id', 'sprint']);
         
        $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint '; 
         
        if ($sprints) {
            foreach ($sprints as $t) {
                echo '<div id="sprints" ' . $t->id . '"> Sprints' . $t->sprint . ':</div><div>'.$t->sprint.'</div>';
            }
            unset($t);
        }
        exit;

    }

}
