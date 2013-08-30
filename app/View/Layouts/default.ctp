<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>    
    <?php echo $this->Html->charset(); ?>
    <title> <?php echo $title_for_layout; ?> </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="nav">
                <div id="nav1">
                    <ul>
                        <li><?php echo $this->Html->link('Home', array('controller' => 'PreAtividades', 'action' => 'index'));?></li>
                        <li><?php echo $this->Html->link('Adicionar Atividade', array('controller' => 'PreAtividades', 'action' => 'add'));?></li>
                        <li><?php echo $this->Html->link('Participantes', array('controller' => 'Users', 'action' => 'add'));?></li>
                        <li><?php echo $this->Html->link('Medicamentos', array('controller' => 'Medicamentos', 'action' => 'view'));?></li>
                        <li><?php echo $this->Html->link('Alimentos', array('controller' => 'Alimentos', 'action' => 'view'));?></li>
                        <li><?php echo $this->Html->link('Perfil', array('controller' => 'Users', 'action' => 'view'));?></li>
                    </ul>
                </div>
                
                <div id="data">
                    <?php //echo "Brasília, ".date('d'). " de ". date('F') . " " .date('Y'); ?>
                    <?php
                        if(!empty($logged_in) && isset($logged_in)){
                            echo ("Bem Vindo <b>".$current_user['nome'] ." ".$current_user['sobrenome']  ."</b>");
                            echo " - ";
                            echo $this->Html->link('Sair', array('controller' => 'Users', 'action' => 'logout'));
                        }
                    ?>
                </div>
            </div>
   
        </div>                

            <div id="content">

                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth');?>
                    <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                Departamento de Estatística UnB
                    <?php /*echo $this->Html->link(
                                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                                    'http://www.cakephp.org/',
                                    array('target' => '_blank', 'escape' => false)
                            );*/
                    ?>
            </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
