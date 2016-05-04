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
        $this->loadModel('Users');
        $totalEmployee = $this->Users->find()->count();
        $birthdayInfo = $this->Users->find()->where(['MONTH(dob)' => 'MONTH(NOW())', 'DAY(dob)' => 'DAY(NOW())'])->count();
        
        $this->loadModel('Projects');
        $runningProjects = $this->Projects->find()->where(['actual_end_date IS' => NULL])->count();
        
        $this->loadModel('Notices');
        $notices = $this->Notices->find()->where(['action_date <=' => 'NOW()'])->count();
       
        
       $this->set(compact('totalEmployee', 'runningProjects', 'notices', 'birthdayInfo')) ;
    }

}
