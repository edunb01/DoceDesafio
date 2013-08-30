<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
     public $helpers = array('Html', 'Form');
     
     public $components = array(
         'Session', 
         'Auth' => array(
            // 'loginAction' => array('controller' => 'User', 'action' => 'login'),
             'loginRedirect' => array('controller' => 'PreAtividades', 'action' => 'index'),
             'loginRedirect' => array('controller' => 'Users', 'action' => 'login'),
             'authError' => "You can't access that page",
             'authorize' => array('Controller')
            )
         );
     
    
    
     public function isAuthorized($user){
         return true;
     }

     
     public function beforeFilter() {
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
            $this->layout = 'admin';
        }else{
              $this->Auth->allow('*');
        }
        
        if($this->Auth->user('role_id') == 'admin'){
            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'admin_index');
        }else{
            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'index');
        }
         
        $this->Auth->allow('login');
        
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        $this->Session->write('sessionUser', $this->Auth->user());
    
     }

     
     public function beforeRender(){    
        $this->set('title_for_layout', "Doce Desafio UnB");
     }
     
}
