<table id="itensVisualizados">
    <tr>
        <th>C&oacute;digo</th>
        <th>Data</th>
        <th>Turno</th>
        <th>Hora</th>
        <th>Pos Atividade</th>
        <th>Alimentação</th>
        <th>Medicamento</th>
        <th>Ações</th>
    </tr>
    
    <?php   foreach ($PreAtividades as $PreAtividade) :?>
        
    <tr>
        <td><?php echo $PreAtividade['PreAtividade']['id'] ?></td>
        <td><?php echo date('d-m-Y', strtotime( $PreAtividade['PreAtividade']['data'])) ?></td>
        <td>
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
        <td><?php echo $PreAtividade['PreAtividade']['hora'] ?></td>

        <td>
            <?php
                //var_dump($PreAtividade['PosAtividade']);
            
                if(!empty($PreAtividade['PosAtividade']['id'])){
                    echo $this->Html->image('checkAtFisica.png', array('width' => 16, 'height' => 16));
                }else{
                    echo $this->Html->image('attention-icon.png', array(
                        'alt' => 'Completar atividade',
                        'title' => 'Completar atividade',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'PosAtividades', 'action' => 'add', $PreAtividade['PreAtividade']['id'])
                        ));
                }
            ?>
        </td>

        <td>
            <?php
                if(!empty($PreAtividade['Alimento'])){
                    echo $this->Html->image('Check-icon.png', array(
                        'alt' => 'Adicionar mais alimentos',
                        'title' => 'Adicionar mais alimentos',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Alimentos', 'action' => 'add', $PreAtividade['PreAtividade']['id'])
                        ));
                }else{
                    echo $this->Html->image('attention-icon.png', array(
                        'alt' => 'Completar atividade',
                        'title' => 'Completar atividade',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Alimentos', 'action' => 'add', $PreAtividade['PreAtividade']['id'])
                        ));
                }
            ?>
        </td>
 
        <td>
            <?php
                if(!empty($PreAtividade['Medicamento'])){
                    echo $this->Html->image('Check-icon.png', array(
                        'alt' => 'Adicionar mais medicamentos',
                        'title' => 'Adicionar mais medicamentos',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Medicamentos', 'action' => 'add', $PreAtividade['PreAtividade']['id'])
                        ));
                }else{
                    echo $this->Html->image('attention-icon.png', array(
                        'alt' => 'Completar atividade',
                        'title' => 'Completar atividade',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Medicamentos', 'action' => 'add', $PreAtividade['PreAtividade']['id'])
                        ));
                }
            ?>
        </td>

 
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
                      
                echo $this->Form->postLink(
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'), 'width' => 16, 'height' => 16)), 
                        array('controller' => 'PreAtividades' ,'action' => 'delete', $PreAtividade['PreAtividade']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir Pré-Atividade '.$PreAtividade['PreAtividade']['id'].'?')) 
                        );
                
            ?>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>