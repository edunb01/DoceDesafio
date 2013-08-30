<!-- app/View/Medicamentos/edit.ctp -->
<h2><?php echo "Editar Medicamento C&oacute;digo: ". $Medicamento['Medicamento']['id']?></h2>

<?php //var_dump($Medicamento);?>

<?php echo $this->Form->create('Medicamento', array('action' => 'edit')); ?>
<?php //echo $this->Form->hidden('formMedicamento', array('value' => true))?>
<?php //echo $this->Form->hidden('pre_atividade_id', array('value' => $pre_atividade_id))?>
<?php echo $this->Form->input('hora', array('label' => 'Hora')) ; ?>
<?php echo $this->Form->input('tipo', array('label' => 'Tipo')) ; ?>
<?php echo $this->Form->input('qtde', array('label' => 'Quantidade')) ; ?>
<?php echo $this->Form->hidden('id', array('value' => $Medicamento['Medicamento']['id'])) ; ?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $Medicamento['Medicamento']['pre_atividade_id'])) ; ?>

<?php echo $this->Form->end('Salvar Medicamento'); ?>