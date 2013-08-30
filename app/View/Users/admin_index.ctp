<div class="clearfix columns">
<table class="datatable">
<thead>
    <?php echo $this->Html->tableHeaders(array('Código', 'Nome', 'Tipo Diabetes', 'Insulinoterapia' ,'Ações'));?>
</thead>

<tbody>
    
    <?php   foreach ($Users as $User) :?>
    <tr>
        <td><?php echo $User['User']['id'] ?></td>
        <td><?php echo $User['User']['nome'] ." ". $User['User']['sobrenome'] ?></td>
        <td><?php echo $User['User']['tipo_diabetes'] ?></td>
        <td>
            <?php
                if($User['User']['insulinoterapia'] == 'S'){
                    echo 'Sim';
                }else{
                    echo 'Não';
                }
            ?>
        </td>

        <td>
            <?php
                echo    $this->Html->image('search32x32.png', array(//link para visualização de participante
                                'alt' => 'Visualisar Participante',
                                'title' => 'Visualisar Participante',
                                'width' => 16,
                                'height' => 16,
                                'url' => array('controller' => 'Users', 'action' => 'view', $User['User']['id'])
                                )); 
                echo    $this->Html->image('edit.png', array(//link edição de participante
                                'alt' => 'Editar Participante',
                                'title' => 'Editar Participante',
                                'width' => 16,
                                'height' => 16,
                                'url' => array('controller' => 'Users', 'action' => 'edit', $User['User']['id'])
                                ));

                echo $this->Form->postLink(//link para exclusão de participante
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'), 'width' => 16, 'height' => 16)), 
                        array('controller' => 'Users' ,'action' => 'delete', $User['User']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir Participante '.$User['User']['id'].'?')) 
                        );
            ?>
        </td>

    </tr>
    <?php endforeach;?>

</tbody>
</table>
</div>


