<!-- File: /app/View/PreAtendimentos/admin_view.ctp -->

    
<table class="viewPreAtividade">
    <tr>
        <th colspan = "4" style="border-right: none;"> <h3><?php echo "Dados da Atividade n°: " . $PreAtividade['PreAtividade']['id'] ?></h3>
        
            <?php
            
                //var_dump($PreAtividade['PosAtividade']);
                
                echo $this->Html->link('Editar Pre-Atividade', array('controller' => 'PreAtividades', 'action' => 'edit', $PreAtividade['PreAtividade']['id']));
                echo "&nbsp;|&nbsp;";
                
                /*
                 * Se exister uma pos-atividade exibe o link para editar, caso contrário exibe o link para adicionar 
                 */
                if(empty($PreAtividade['PosAtividade']['id']) && is_null($PreAtividade['PosAtividade']['id']) ){
                    echo $this->Html->link('Adicionar Pos-Atividade', array('controller' => 'PosAtividades', 'action' => 'add', $PreAtividade['PreAtividade']['id']));
                }else{
                    echo $this->Html->link('Editar Pos-Atividade', array('controller' => 'PosAtividades', 'action' => 'add', $PreAtividade['PreAtividade']['id']));
                }
            ?> 
        </th>
    </tr>
   
    <tr>
        <td colspan = "2" ><strong>Pré-Atividade &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; Pós-Atividade</strong></td>
        <td colspan = "2" ><strong>Pré-Atividade &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; Pós-Atividade</strong></td>
    </tr>
        
    <tr><th colspan="2" >PSG</th> <th colspan="2" style="border-right: none;">Glicose</th></tr>
    <tr>
        <td><?php echo $PreAtividade['PreAtividade']['psg'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['psg'];?></td>

        <td><?php echo $PreAtividade['PreAtividade']['glicose'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['glicose'];?></td>
    </tr>
    
    <tr><th colspan="2">PA</th> <th colspan="2" style="border-right: none;">FC</th></tr>
    <tr>
        <td><?php echo $PreAtividade['PreAtividade']['pa'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['pa'];?></td>

        <td><?php echo $PreAtividade['PreAtividade']['fc'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['fc'];?></td>
    </tr>
    
    <tr><th colspan="2">Insulina</th> <th colspan="2" style="border-right: none;">CHO</th></tr>
    <tr>
        <td><?php echo $PreAtividade['PreAtividade']['insulina'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['insulina'];?></td>

        <td><?php echo $PreAtividade['PreAtividade']['cho'];?></td>
        <td><?php echo $PreAtividade['PosAtividade']['cho'];?></td>
    </tr>
    
    <tr><th colspan="2">Percepção</th> <th colspan="2" style="border-right: none;">Grau de Satisfação</th></tr>
    <tr>
        <td colspan="2"><?php echo $PreAtividade['PosAtividade']['percepcao_subjetiva'];?></td>
        <td colspan="2"><?php echo $PreAtividade['PosAtividade']['grau_satisfacao'];?></td>
    </tr>
    
    <tr><th colspan="4" style="border-right: none;">Observação</th></tr>
    <tr>
        <td colspan="4" style="text-align: justify;"><?php echo $PreAtividade['PosAtividade']['observacoes'];?></td>
    </tr>
    
</table>


<table class="viewPreAtividade">
    <tr>
        <th colspan = "4" style="border-right: none;">
            <h3>Medicamentos</h3>
            <?php
                echo $this->Html->link('Adicionar Medicamentos',array('controller' => 'Medicamentos', 'action' => 'add', $PreAtividade['PreAtividade']['id']));
            ?>
        </th>
    </tr>
   
    <tr>
        <th>Medicamento</th>
        <th>Quantidade</th>
        <th>Hora</th>
        <th style="border-right: none">Opções</th>
    </tr>
    <?php
        foreach ($PreAtividade['Medicamento'] as $Medicamento) :
    ?>
        
    <tr>
        <td class="medicamento"><?php echo $Medicamento['tipo'];?></td>
        <td class="medicamento"><?php echo $Medicamento['qtde'];?></td>
        <td class="medicamento"><?php echo $Medicamento['hora'];?></td>        

        <td>
            <?php 
                
                echo $this->Html->image('edit.png', array(
                        'alt' => 'Editar Medicamento',
                        'title' => 'Editar Medicamento',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Medicamentos', 'action' => 'edit', $Medicamento['id'])
                        )); 
                
                echo "&nbsp;";
                                        
                echo $this->Form->postLink(
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'), 'width' => 16, 'height' => 16)), 
                        array('controller' => 'Medicamentos' ,'action' => 'delete', $Medicamento['id'], $PreAtividade['PreAtividade']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir o Medicamento '.$Medicamento['id'].'?')) 
                        );
                
                echo "&nbsp;";
            ?>
        </td>
    </tr>
        
    <?php endforeach; ?>
    
</table>



<table class="viewPreAtividade">
    <tr>
        <th colspan = "4" style="border-right: none;">
            <h3>Alimentos Consumidos</h3>
            <?php
                echo $this->Html->link('Adicionar Alimentos', array('controller' => 'Alimentos', 'action' => 'add', $PreAtividade['PreAtividade']['id']));
                ?>
        </th>
    </tr>
    
    <tr>
        <th>Aliemento</th>
        <th>Hora</th>
        <th>CHO</th>
        <th style="border-right: none">Opções</th>
    </tr>
   
    <?php
        foreach ($PreAtividade['Alimento'] as $Alimento) :
    ?>
        
    <tr>
        <td class="alimento"><?php echo $Alimento['alimento'];?></td>
        <td class="alimento"><?php echo $Alimento['hora'];?></td>
        <td class="alimento"><?php echo $Alimento['cho'];?></td>
        <td style="border-right: none">
            <?php                 
                echo $this->Html->image('edit.png', array(
                        'alt' => 'Editar Alimento',
                        'title' => 'Editar Alimento',
                        'width' => 16,
                        'height' => 16,
                        'url' => array('controller' => 'Alimentos', 'action' => 'edit', $Alimento['id'])
                        )); 
                
                echo "&nbsp;";
                                        
                echo $this->Form->postLink(
                        $this->Html->image('delete32x32.png',  array("alt" => __('Delete'), "title" => __('Delete'), 'width' => 16, 'height' => 16, )), 
                        array('controller' => 'Alimentos' ,'action' => 'delete', $Alimento['id'], $PreAtividade['PreAtividade']['id']), 
                        array('escape' => false, 'confirm' => __('Gostaria de excluir o Alimento '.$Alimento['id'].'?')) 
                        );
                
                echo "&nbsp;";
            ?>
        </td>
    </tr>
    
  
    </tr>
        
    <?php endforeach; ?>
    
</table>


<table class="viewPreAtividade" cellspacing='0'>
    <tr>
        <th colspan = "4" style="border-right: none;"> <h3>Demais Dados</h3></th>
    </tr>
   
    <tr>
        <td>Data</td>
        <td>
            <?php
                echo date('d-m-Y', strtotime($PreAtividade['PreAtividade']['data']));
            ?>
        </td>
        <td>Hora</td>
        <td><?php echo $PreAtividade['PreAtividade']['hora'];?>h</td>
    </tr>
    
    <tr>
        <td>Turno</td>
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
        <td>Local</td>
        <td><?php echo $PreAtividade['PreAtividade']['local'];?></td>
    </tr>
    
    <tr>
        <td>Peso</td>
        <td><?php echo $PreAtividade['PreAtividade']['peso_antes'];?>Kg</td>
        <td>Atividade - monitor</td>
        <td><?php echo $PreAtividade['PreAtividade']['atividade_monitor'];?></td>
    </tr>
    
    <tr>
        <th colspan="4" style='border-right: none'>Tema Debate</th>
    </tr>
    <tr>
        <td colspan="4" style="text-align: justify;"><?php echo $PreAtividade['PreAtividade']['tema_debate'];?></td>
    </tr>
  
</table>
