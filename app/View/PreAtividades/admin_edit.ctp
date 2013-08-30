<!-- app/View/PreAtividades/Edit.ctp -->

<h2>Editar Atividade F&iacute;sica C&oacute;digo: <?php echo $PreAtividade['PreAtividade']['id']?></h2>

<?php echo $this->Form->create('PreAtividade', array('action' => 'edit')); ?>

<?php 
//armazenar o valor da session
//    echo $this->Form->input('session', array('value' => session_id() , 'type' => 'hidden')); 
?>

<?php echo $this->Form->input('data', array('label' => 'Data')) ; ?>
<?php echo $this->Form->input('id', array('type' => 'hidden')) ; ?>
<?php echo $this->Form->input('turno', array(
    'type'    => 'select',
    'options' => array('manha' => 'Manha', 'tarde' => 'Tarde', 'noite' => 'Noite'),
    'label' => 'Turno',
    'empty'   => false
));
?>

<?php echo $this->Form->input('hora', array('label' => 'hora')) ; ?>
<?php echo $this->Form->input('peso_antes', array('label' => 'Peso Antes da Atividade')) ; ?>
<?php echo $this->Form->input('psg', array('label' => 'PSG')) ; ?>
<?php echo $this->Form->input('glicose', array('label' => 'Glicose')) ; ?>
<?php echo $this->Form->input('pa', array('label' => 'Pressao arterial')) ; ?>
<?php echo $this->Form->input('fc', array('label' => 'Frequencia Cardiaca')) ; ?>
<?php echo $this->Form->input('insulina', array('label' => 'Insulina')) ; ?>
<?php echo $this->Form->input('cho', array('label' => 'Carboidrato')) ; ?>
<?php echo $this->Form->input('local', array('label' => 'Local')) ; ?>
<?php echo $this->Form->input('atividade_monitor', array('label' => 'Atividade - Monitor')) ; ?>
<?php echo $this->Form->input('tema_debate', array('label' => 'Tema do Debate')) ; ?>

<?php echo $this->Form->end('Submit'); ?>