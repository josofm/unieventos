<?php //var_dump($evento) ?>

<div class="box span12">
	<div class="box span9">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-book"></i><?php echo $evento['Evento']['sigla']; ?></h2>
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
			<li>Nº Vagas: <?php echo $evento['Evento']['vagas'] ?></li>
			<?php $count = $this->requestAction(array('controller' => 'cadastros', 'action' => 'conta', 'admin' => false,$evento['Evento']['id']));?>
			<li>Restantes: <?php echo $evento['Evento']['vagas'] - $count. ' Vagas'; ?></li>
			<li>Abertura do Evento: <?php echo $evento['Evento']['data_ini'] ?></li>
		</ul>
	</div>
</div>
<div class="box span3">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-cog"></i><?php echo __('Ações') ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
		<ul class="dashboard-list">
			<li>
				<button class="btn btn-large btn-primary"><?php echo $this->Html->link('Programação', array('controller' => 'programacoes', 'action' => 'index', 'admin' => true, $evento['Evento']['id']), array('style' => 'color:#fff;')) ?></button>
			</li>
			<li>
				<button class="btn btn-large btn-primary"><?php echo $this->Html->link('Chamada', array('controller' => 'presencas', 'action' => 'chamada', 'admin' => true, $evento['Evento']['id']), array('style' => 'color:#fff;')) ?></button>
			</li>
			<li>
				<button class="btn btn-large btn-primary"><?php echo $this->Html->link('Presentes', array('controller' => 'presencas', 'action' => 'listar', 'admin' => true, $evento['Evento']['id'],), array('style' => 'color:#fff;')) ?></button>
			</li>
			<li>
				<button class="btn btn-large btn-primary"><?php echo $this->Html->link('Certificados', array('controller' => 'eventos', 'action' => 'certificados', 'admin' => true, $evento['Evento']['id'],), array('style' => 'color:#fff;')) ?></button>
			</li>
		</ul>
	</div>
</div>

</div>