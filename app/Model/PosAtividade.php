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
class PosAtividade extends AppModel {
    
    public $name = "PosAtividade";
    
    public $hasOne = array(
        'PreAtividade' => array(
            'className' => 'PreAtividade',
            'foreignKey' => 'id',
            'fields' => array(),
            'conditions' => array(),
            'order' => array('pre_atividade_id' => 'DESC'),
            'dependent' => true
        ),
        
        
    );
      
}

?>
