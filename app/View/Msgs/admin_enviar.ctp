<?php 
    echo $this->Form->create('Msg');
    echo $this->Form->input('usuarios_msg', array('options' => $usuarios, 'id' => 'usuario'));
    echo $this->Form->input('titulo');
    echo $this->Form->input('texto' ,array('type' => 'textArea'));
    echo $this->Form->end('Enviar');
?>