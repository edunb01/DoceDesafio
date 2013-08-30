<h2><?php echo "Editar da P&oacute;s - Atividade Código: ". $PosAtividade['PosAtividade']['id']?></h2>


<?php echo $this->Form->create('PosAtividade', array('controller' => 'PosAtividade', 'action' => 'edit')); ?>

<?php echo $this->Form->hidden('id', array('value' => $PosAtividade['PosAtividade']['id'])) ; ?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $PosAtividade['PosAtividade']['pre_atividade_id'])) ; ?>

<?php echo $this->Form->input('psg', array('label' => 'PSG')) ; ?>
<?php echo $this->Form->input('glicose', array('label' => 'Glicose')) ; ?>
<?php echo $this->Form->input('pa', array('label' => 'Pressao arterial')) ; ?>
<?php echo $this->Form->input('fc', array('label' => 'Frequencia Cardiaca')) ; ?>
<?php echo $this->Form->input('insulina', array('label' => 'Insulina')) ; ?>
<?php echo $this->Form->input('cho', array('label' => 'Carboidrato')) ; ?>

<?php echo $this->Form->input('percepcao_subjetiva', array(
    'type'    => 'select',
    'options' => array('levissima' => 'Levíssima', 'leve' => 'Leve', 'moderada' => 'Moderada', 'intensa' => 'Intensa', 'pesada' => 'Pesada'),
    'label' => 'Percep&ccedil;&atilde;o Subjetiva',
    'empty'   => false
));
?>

<?php echo $this->Form->input('grau_satisfacao', array(
    'type'    => 'select',
    'options' => array('detestou' => 'Detestou', 'nao_gostou' => 'Não Gostou', 'mediana' => 'Mediana', 'gostou' => 'Gostou', 'otima' => 'Ótima'),
    'label' => 'Grau de Satisfa&ccedil;&atilde;o',
    'empty'   => false
));
?>

<?php echo $this->Form->input('observacoes', array('label' => 'Observa&ccedil;&otilde;es')) ; ?>


<?php echo $this->Form->end('Salvar Pós Atividade'); ?>