<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttachmentTypes Controller
 *
 * @property \App\Model\Table\AttachmentTypesTable $AttachmentTypes
 */
class AttachmentTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $attachmentTypes = $this->paginate($this->AttachmentTypes);

        $this->set(compact('attachmentTypes'));
        $this->set('_serialize', ['attachmentTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachment Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachmentType = $this->AttachmentTypes->get($id, [
            'contain' => ['Attachments']
        ]);

        $this->set('attachmentType', $attachmentType);
        $this->set('_serialize', ['attachmentType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attachmentType = $this->AttachmentTypes->newEntity();
        if ($this->request->is('post')) {
            $attachmentType = $this->AttachmentTypes->patchEntity($attachmentType, $this->request->data);
            if ($this->AttachmentTypes->save($attachmentType)) {
                $this->Flash->success(__('The attachment type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attachment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('attachmentType'));
        $this->set('_serialize', ['attachmentType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachment Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachmentType = $this->AttachmentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachmentType = $this->AttachmentTypes->patchEntity($attachmentType, $this->request->data);
            if ($this->AttachmentTypes->save($attachmentType)) {
                $this->Flash->success(__('The attachment type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The attachment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('attachmentType'));
        $this->set('_serialize', ['attachmentType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachment Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachmentType = $this->AttachmentTypes->get($id);
        if ($this->AttachmentTypes->delete($attachmentType)) {
            $this->Flash->success(__('The attachment type has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
