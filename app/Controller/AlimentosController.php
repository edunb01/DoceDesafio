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
class AlimentosController extends AppController{
    
    public function admin_index(){
        $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'index'));
    }
    
    
    public function admin_add(){
        if($this->request->is('post')){

            $this->Alimento->create();

            if($this->Alimento->save($this->request->data)){
                $this->Session->setFlash(__('Dados armazenados com sucesso!'));
                $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'index'));
            }else{
                $this->Session->setFlash(__('Falha ao armazenados dados! Tente mais tarde.'));
            }
        }

    }
    
    public function admin_edit($id=null){
        
        $this->Alimento->id = $id;

        if($this->request->is('get')){
            $this->set('Alimento', $this->request->data = $this->Alimento->read());
        }else{
            
            if($this->request->is('post')){
                if($this->Alimento->save($this->request->data)){
                    $this->Session->setFlash("Alimento atualizado com sucesso!");
                    $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'view', $this->request->data['Alimento']['pre_atividade_id']));
                }
            }
            
        }
        
    }
    
    
    //$idPreAtividade server para redirecioar o usuario para a view da pre atividade correspondente
    public function admin_delete($id=null, $idPreAtividade = null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->Alimento->id = $id;
        
        if(!$this->Alimento->exists()){
            throw new NotFoundException(__('Alimento não encontrado.'));
        }
        
        if($this->Alimento->delete()){
            $this->Session->setFlash(__('Alimento Excluido com sucesso' . $id));
            $this->redirect(array('controller' => 'PreAtividades' ,'action'=>'view', $idPreAtividade));
        }
        
        
            $this->Session->setFlash(__('Erro ao exclir Alimento '. $id));
            $this->redirect(array('controller' => 'PreAtividades' ,'action'=>'view', $idPreAtividade));
     
    }
    
    
    
}
?>
