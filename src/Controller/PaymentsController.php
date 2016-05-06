<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 */
class PaymentsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
        $this->set('_serialize', ['payments']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $payment = $this->Payments->get($id, [
            'contain' => ['Projects']
        ]);

        $this->set('payment', $payment);
        $this->set('_serialize', ['payment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['payment_receive_date'] = new Time($this->request->data['payment_receive_date']);
            $payment = $this->Payments->patchEntity($payment, $this->request->data);
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment could not be saved. Please, try again.'));
            }
        }
        $projectLists = $this->Payments->Projects->find('all', ['limit' => 200]);
        if ($projectLists) {
            foreach ($projectLists as $project) {
                $projects[$project->id] = $project->title;
            }
            unset($project);
        }
        $this->set(compact('payment', 'projects'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->data);
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Payments->Projects->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'projects'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function sprint() {
        $projectId = $this->request->data['projectId'];
        $this->loadModel('Sprints');
        $teams = $this->Sprints->find()->where(['project_id' => $projectId])->group(['sprint']);
        if ($teams) {
            foreach ($teams as $t) {
                echo '<option value="' . $t->sprint . '"> Sprint ' . $t->sprint . '</option>';
            }
            unset($t);
        }
        exit;
        $this->set(compact('teams'));
    }

    public function monthWisePayment() {
        $connection = ConnectionManager::get('default');
        $x = 1;
        while ($x <= 12) {
            $paymentQuery = $connection->execute(
                            "SELECT SUM(amound) amount
                            FROM payments
                            WHERE MONTH(`payment_receive_date`) = $x AND YEAR(`payment_receive_date`) = YEAR(NOW())
                            "
                    )
                    ->fetchAll('assoc');

            $payments[] = empty($paymentQuery[0]['amount']) ? 0 : $paymentQuery[0]['amount'];
            $x++;
        }
        $this->set(compact('payments'));
    }

}
