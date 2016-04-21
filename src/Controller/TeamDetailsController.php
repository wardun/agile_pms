<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamDetails Controller
 *
 * @property \App\Model\Table\TeamDetailsTable $TeamDetails
 */
class TeamDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Users']
        ];
        $teamDetails = $this->paginate($this->TeamDetails);

        $this->set(compact('teamDetails'));
        $this->set('_serialize', ['teamDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Team Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamDetail = $this->TeamDetails->get($id, [
            'contain' => ['Teams', 'Users']
        ]);

        $this->set('teamDetail', $teamDetail);
        $this->set('_serialize', ['teamDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamDetail = $this->TeamDetails->newEntity();
        if ($this->request->is('post')) {
            $teamDetail = $this->TeamDetails->patchEntity($teamDetail, $this->request->data);
            if ($this->TeamDetails->save($teamDetail)) {
                $this->Flash->success(__('The team detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team detail could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamDetails->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamDetail', 'teams', 'users'));
        $this->set('_serialize', ['teamDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamDetail = $this->TeamDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamDetail = $this->TeamDetails->patchEntity($teamDetail, $this->request->data);
            if ($this->TeamDetails->save($teamDetail)) {
                $this->Flash->success(__('The team detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team detail could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamDetails->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamDetail', 'teams', 'users'));
        $this->set('_serialize', ['teamDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamDetail = $this->TeamDetails->get($id);
        if ($this->TeamDetails->delete($teamDetail)) {
            $this->Flash->success(__('The team detail has been deleted.'));
        } else {
            $this->Flash->error(__('The team detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
