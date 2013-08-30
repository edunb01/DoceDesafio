<!-- app/View/PosAtividades/admin_add.ctp -->


<?php

    //var_dump($idPreAtividade);
?>

<h2><?php echo "Dados da P&oacute;s - Atividade F&iacute;sica n°: ". $pre_atividade_id?></h2>


<?php echo $this->Form->create('PosAtividade'); ?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $idPreAtividade))?>

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
    'options' => array('detestou' => 'Detestou', 'nao_gostou' => 'Não Gostou', 'meidana' => 'Mediana', 'gostou' => 'Gostou', 'otima' => 'Ótima'),
    'label' => 'Grau de Satisfa&ccedil;&atilde;o',
    'empty'   => false
));
?>

<?php echo $this->Form->input('observacoes', array('label' => 'Observa&ccedil;&otilde;es')) ; ?>


<?php echo $this->Form->end('Submit'); ?>