<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author thiago
 */
class Group extends AppModel {
    
    
    public $actsAs = array('Acl' => array('type' => 'requester'));
    
    public function parentNode(){
        return null;
    }
    

	public function bindNode($user) {
		return array(’model’ => ’Group’, ’foreign_key’ => $user[’User’][’group_id’]);
	}

}

?>
