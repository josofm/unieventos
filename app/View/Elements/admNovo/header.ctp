<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#"> <span>UniEventos</span></a>
			
			<!-- theme selector starts -->
			
			<!-- theme selector ends -->
			
			<!-- user dropdown starts -->
			<div class="btn-group pull-right" >
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i><span class="hidden-phone"> <?php echo AuthComponent::user('nome') ?></span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<?php echo $this->html->link('<i class="fa fa-user"></i> '.__('Perfil'), array('controller' => 'usuarios', 'action' => 'perfil', 'admin' => true, AuthComponent::user('id')), array('escape' => false)) ?>
					</li>
					<li class="divider"></li>
					<li>
						<?php echo $this->html->link('<i class="fa fa-power-off"></i> '.__('Sair'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false), array('escape' => false)) ?>
					</li>
				</ul>
			</div>
			<!-- user dropdown ends -->
			
			<!--/.nav-collapse -->
		</div>
	</div>
</div>