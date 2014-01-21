boletos


<?php foreach ($bol as $b) { 
	echo $this->Html->link('Boleto', array('controller' => 'boletos', 'action' => 'geraBoleto' , 'admin' => true, $b['Cadastro']['evento_id']), array('target' => '_blank'));
 } ?>