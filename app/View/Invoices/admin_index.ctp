<div class="span12">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo __('Certificados') ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<ul class="dashboard-list">
		<?php foreach ($cer as $c): ?>
			<li>Evento: <?php echo $c['event']['sigla']. ' '. $this->Html->link('Certificado', array('controller' => 'invoices' , 'action' => 'view','admin' => false,1), array('target' => 'blank_'));  ?> </li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>