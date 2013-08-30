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
class MedicamentosController extends AppController{
    
    public function admin_index(){
        $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'index'));
    }
    
    
    public function admin_add(){
        if($this->request->is('post')){

            $this->Medicamento->create();

            if($this->Medicamento->save($this->request->data)){
                $this->Session->setFlash(__('Dados armazenados com sucesso!'));
                $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'index'));
            }else{
                $this->Session->setFlash(__('Falha ao armazenados dados! Tente mais tarde.'));
            }
        }

    }
    
    public function admin_edit($id=null){
        
        $this->Medicamento->id = $id;
        
        
        if($this->request->is('get')){
            $this->set('Medicamento', $this->request->data = $this->Medicamento->read());
        }else{
            
            if($this->request->is('post')){
                if($this->Medicamento->save($this->request->data)){
                    $this->Session->setFlash("Medicamento atualizado com sucesso!");
                    $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'view', $this->request->data['Medicamento']['pre_atividade_id']));
                }
            }
            
        }
        
    }
    
    
    //$idPreAtividade server para redirecioar o usuario para a view da pre atividade correspondente
    public function admin_delete($id=null, $idPreAtividade = null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->Medicamento->id = $id;
        
        if(!$this->Medicamento->exists()){
            throw new NotFoundException(__('Medicamento não encontrado.'));
        }
        
        if($this->Medicamento->delete()){
            $this->Session->setFlash(__('Medicamento Excluido com sucesso' . $id));
            $this->redirect(array('controller' => 'PreAtividades' ,'action'=>'view', $idPreAtividade));
        }
        
        
            $this->Session->setFlash(__('Erro ao exclir Medicamento '. $id));
            $this->redirect(array('action' => 'index'));
     
    }
    
    
    
}
?>
