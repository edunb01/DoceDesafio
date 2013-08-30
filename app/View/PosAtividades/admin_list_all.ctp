<h3>Total de <?php echo  count ($PosAtividades); ?> Pós-Atividades </h3>

<table id="itensVisualizados">
    <tr>
        <th>Código</th>
        <th>PSG</th>
        <th>Glicose</th>
        <th>PA</th>
        <th>FC</th>
        <th>Insulina</th>
        <th>CHO</th>
        <th>Percepção</th>
        <th>Grau de Satisfação</th>
        <th>Observações</th>
        <th>Opções</th>
    </tr>
    
    <?php // var_dump($PosAtividades) ?>
    
    <?php   foreach ($PosAtividades as $PosAtividades) :?>
        
    <tr>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['pre_atividade_id'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['psg'] ?></td>      
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['glicose'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['pa'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['fc'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['pa'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['fc'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['cho'] ?></td>
        <td width="6%"><?php echo $PosAtividades['PosAtividade']['percepcao_subjetiva'] ?></td>
        
        <td style="text-align: justify;"><?php echo $PosAtividades['PosAtividade']['observacoes'] ?></td>

        <td width="6%">
            <?php
                echo $this->Html->image('edit.png', array(
                'alt' => 'Editar Pos-Atividade',
                'title' => 'Editar Pos-Atividade',
                'width' => 16,
                'height' => 16,
                'url' => array('controller' => 'PosAtividades', 'action' => 'edit', $PosAtividades['PosAtividade']['id'])
                ));

                echo "&nbsp;";
                
                echo $this->Form->postLink(
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'), 'width' => 16, 'height' => 16,)), 
                        array('controller' => 'PosAtividades' ,'action' => 'delete',$PosAtividades['PosAtividade']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir Pós-Atividade '.$PosAtividades['PosAtividade']['id'] . ". Ref. Atividade ".$PosAtividades['PosAtividade']['pre_atividade_id'].'?')) 
                    );
            ?>
        </td>
    </tr>
    <?php endforeach;?>
    
</table>