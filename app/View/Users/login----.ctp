<div class="login form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend><?php echo __('Sistema Doce Desafio'); ?></legend>

    <?php 
    echo $this->Form->input('username');
    echo $this->Form->input('password');
?>
</fieldset>

    <?php echo $this->Form->end(__('Login')); ?>

    <div id="novo"><?php echo $this->Html->link('Novo Cadastro?', array('controller' => 'Users', 'action' => 'add'));?></div>
    
</div>
