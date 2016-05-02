<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaskBugs Controller
 *
 * @property \App\Model\Table\TaskBugsTable $TaskBugs
 */
class TaskBugsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks']
        ];
        $taskBugs = $this->paginate($this->TaskBugs);

        $this->set(compact('taskBugs'));
        $this->set('_serialize', ['taskBugs']);
    }

    /**
     * View method
     *
     * @param string|null $id Task Bug id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskBug = $this->TaskBugs->get($id, [
            'contain' => ['Tasks']
        ]);

        $this->set('taskBug', $taskBug);
        $this->set('_serialize', ['taskBug']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskBug = $this->TaskBugs->newEntity();
        if ($this->request->is('post')) {
            $taskBug = $this->TaskBugs->patchEntity($taskBug, $this->request->data);
            if ($this->TaskBugs->save($taskBug)) {
                $this->Flash->success(__('The task bug has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task bug could not be saved. Please, try again.'));
            }
        }
        $tasks = $this->TaskBugs->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('taskBug', 'tasks'));
        $this->set('_serialize', ['taskBug']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Bug id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskBug = $this->TaskBugs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskBug = $this->TaskBugs->patchEntity($taskBug, $this->request->data);
            if ($this->TaskBugs->save($taskBug)) {
                $this->Flash->success(__('The task bug has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task bug could not be saved. Please, try again.'));
            }
        }
        $tasks = $this->TaskBugs->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('taskBug', 'tasks'));
        $this->set('_serialize', ['taskBug']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Bug id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskBug = $this->TaskBugs->get($id);
        if ($this->TaskBugs->delete($taskBug)) {
            $this->Flash->success(__('The task bug has been deleted.'));
        } else {
            $this->Flash->error(__('The task bug could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
