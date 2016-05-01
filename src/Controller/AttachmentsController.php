<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 */
class AttachmentsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
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
    public function view($id = null) {
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
    public function add() {
        //$sprint_file = '';
        $attachment = $this->Attachments->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data);
//            exit;
            if (!empty($this->request->data['sprint_file']['tmp_name'])) {
                $filename = $this->request->data['file_type'] = strtolower(substr(strrchr($this->request->data['sprint_file']['name'], "."), 1));
                $this->request->data['origiginal_file_name'] = $this->request->data['sprint_file']['name'];
                if (move_uploaded_file($this->request->data['sprint_file']['tmp_name'], 'sprint_files/' . $this->request->data['origiginal_file_name'])) {
                    $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
//                    debug($attachment);exit;
                    if ($this->Attachments->save($attachment)) {
                        $this->Flash->success(__('The attachment has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
                    }
                }
            }
        }
        $projects = [];
        $attachmentTypes = $this->Attachments->AttachmentTypes->find('list', ['limit' => 200]);
        $projectLists = $this->Attachments->Projects->find('all', ['limit' => 200]);
        if ($projectLists) {
            foreach ($projectLists as $project) {
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
    public function edit($id = null) {
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
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($id);
        if ($this->Attachments->delete($attachment)) {
            $this->Flash->success(__('The attachment has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

//    public function download($id = null) {
//        $filePath = WWW_ROOT . 'files' . DS . $id;
//        $this->response->file($filePath, array('download' => true, 'name' => 'file name'));
//    }

    public function download($id = null) {
        //$this->viewClass = 'Media';
        $query = $this->Attachments->find()->where(['id' => $id]);
        $fileInfo = $query->first();
        $filePath = WWW_ROOT . 'sprint_files' . DS . $fileInfo['origiginal_file_name'];
//        $filePath = 'sprint_files\tables.docx';
        //$this->response->file($filePath, array('download' => true, 'name' => 'ss'));

        $this->response->file(
               $filePath, ['download' => true, 'name' => $fileInfo['file_name']]
        );
        
        return $this->response;

        //$this->set($params);
    }

}
