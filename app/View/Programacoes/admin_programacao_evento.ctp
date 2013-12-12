<?php 
	echo $this->Form->create('Programacao');
	echo $this->Form->input('titulo');
	echo $this->Form->input('palestrante');
	echo $this->Form->input('descricao');

	echo $this->Form->end('salvar'); 
	
?>				