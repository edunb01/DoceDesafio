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
class GroupsController extends AppController{
   // public $components = array('Cookie', 'Session');
    
    public $name = 'Groups';
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allowedActions = array();
    }
    
    public function index(){
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }
    
    
    public function view($id = null){
                
        if(!$id){
            $this->Session->setFlash(__("Invalid Group.", true));
            $this->redirect(array('action' => 'index'));
        }
        
        $this->set('group', $this->Group->read(null, $id));
        
    }
    
    
    public function add(){
        if($this->request->is('post')){
            $this->Group->create();
            
            if($this->Group->save($this->request->data)){
                $this->Session->setFlash(__('Dados armazenados com sucesso!'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash(__('Falha ao armazenados dados! Tente mais tarde.'));
            }
            
        }
    }
    
    public function edit($id=null){
        
        $this->Group->id = $id;
        
        
        if($this->request->is('get')){
            $this->set('group', $this->request->data = $this->Group->read());
        }else{
            
            if($this->request->is('post')){
                if($this->Group->save($this->request->data)){
                    $this->Session->setFlash(__('The Group has been saved', true));
                    $this->redirect(array('action' => 'index'));
                }
            }
            
        }
        
    }
    
    public function delete($id=null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->Group->id = $id;
        
        if(!$this->Group->exists()){
            throw new NotFoundException(__('Group não encontrada.'));
        }
        
        if($this->Group->delete()){
            $this->Session->setFlash(__('Group Excluida com sucesso' . $id));
            $this->redirect(array('action'=>'index'));
        }
        
        
            $this->Session->setFlash(__('Erro ao exclir Group '. $id));
            $this->redirect(array('action' => 'index'));
     
    }
    
    
    
}
?>
