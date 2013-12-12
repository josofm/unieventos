<ul class="nav navbar-nav side-nav">
    <li>
        <?php echo $this->html->link('<i class="fa fa-dashboard"></i> '.__('Inicio'), array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Caixa de entrada'), array('controller' => 'msgs', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
    </li>
    <?php if(AuthComponent::user('nivel') == 0){?>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Criar evento'), array('controller' => 'eventos', 'action' => 'cadastrarEvento', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Meus eventos'), array('controller' => 'eventos', 'action' => 'meusEventos', 'admin' => true), array('escape' => false)) ?>
    </li>
    <?php }if(AuthComponent::user('nivel') == 1){?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle sid-nav-inv" data-toggle="dropdown" ><i class="fa fa-user"></i> <?php echo __('Usuarios'); ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <?php echo $this->Html->link(__('Cadastrar Usuario'), array('controller' => 'usuarios', 'action' => 'cadastro', 'admin' => true)); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'usuarios', 'action' => 'index', 'admin' => true)); ?>
            </li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle sid-nav-inv" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> <?php echo __('Eventos'); ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <?php echo $this->Html->link(__('Criar Evento'), array('controller' => 'eventos', 'action' => 'cadastrarEvento', 'admin' => true)); ?>
            </li>
            <li>
                <?php echo $this->Html->link(__('Aprovar Evento'), array('controller' => 'eventos', 'action' => 'listaAprovacoes', 'admin' => true)); ?>
            </li>
        </ul>
    </li>
    <?php } ?>
    <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
    <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
    <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>
</ul>