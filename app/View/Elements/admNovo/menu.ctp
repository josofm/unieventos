<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="nav-header hidden-tablet">Main</li>
			<li>
				<?php echo $this->html->link('<i class="icon-home"></i><span class="hidden-tablet">  '.__('Inicio').'</span>', array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
			</li>

			<li>
				<?php echo $this->html->link('<i class="icon-envelope"></i><span class="hidden-tablet"> '.__('Caixa de entrada').'</span>', array('controller' => 'msgs', 'action' => 'index', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
				
			</li>
			<li>
				<?php echo $this->html->link('<i class=" icon-plus"></i><span class="hidden-tablet"> '.__('Criar evento').'</span>', array('controller' => 'eventos', 'action' => 'cadastrarEvento', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
			</li>
			<li>
				<?php echo $this->html->link('<i class="icon-list"></i><span class="hidden-tablet">'.__('Meus eventos').'</span>', array('controller' => 'eventos', 'action' => 'meusEventos', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
			</li>
			<li>
				<?php echo $this->html->link('<i class="icon-list-alt"></i><span class="hidden-tablet">'.__('Listar eventos').'</span>', array('controller' => 'eventos', 'action' => 'listarEventos', 'admin' => true), array('escape' => false)) ?>
			</li>
			<li>
				<?php echo $this->Html->link('<i class="icon-user"></i><span class="hidden-tablet">'.__('Cadastrar Usuario').'</span>', array('controller' => 'usuarios', 'action' => 'cadastro', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')); ?>
			</li>
			<li>
				<?php echo $this->Html->link('<i class=" icon-list"></i><span class="hidden-tablet">'.__('Listar Usuarios').'</span>', array('controller' => 'usuarios', 'action' => 'index', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')); ?>
			</li>
			<li class="nav-header hidden-tablet">Sample Section</li>
			<li>
				<?php echo $this->Html->link('<i class="icon-plus"></i><span class="hidden-tablet">'.__('Criar Evento').'</span>', array('controller' => 'eventos', 'action' => 'cadastrarEvento', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')); ?>
			</li>
			<li>
				<?php echo $this->Html->link('<i class="icon-ok"></i><span class="hidden-tablet">'.__('Aprovar Evento').'</span>', array('controller' => 'eventos', 'action' => 'listaAprovacoes', 'admin' => true),array('escape' => false, 'class'=>'ajax-link')); ?>
			</li>
			<li>
				<?php echo $this->html->link('<i class="icon-barcode"></i><span class="hidden-tablet">'.__('Gerar Boletos').'</span>', array('controller' => 'cadastros', 'action' => 'boletos', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
			</li>
			<li>
				<?php echo $this->html->link('<i class="icon-barcode"></i><span class="hidden-tablet">'.__('Certificados').'</span>', array('controller' => 'invoices', 'action' => 'index', 'admin' => true), array('escape' => false, 'class'=>'ajax-link')) ?>
			</li>
		</ul>
		<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
	</div><!--/.well -->
</div>