<?php 
	echo $this->Form->create('Inscricao');
	echo $this->Form->input('data_ini');
	echo $this->Form->input('data_fim');
	echo $this->Form->select('paga',array('0'=> 'Gratuita', '1' => 'Paga'));
	echo $this->Form->input('valor');

	echo $this->Form->end('salvar'); 
	
?>				