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
class PosAtividadesController extends AppController{
 
    public $helpers = array('Html', 'Form');
    
    
    public function admin_index(){
        $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'index'));
    }
    
    
    public function admin_listAll(){
        
       // $pre_atividade_id = $this->PosAtividade->query("SELECT id FROM pre_atividades WHERE user_id = ".$this->Session->read('sessionUser')['id']." limit 1");
        
        $this->set('PosAtividades', $this->PosAtividade->find('all'/*,
                array('conditions' => array('PosAtividade.pre_atividade_id' => $pre_atividade_id [0]['pre_atividades']['id'] ))
            */)
        );
    }
    
    
    
    /*
     * Método para adcionar uma PosAtividade, este método espera um id referente a qual preAtividade será agregado passado via get
     */
    public function admin_add($idPreAtividade = null){
     
        if($this->request->is('post')){
            $this->PosAtividade->create();

            if($this->PosAtividade->save($this->request->data)){
                $this->Session->setFlash(__('Dados armazenados com sucesso!'));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash(__('Falha ao armazenados dados! Tente mais tarde.'));
            }
        }else{
            $this->set('idPreAtividade', $idPreAtividade);
        }
    }
    

    
    public function admin_edit($idPreAtividade=null){
        
        $this->PosAtividade->id = $idPreAtividade;
        
        if($this->request->is('get')){
            $this->set('PosAtividade', $this->request->data = $this->PosAtividade->read());
        }else{
            
            if($this->request->is('post')){
                if($this->PosAtividade->save($this->request->data)){
                    $this->Session->setFlash("PosAtividade atualizado com sucesso!");
                    $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'view', $this->request->data['PosAtividade']['pre_atividade_id']));
                }
            }
            
        }
        
    }
    
    public function admin_delete($id=null, $idPreAtividade = null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->PosAtividade->id = $id;
        
        if(!$this->PosAtividade->exists()){
            throw new NotFoundException(__('Pós-Atividade não encontrado.'));
        }
        
        if($this->PosAtividade->delete()){
            $this->Session->setFlash(__('Pós-Atividade Excluido com sucesso' . $id));
            $this->redirect(array('controller' => 'PreAtividades' ,'action'=>'view', $idPreAtividade));
        }
        
        
            $this->Session->setFlash(__('Erro ao exclir PósAtividade '. $id));
            $this->redirect(array('controller' => 'PreAtividades' ,'action'=>'view', $idPreAtividade));
     
    }
    
    
}
?>
