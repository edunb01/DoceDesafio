<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Administrator | <?php echo $title_for_layout; ?></title>
    <?php
        echo $this->fetch('meta');
        echo $this->Html->css(array('admin', 'navigator'));
        echo $this->Html->script(array('jquery-2.0.3.min', 'navigator', 'jquery.maskedinput', 'mask'));
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <div class="logo"><h1>Doce Desafio</h1> </div>
            <div class="clear"></div>
            <div class="data">
                <?php
                    if(!empty($logged_in) && isset($logged_in)){
                        echo ("Bem Vindo <b>".$current_user['nome'] ." ".$current_user['sobrenome']  ."</b>");
                        echo " - ";
                        echo $this->Html->link('Sair', array('controller' => 'Users', 'action' => 'admin_logout'));
                    }
                ?>
            </div>
        </div>
        <?php if(!empty($logged_in) && isset($logged_in)){?>
        <nav>
            
            <ul class="topnav">
                <li><?php echo $this->Html->link('Dashbord', array('action' => 'admin_index'));?></li>
                <li>
                    <?php echo $this->Html->link('Usuario', array('controller' => 'Users' ,'action' => 'index'));?>
                    <ul class="subnav">
                        <li><?php echo $this->Html->link('Adicionar', array('controller' => 'Users', 'action' => 'add'));?></li>
                        <!--<li><?php //echo $this->Html->link('Editar', array('controller' => 'Users', 'action' => 'add'));?></li>-->
                        <li><?php echo $this->Html->link('Pesquisar', array('controller' => 'Users', 'action' => 'pesquisar'));?></li>

                    </ul>
                </li>
                
                
                <li>
                    <?php echo $this->Html->link('Atividade', array('controller' => 'PreAtividades' ,'action' => 'index'));?>
                    <ul class="subnav">
                        <li><?php echo $this->Html->link('Adicionar', array('controller' => 'PreAtividades', 'action' => 'add'));?></li>
                        <li><?php echo $this->Html->link('Todas', array('controller' => 'PreAtividades', 'action' => 'listByIdUser'));?></li>
                        <li><?php echo $this->Html->link('Pesquisar', array('controller' => 'PreAtividades', 'action' => 'pesquisar'));?></li>
                    </ul
                </li>
                
                
                <li>
                    <?php echo $this->Html->link('Pós-Atividade', array('controller' => 'PosAtividades' ,'action' => 'index'));?>
                    <ul class="subnav">
                        <li><?php echo $this->Html->link('Adicionar', array('controller' => 'PreAtividades', 'action' => 'add'));?></li>
                        <li><?php echo $this->Html->link('Todas', array('controller' => 'PosAtividades', 'action' => 'listAll'));?></li>
                        <li><?php echo $this->Html->link('Pesquisar', array('controller' => 'PreAtividades', 'action' => 'pesquisar'));?></li>
                    </ul
                </li>
                
            </ul>
            
        </nav>
        <?php }?>
        
        <div id="content-wrapper">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth');?>
            <?php echo $this->fetch('content'); ?>
        </div>
 
        <div id="footer">
            © <?php echo date("Y");?> - All rights         
    </div>
             <?php //echo $this->element('sql_dump'); ?>   
    </div>
 
</body>
</html>