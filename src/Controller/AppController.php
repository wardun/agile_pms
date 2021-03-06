<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->loadComponent('Paginator');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Homes',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ]
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        $userInfo = $this->Auth->user();
        $this->loadModel('Notices');
        $noticeBoard = $this->Notices->find('all', ['limit' => 10]);
        $this->loadModel('Notifications');
        $totalNotification = $this->Notifications->find('all', ['limit' => 10])->where(['receiverid' => $this->Auth->user('id'), 'status' => 0])->count();
        $notifications = $this->Notifications->find('all')->where(['receiverid' => $this->Auth->user('id'), 'status' => 0]);
        $this->set(compact('userInfo', 'noticeBoard', 'notifications', 'totalNotification'));

        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);
        
        if ($this->request->is('post')) {
            if ($this->request->params['action'] == 'add') {
                $this->request->data['created_by'] = $this->Auth->user('id');
            }
            if ($this->request->params['action'] == 'edit') {
                $this->request->data['created_by'] = $this->Auth->user('id');
            }
            
        }
    }

}
