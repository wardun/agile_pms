<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 */
class AttachmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AttachmentTypes', 'Projects', 'Tasks']
        ];
        $attachments = $this->paginate($this->Attachments);

        $this->set(compact('attachments'));
        $this->set('_serialize', ['attachments']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => ['AttachmentTypes', 'Projects', 'Tasks']
        ]);

        $this->set('attachment', $attachment);
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$sprint_file = '';
        $attachment = $this->Attachments->newEntity();
        if ($this->request->is('post')) {
             if(!empty($this->request->data['file']['file_name'])){
                $fileName = $this->request->data['file']['file_name'];
                $sprint_file = $this->request->data['file']['sprint_file']['type'];
                 if(move_uploaded_file($this->request->data['file']['tmp_name'],$sprint_file)){
                     
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
            $attachment->file_name = $fileName;
            $attachment->file_name = $sprint_file;
//            debug($this->request->data);
//            exit;
             }
             }
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
            }
        }
        $projects = [];
        $attachmentTypes = $this->Attachments->AttachmentTypes->find('list', ['limit' => 200]);
        $projectLists = $this->Attachments->Projects->find('all', ['limit' => 200]);
        if($projectLists){
            foreach ($projectLists as $project){
                $projects[$project->id] = $project->title;
            }
            unset($project);
        }
        $tasks = $this->Attachments->Tasks->find('list', ['limit' => 200]);
        
        $this->set(compact('attachment', 'attachmentTypes', 'projects', 'tasks'));
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
            }
        }
        $attachmentTypes = $this->Attachments->AttachmentTypes->find('list', ['limit' => 200]);
        $projects = $this->Attachments->Projects->find('list', ['limit' => 200]);
        $tasks = $this->Attachments->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('attachment', 'attachmentTypes', 'projects', 'tasks'));
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($id);
        if ($this->Attachments->delete($attachment)) {
            $this->Flash->success(__('The attachment has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
