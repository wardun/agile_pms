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
        $this->paginate = [
            'contain' => ['Projects', 'Tasks']
        ];
        $sprints = $this->paginate($this->Sprints);

        $this->set(compact('sprints'));
        $this->set('_serialize', ['sprints']);
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
}
