<!-- app/View/Alimentos/edit.ctp -->
<h2><?php echo "Editar Aliemento C&oacute;digo: ". $Alimento['Alimento']['id']?></h2>

<?php //var_dump($Medicamento);?>

<?php echo $this->Form->create('Alimento', array('action' => 'edit')); ?>
<?php //echo $this->Form->hidden('formMedicamento', array('value' => true))?>
<?php //echo $this->Form->hidden('pre_atividade_id', array('value' => $pre_atividade_id))?>
<?php echo $this->Form->input('alimento', array('label' => 'Alimento')) ; ?>
<?php echo $this->Form->input('hora', array('label' => 'Hora')) ; ?>
<?php echo $this->Form->input('cho', array('label' => 'CHO')) ; ?>
<?php echo $this->Form->hidden('id', array('value' => $Alimento['Alimento']['id'])) ; ?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $Alimento['Alimento']['pre_atividade_id'])) ; ?>

<?php echo $this->Form->end('Salvar Alimento'); ?>