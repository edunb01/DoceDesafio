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
class PreAtividadesController extends AppController{
            
    public function admin_index(){
        //$this->PreAtividade->recursive = 0;
        //Lista todos as Atividades de um usuario pelo seu ID
        $this->set('PreAtividades', $this->PreAtividade->find('all', array('order' => array('PreAtividade.id' => 'DESC')) ) /*, 
                array('conditions' => array('PreAtividade.user_id' => $this->Session->read('sessionUser')['id']))
            */
        );
    }
    
    
    /*
     * Método para listar todas as atividades de um Participante pelo seu ID, 
     * caso o ID não seja especificado será feita uma consulta listando todos os registros de PreAtvidades
     */
    public function admin_listByIdUser($id = null){
        //$this->set...
        //É usado para enviar uma varival para a view com o mesmo nome do metodo
        //Ex: PreAtividades -> variável criada na view... e o conteúdo é o resultado da consulta
        if(!is_null($id)){
            $this->set('PreAtividades', $this->PreAtividade->find('all', array('conditions' => array('PreAtividade.user_id' => $id) ,'PreAtividade.id' => 'DESC')));
        }else{
            $this->set('PreAtividades', $this->PreAtividade->find('all', array('order' => array('PreAtividade.id' => 'DESC'))));
        }
    }
    
    
    /*
     * Método que cria uma visualização detalhada da atividade por completa,
     * exibindo alimentos, medicamentos, comentarios......
     */
    public function admin_view($id = null){
        
        if($this->request->is('get')){
            
            $this->PreAtividade->id = $id;
            
            if(!$this->PreAtividade->exists()){
                throw new NotFoundException(__('Pré Atividade não pode ser visualisada.'));
            }else{
                $this->set('PreAtividade', $this->PreAtividade->read(null, $id));
            }
            
        }
        
    }
    
    
    
    /*
     * Método para adiconar uam pre atividade,
     * $this->request->is('post') -> verifica se os dados foram enviados de um form
     * $this->PreAtividade->create() -> cria uma atividade para ser armazendada
     * $this->PreAtividade->save() -> salva os dados no banco de dados
     * $this->request->data -> são os dados enviados do formulario
     * $this->Session->setFlash -> cria uma msg na tela da view
     * $this->redirect -> informa para onde deve ser redirecionado após o cadastro.
     */
    public function admin_add(){
        if($this->request->is('post')){
            $this->PreAtividade->create();
            if($this->PreAtividade->save($this->request->data)){                
                $this->Session->setFlash(__('Dados armazenados com sucesso!'));
                $this->redirect(array('action' => 'admin_index'));
            }else{
                $this->Session->setFlash(__('Falha ao armazenados dados! Tente mais tarde.'));
            }
            
        }else{
            /*
             * Caso a solicitação não venha do formulário, é realizada uma consulta para listar os usuarios cadastrados
             * para montar um array e assim selecionar alguém para cadastrar a atividade.
             */
            $this->set('Users', $this->PreAtividade->query('SELECT id, role_id, nome, sobrenome FROM users ORDER BY id ASC'));
            
        }
    }
    
    
    
    /*
     * Método para editar uma pre-atividade semelhante ao método adicioanar
     */
    public function admin_edit($id=null){
        
        $this->PreAtividade->id = $id;
        
        if($this->request->is('get')){
            $this->set('PreAtividade', $this->request->data = $this->PreAtividade->read());
        }else{
            
            if($this->request->is('post')){
                if($this->PreAtividade->save($this->request->data)){
                    $this->Session->setFlash("Pre Atividade atualizada com sucesso!");
                    $this->redirect(array('controller' => 'PreAtividades' ,'action' => 'view', $this->request->data['PreAtividade']['id']));
                }
            }
            
        }
        
    }
    
    /*
     * Método para deletar uma pre atividade do banco, pelo id de cada pre-atividade,  com isso eh deletada simultaneamente
     * a pós-atividade , medicamento, alimentos com o mesmo id da pre-atividade.
     */
    public function admin_delete($id=null){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException();
        }
        
        $this->PreAtividade->id = $id;
        
        if(!$this->PreAtividade->exists()){
            throw new NotFoundException(__('Pré Atividade não encontrada.'));
        }
        
        if($this->PreAtividade->delete()){
            $this->Session->setFlash(__('Pré Atividade Excluida com sucesso' . $id));
            $this->redirect(array('action'=>'admin_index'));
        }
        
        
            $this->Session->setFlash(__('Erro ao exclir Pré Atividade '. $id));
            $this->redirect(array('action' => 'admin_index'));
     
    }
    
    
    
    
    /*
     * Metodo para fazer pesquisa pelo nome ou sobrenome de cada.
     */
    public function admin_pesquisar(){
        //consulta para listar os usuarios com o nome.
        if($this->request->is('post')){ 
           $result = $this->PreAtividade->query("SELECT * FROM users WHERE nome LIKE '%".$this->request->data['PreAtividade']['nome']."%' OR sobrenome LIKE '%".$this->request->data['PreAtividade']['nome']."%'");
           
           $this->set('UserPesquisa', $result);
           
        }
    }
    
    
}
?>
