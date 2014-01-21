<?php 
	//echo '<pre>';
	//var_dump($usuario);
	//echo '</pre>';
	echo $this->element('sql_dump');
	//exit();
 ?>

 <div class="col-lg-12">
 	<div class="col-lg-8">
 		Nome: <?php echo h($usuario['user']['nome']); ?>
 	</div>

 	<?php
 		$options = $usuario['user']['id'].'-'.$usuario['Pagamento']['cadastros_evento_id'].'-'.$usuario['Pagamento']['id'];
 		echo $this->Form->postLink('Confirmar pagamento', 
			array(
				'controller' => 'pagamentos', 
				'action' => 'validarPagamento',
				'admin' => true, 
				$options
			),
			array(
                        'confirm' => __('Você deseja realmente inscriver-se no evento "'. $usuario['user']['nome'].'"?')
                        )
		); ?>
 </div>