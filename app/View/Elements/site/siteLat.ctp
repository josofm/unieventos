<div class="well">
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#rec" data-toggle="tab">Recentes</a></li>
        <li><a href="#prox" data-toggle="tab">Proximos</a></li>
    </ul>

    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="rec">
            <?php $eventos = $this->requestAction(array('controller' => 'eventos', 'action' => 'eventosRecentes')); 
            	foreach ($eventos as $evento):?>
            	<p><?php echo $this->Html->link($evento['Evento']['nome'], array('controller' => 'eventos', 'action' => 'view', $evento['Evento']['id'])) ?></p>
            	<?php endforeach; ?>

        </div>
        <div class="tab-pane" id="prox">
            <?php $eventos = $this->requestAction(array('controller' => 'eventos', 'action' => 'eventosInicio'));

            	foreach ($eventos as $evento):?>
            	<p><?php echo $this->Html->link($evento['Evento']['nome'],array('controller' => 'eventos', 'action' => 'view', $evento['Evento']['id'])) ?></p>
            	<?php endforeach; ?>
        </div>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script> 
</div>