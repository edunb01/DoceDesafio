<!-- app/View/Medicamentos/add.ctp -->
<?php 
    if($this->request->is('get')){
        //echo "<script>alert(".$this->params->pass[0].")</script>";
        //Passado via post atraves do link na index() do PreAtividades
        $pre_atividade_id = $this->params->pass[0];
    }else{
        throw new NotFoundException(__('Inconsistência de dados, tente mais tarde.'));
    }
?>

<h2><?php echo "Medicamentos Atividade F&iacute;sica C&oacute;digo: ". $pre_atividade_id?></h2>

<?php echo $this->Form->create('Medicamento'); ?>
<?php echo $this->Form->hidden('formMedicamento', array('value' => true))?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $pre_atividade_id))?>
<?php echo $this->Form->input('hora', array('label' => 'Hora')) ; ?>
<?php echo $this->Form->input('tipo', array('label' => 'Tipo')) ; ?>
<?php echo $this->Form->input('qtde', array('label' => 'Quantidade')) ; ?>

<?php echo $this->Form->end('Submit'); ?>