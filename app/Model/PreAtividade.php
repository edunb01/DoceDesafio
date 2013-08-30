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
class PreAtividade extends AppModel {
    
    public $name = "PreAtividade";
    
             
/*
table: Nome da tabela que deseja associar
alias: Apelido da tabela (Em nosso caso, Post)
type: Tipo de associação (INNER, LEFT, RIGHT, etc),
conditions: Array contendo as condições para juntar a tabela, como fazemos na cláusula ON de uma SQL, associando a Primary Key de uma tabela à foreign Key da outra.
 */     
 
    public $belongsTo = array(
            'Users' => array(
                    'className' => 'Users',
                    'foreignKey' => 'user_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
            )
    ); 
    
    public $hasOne = array(
        'PosAtividade' => array(
            'className' => 'PosAtividade',
            'foreignKey' => 'pre_atividade_id',
            'fields' => array(),
            'conditions' => array(),
            'order' => array('pre_atividade_id' => 'DESC'),
            'dependent' => true
        )
    );
    
    
    public $hasMany = array(
        'Medicamento' => array(
            'className' => 'Medicamento',
            'foreignKey' => 'pre_atividade_id',
            'fields' => array(),
            'conditions' => array(),
            'order' => array('pre_atividade_id' => 'DESC'),
            'dependent' => true
        ),
        
        'Alimento' => array(
            'className' => 'Alimento',
            'foreignKey' => 'pre_atividade_id',
            'fields' => array(),
            'conditions' => array(),
            'order' => array('pre_atividade_id' => 'DESC'),
            'dependent' => true
        ),
    );
    
}

?>
