<?php 
	echo $this->Form->create('Evento');
	echo $this->Form->input('Usuario.id', array('type' => 'hidden' , 'value' => AuthComponent::user('id')));
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->end('salvar');
?>