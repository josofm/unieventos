<h3>É preciso estar logado para ver mais sobre os eventos!</h3>
<div class="text-center">
<?php 
	echo $this->Html->link('Logar', array('controller' => 'usuarios', 'action' => 'login', 'admin' => false),array('class' => 'btn btn-primary'));
	echo '  ';
	echo $this->Html->link('Cadastrar-se', array('controller' => 'usuarios', 'action' => 'cadastro'), array('class' => 'btn btn-primary'));

 ?>
 </div>