<?php 
	echo $evento['Evento']['nome'].'<br/>';
	echo $evento['Evento']['descricao'];

	echo $this->Form->button($this->Html->link('Aprovar', 
                    array(
                        'controller' => 'eventos',
                        'action' => 'aprovacao', 
                        'admin' => true, 
                        $evento['Evento']['id']
                        ),  
                    array(
                        'confirm' => __('Você deseja realmente aprovar o evento "'. $evento['Evento']['nome'].'"?')
                        )
                ),array('class' => 'btn btn-primary')); 
 ?>