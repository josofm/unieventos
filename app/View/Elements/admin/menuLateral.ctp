<ul class="nav navbar-nav side-nav">
    <li>
        <?php echo $this->html->link('<i class="fa fa-dashboard"></i> '.__('Inicio'), array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Caixa de entrada'), array('controller' => 'msgs', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Eventos'), array('controller' => 'eventos', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Criar eventos'), array('controller' => 'eventos', 'action' => 'cadastrarEvento', 'admin' => true), array('escape' => false)) ?>
    </li>
    <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
    <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
    <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
    <ul class="dropdown-menu">
    <li><a href="#">Dropdown Item</a></li>
    <li><a href="#">Another Item</a></li>
    <li><a href="#">Third Item</a></li>
    <li><a href="#">Last Item</a></li>
    </ul>
    </li>
</ul>