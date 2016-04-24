<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sprints Controller
 *
 * @property \App\Model\Table\SprintsTable $Sprints
 */
class SprintsController extends AppController
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
        
        $this->set(compact('sprints', 'projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Sprint id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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
    public function add()
    {
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
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
        $sprints = $this->Sprints->find('all')->where(['project_id' => $projectId ])->group(['sprint'])->select(['id', 'sprint']);
         
        $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint '; 
         
        if ($sprints) {
            foreach ($sprints as $t) {
                echo '<div id="sprints" ' . $t->id . '"> Sprints' . $t->sprint . ':</div><div>'.$t->sprint.'</div>';
            }
            unset($t);
        }
        exit;
    }
    
    public function userStories(){
        $this->loadModel('Projects');
        $projects = $this->Projects->find('all')->select(['id', 'title']);
        
         $this->loadModel('Sprints');
         $sprints = $this->Sprints->find('all')->where(['project_id' => 1 ])->group(['sprint'])->select(['id', 'sprint']);
         
         $tasks = 'SELECT a.`sprint` sprint, a.`project_id`,b.task_name as Tname,b.task_name ,b.id FROM sprints a INNER JOIN tasks b ON a.`task_id` = b.`id` WHERE a.`project_id` = 1 ORDER BY a.sprint '; 
         
         $this->set(compact('sprints', 'projects'));
         //$this->set(compact('sprints', 'sprints'));
    }

}
