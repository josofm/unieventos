<h1><?php echo h($evento['Evento']['nome']); ?></h1>

<p><small>Created: <?php echo $evento['Evento']['created']; ?></small></p>

<p><?php echo h($evento['Evento']['descricao']); ?></p>

<p><?php echo $evento['Inscricao'][0]['data_ini']; ?></p>
<p><?php echo $evento['Inscricao'][0]['valor']; ?></p>




<?php 
	if($logged_in){
		echo $this->Form->postLink('Inscrever', 
			array(
				'controller' => 'cadastros', 
				'action' => 'inscricao', 
				$evento['Evento']['id']
			),
			array(
                        'confirm' => __('Você deseja realmente inscriver-se no evento "'. $evento['Evento']['nome'].'"?')
                        )
		);
		echo ' | ';
		echo $this->Html->link('Programação', 
			array('controller' => 'programacoes','action' => 'programacao', $evento['Evento']['id'])
		);
	}else{
		echo $this->Html->link('Ver mais',
			array(
				'controller' => 'eventos',
				'action' => 'logar'
			)
		);
	}
?>