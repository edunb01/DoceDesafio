    <?php echo $this->Form->create('User', array('action' => 'edit'));?>
    <h2>Editar Participante Código:<?php echo $User['User']['id']?> </h2>

    <fieldset>
        <?php
            echo $this->Form->input('id' , array('value' =>  $User['User']['id'], 'type' => 'hidden'));
            echo $this->Form->input('nome');
            echo $this->Form->input('sobrenome');
            echo $this->Form->input('email');
            echo $this->Form->input('tipo_diabetes',
                array(
                'options' => array('1' => 'Tipo 1', '2' => 'Tipo 2' , 'gestacional' => 'Gestacional'),
                'type' => 'select',
                'empty' => '-- Selecione --',
                'label' => 'Tipo de Diabetes'
                )
            );
            
            echo $this->Form->input('sexo',
                    array('type' => 'radio', 'options' => array('M' => 'Male', 'F' => 'Female'), 'value' => 'M')
            );
            
            echo $this->Form->input('insulinoterapia',
                    array('type' => 'radio',  'options' => array('S' => 'Sim', 'N' => 'N&atilde;o'), 'value' => 'S')
            );
            
            echo $this->Form->input('turno',
                    array('type' => 'radio',  'options' => array('M' => 'Manh&atilde;', 'T' => 'Tarde', 'N' => 'Noite'), 'value' => 'M')
            );
            
            echo $this->Form->input('semestre',
                array(
                'options' => array('1' => '1°', '2' => '2°'),
                'type' => 'select',
                'empty' => '-- Selecione --',
                'label' => 'Semestre'
                )
            );
            
            
            
            for($i=(date('Y') - 5); $i <= date('Y'); $i++){
                $option[$i] = $i;
            }
            
            echo $this->Form->input('ano',
                array(
                'options' => $option,
                'type' => 'select',
                'empty' => '-- Selecione --',
                'label' => 'Ano'
                )
            );
            
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role_id', array('value' => 'regular' , 'type' => 'hidden')); 

            
        ?>
        </fieldset>
    <?php echo $this->Form->end('Submit');?>