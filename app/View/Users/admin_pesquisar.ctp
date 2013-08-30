<!-- DoceDesafio/app/View/Users/admin_pesquisar.ctp -->

<?php 
    /*
     * Formulário para efetuar a pesquisar o nome de algum participante usando o %LIKE% do mysql,
     * este é redirecionado para o controller => UsersController  action => admin_pesquisa.
     */
?>

<div class="pesquisa form">

    <?php echo $this->Form->create('User', array('action' => 'pesquisar'));?>
    
    <fieldset>
        <legend>Pesquisar Participante</legend>

        <?php 
            echo $this->Form->input('nome');

        ?>

    </fieldset>

    <?php echo $this->Form->end(__('Pesquisar')); ?>
</div>


<?php 

    /*
     * Após a Pesquisa ser efetuada, é feita a verificação se a variavél $UserPesquisa (array retornado) esta 'setada' retornada pelo
     * controller => UsersController, action => admin_pesquisa,  caso esteja, ainda assim é feita a verificação da mesma para checar se
     * este array contém mais de 1 item em seu conteúdo para escolher qual tabela mostrar, a de participante encontrados no banco de dados ou
     * informando que nenhum participante foi encontrado.
     */
    if(isset($UserPesquisa)){
        
        echo "<table class='datatable'>";
        echo    "<tr>";
        echo        '<th>Código</th>';
        echo        '<th>Nome</th>';
        echo        '<th>Email</th>';
        echo        '<th>Ações</th>';
        echo "</tr>";
        
        echo "<tbody>";
        
        //caso array não esteja vazio
        if(count($UserPesquisa) > 0){
        
            foreach ($UserPesquisa as $user) :
                echo "<tr>";
                echo    "<td>".$user['User']['id']."</td>";
                echo    "<td>".$user['User']['nome']. " ". $user['User']['sobrenome'] ."</td>";
                echo    "<td>".$user['User']['email']."</td>";
                echo    "<td>";

                echo    $this->Html->image('search32x32.png', array(//link para visualização de participante
                                'alt' => 'Visualisar Participante',
                                'title' => 'Visualisar Participante',
                                'width' => 32,
                                'height' => 32,
                                'url' => array('controller' => 'Users', 'action' => 'view', $user['User']['id'])
                                )); 
                echo    $this->Html->image('edit.png', array(//link edição de participante
                                'alt' => 'Editar Participante',
                                'title' => 'Editar Participante',
                                'width' => 32,
                                'height' => 32,
                                'url' => array('controller' => 'Users', 'action' => 'edit', $user['User']['id'])
                                ));

                echo $this->Form->postLink(//link para exclusão de participante
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'))), 
                        array('controller' => 'Users' ,'action' => 'delete', $user['User']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir Participante '.$user['User']['id'].'?')) 
                        );


                echo    "</td>";

                echo "</tr>";
            endforeach;
            
            //caso array esteja vazio
        }else{
            echo "<tr><td colspan='4'><h3>Nenhum registro encontrado!</h3></td></tr>";
        } 
        echo "<tbody>";
        echo "</table>";

   }
    

?>