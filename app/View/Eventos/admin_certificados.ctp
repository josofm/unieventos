<?php //var_dump($evento) ?>

<div class="box span12">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo __('Certificados') ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box span6">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo __('Informações do Evento') ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<ul class="dashboard-list">
			<li>Nome: <?php echo $evento['Evento']['nome'] ?></li>
			<li>Sigla: <?php echo $evento['Evento']['sigla'] ?></li>
			<li>Tema: <?php echo $evento['Evento']['tema'] ?></li>
			<li>Abertura do Evento: <?php echo $evento['Evento']['data_ini'] ?></li>
		</ul>
	</div>
</div>
<div class="box span3">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo __('Modelo')  ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		modelo
	</div>
</div>
<div class="box span3">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo __('Ações'); ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<button class="btn btn-large btn-primary">
		<?php echo $this->Form->postLink('Gerar Certificados', array('controller' => 'invoices', 'action' => 'gerar', 'admin' => true, $evento['Evento']['id']),array(
                        'confirm' => __('Você deseja realmente inscriver-se no evento ?')
                        )) ?>
		</button>
	</div>
</div>
</div>