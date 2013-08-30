<!-- app/View/Aliementos/add.ctp -->
<?php 
    if($this->request->is('get')){
        //echo "<script>alert(".$this->params->pass[0].")</script>";
        //Passado via post atraves do link na index() do PreAtividades
        $pre_atividade_id = $this->params->pass[0];
    }else{
        throw new NotFoundException(__('Inconsistência de dados, tente mais tarde.'));
    }
?>

<h2><?php echo "Alimentos Consumidos - Atividade C&oacute;digo: ". $pre_atividade_id?></h2>

<?php echo $this->Form->create('Alimento', array('action' => 'add')); ?>
<?php echo $this->Form->hidden('pre_atividade_id', array('value' => $pre_atividade_id))?>
<?php echo $this->Form->input('alimento', array('label' => 'Alimento')) ; ?>
<?php echo $this->Form->input('hora', array('label' => 'Hora')) ; ?>
<?php echo $this->Form->input('cho', array('label' => 'CHO')) ; ?>

<?php echo $this->Form->end('Cadastrar Alimento'); ?>
