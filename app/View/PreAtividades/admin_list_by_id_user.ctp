<h3>Total de <?php echo  count ($PreAtividades); ?> Pré-Atividades </h3>

<table id="itensVisualizados">
    <tr>
        <th>C&oacute;digo</th>
        <th>Data</th>
        <th>Participante</th>
        <th>PSG</th>
        <th>Glicose</th>
        <th>PA</th>
        <th>FC</th>
        <th>CHO</th>
        <th>Opções</th>
    </tr>
    
    <?php   foreach ($PreAtividades as $PreAtividade) :?>
        
    <tr>
        <td><?php echo $PreAtividade['PreAtividade']['id'] ?></td>
        <td>
            <?php echo date('d-m-Y', strtotime( $PreAtividade['PreAtividade']['data'])) ?>
            às
            <?php echo $PreAtividade['PreAtividade']['hora'] . 'h -' ?>
            <?php 
                if($PreAtividade['PreAtividade']['turno'] == 'manha'){
                    echo "Manhã";
                }else if($PreAtividade['PreAtividade']['turno'] == 'tarde'){
                    echo "Tarde";
                }else{
                    echo "Noite";
                }
            ?>
        </td>
        <td>
            <?php echo $PreAtividade['Users']['nome'] . " " . $PreAtividade['Users']['sobrenome'] ?>
        </td>
        
        <td><?php echo $PreAtividade['PreAtividade']['psg'] ?></td>
        <td><?php echo $PreAtividade['PreAtividade']['glicose'] ?></td>
        <td><?php echo $PreAtividade['PreAtividade']['pa'] ?></td>
        <td><?php echo $PreAtividade['PreAtividade']['fc'] ?></td>
        <td><?php echo $PreAtividade['PreAtividade']['cho'] ?></td>
        <td>
            <?php
                echo $this->Html->image('search32x32.png', array(
                        'alt' => 'Visualisar Atividade',
                        'title' => 'Visualisar Atividade',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'PreAtividades', 'action' => 'view', $PreAtividade['PreAtividade']['id'])
                        ));
                
                echo "&nbsp;";
                
                echo $this->Html->image('edit.png', array(
                        'alt' => 'Editar Atividade',
                        'title' => 'Editar Atividade',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'PreAtividades', 'action' => 'edit', $PreAtividade['PreAtividade']['id'])
                        )); 
                
                echo "&nbsp;";
                
                echo $this->Form->postLink(
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'),'width' => 16,'height' => 16,)), 
                        array('controller' => 'PreAtividades' ,'action' => 'delete', $PreAtividade['PreAtividade']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir Pré-Atividade '.$PreAtividade['PreAtividade']['id'].'?')) 
                        );
                
                echo "&nbsp;";
            ?>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>