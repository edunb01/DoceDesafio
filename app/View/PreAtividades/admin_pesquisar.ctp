<!-- DoceDesafio/app/View/PreAtividades/admin_pesquisar.ctp -->

<?php 
    /*
     * Formulário para efetuar a pesquisar  de todas as atividades de um determinado participante pelo nome usando o %LIKE% do mysql,
     * este é redirecionado para o controller => User  action => admin_pesquisar.
     * 
     * A ideia é pesquisar o usuario e retonar um outro formulario com todos os nomes dos participante para que seja listado todas as 
     */
?>

<div class="pesquisa form">

    <?php echo $this->Form->create('PreAtividade', array('action' => 'pesquisar'));?>
    
    <fieldset>
        <legend>Listar Todas As Atividades do Participante</legend>

        <?php 
            echo $this->Form->input('nome', array('label' => 'Nome e/ou Sobrenome'));

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
                echo    "<td>".$user['users']['id']."</td>";
                echo    "<td>".$user['users']['nome']. " ". $user['users']['sobrenome'] ."</td>";
                echo    "<td>".$user['users']['email']."</td>";
                echo    "<td>";

                echo    $this->Html->image('search32x32.png', array(//link para visualização de participante
                                'alt' => 'Visualisar Todas as Preatividades',
                                'title' => 'Visualisar Todas as Preatividades',
                                'width' => 32,
                                'height' => 32,
                                'url' => array('controller' => 'PreAtividades', 'action' => 'listByIdUser', $user['users']['id'])
                                )); 

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