<!-- app/View/PreAtividades/admin_add.ctp -->

<h2>Formul&aacute;rio de coleta de dados Pr&eacute; - Atividade F&iacute;sica</h2>


<?php
        
/*
 * Montar um vetor com todos os nomes de usuarios para poder ser selecionado o candidato correto pelo nome
 * porém no cadastro será efetuado pelo id do usuário
 * este vetor excluir todos os usuários que tem role_id == admin
 */
    $user = array();
    
    foreach ($Users as $User):
        if($User['users']['role_id'] != 'admin')
            $user[$User['users']['id']] = $User['users']['nome'] . " ". $User['users']['sobrenome'];
    endforeach;

?>

<?php echo $this->Form->create('PreAtividade', array('action' => 'admin_add')); ?>

<?php 
echo $this->Form->input('user_id', array(
    'type' => 'select',
    'label' => 'Usuário',
    'options' =>   $user
    )
);
?>

<?php echo $this->Form->input('data', array('label' => 'Data')) ; ?>

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