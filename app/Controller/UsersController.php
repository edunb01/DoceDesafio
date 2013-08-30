<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreAtividadesController
 *
 * @author thiago
 */

App::uses('AppController', 'Controller');

class UsersController extends AppController{
    
    //public $helpers = array('Html', 'Form', 'Js');
    
    public $name = 'Users';
    
    public function index(){ }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('admin_login'));
    }
    
    public function isAuthorized($user) {
        if(in_array($this->action, array('edit', 'delete'))){
            if($user['id'] != $this->request->params['pass'][0]){
                return false;
            }
        }
        
        return true;
    }

    
    
    public function admin_index(){
        $this->set('Users', $this->User->find('all'));
    }
    
    public function admin_dashboard() {
        //$title_for_layout = 'Dashbord';
        $this->set(compact('Dashbord Doce Desafio'));
    }
    
    
    
    public function admin_view($id=null){
        $this->User->id = $id;
        
        if(!$this->User->exists()){
            throw new NotFoundException(__('Participante não pode ser visualizado.'));
        }
        
        $this->set('User', $this->User->read(null, $id));
    }


    public function admin_add(){
        if($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)){
                $this->Session->setFlash('Usuário cadastrado com sucesso');
                $this->redirect(array('controller' => 'Users', 'action' => 'login'));
            }  else {
                $this->Session->setFlash('Erro ao cadastrar usuário. Tente Novamente!');    
            }
        }
    }
    
    
    
    public function admin_edit($id = null){
        $this->User->id = $id;
        
        
        if($this->request->is('get')){
            $this->set('User', $this->request->data = $this->User->read());
        }else{
            
            if($this->request->is('post')){
                if($this->User->save($this->request->data)){
                    $this->Session->setFlash("Participante atualizado com sucesso!");
                    $this->redirect(array('controller' => 'Users' ,'action' => 'view', $this->request->data['User']['id']));
                }
            }
            
        }
    }
    
    
    
    public function admin_delete($id=null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->User->id = $id;
        
        if(!$this->User->exists()){
            throw new NotFoundException(__('Participante não encontrado.'));
        }
        
        if($this->User->delete()){
            $this->Session->setFlash(__('Participante Excluida com sucesso' . $id));
            $this->redirect(array('action' => 'admin_index'));
        }
        
        $this->Session->setFlash(__('Erro ao exclir Participante '. $id));
        $this->redirect(array('action' => 'admin_index'));
     
    }
    
    
    
    public function admin_pesquisar(){
        if($this->request->is('post')){
            
            $condictions = array('conditions' => array('nome LIKE'=> '%'.$this->request->data['User']['nome'].'%'));
            
            $this->set('UserPesquisa', $this->User->find('all', $condictions));
            
        }
    }
    
    
    
    
    public function admin_login(){
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Session->read('Auth.User')) {
                    $this->Session->setFlash('You are logged in! with admin');
                    $title_for_layout = 'Dashbord';

                    if($this->Auth->user())
                        $this->redirect(array('controller' => 'Users', 'action' => 'admin_index'));
                }            
            }else {
                $this->Session->setFlash('Your username or password was incorrect.');
            }
        }
    }
    
    public function admin_logout(){
        if($this->Session->valid()){
            $this->Session->destroy();
        }
        
        $this->redirect($this->Auth->logout());
    }
    
    /*
    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect($this->Auth->redirect());
            }else{
                $this->Session->setFlash(__("Usuário ou senha incorreto, tente novamente!"));
            }
        }
    }
    
    
    public function logout(){
        
        if($this->Session->valid()){
            $this->Session->destroy();
        }
        
        $this->redirect($this->Auth->logout());
    }
    */
        
}
?>
