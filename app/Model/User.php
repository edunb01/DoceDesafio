<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreAtividade
 *
 * @author thiago
 */

App::uses('AuthComponent', 'Controller/Component');


class User extends AppModel {
    
    public $name = "User";
    

   public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
    

   
    
}

?>
