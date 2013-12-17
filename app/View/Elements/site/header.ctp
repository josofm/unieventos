<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <h1>UNIEVENTOS</h1>
      <p class="lead">Gerenciador de Eventos</p>
    </div>
    <div class="span6">
      <div class="bsa">
          <?php echo $this->Html->image('logo.png') ?>
      </div>
    </div>
  </div>
  <div class="subnav" style="top:0px;">
    <ul class="nav nav-pills">
      <li><a href="#typography">Home</a></li>

      <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Eventos<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <?php echo $this->Html->link(__('Proximos'), array('controller' => 'eventos', 'action' => 'todosInicio')) ?>
              </li>
              <li>
                <?php echo $this->Html->link(__('recentes'), array('controller' => 'eventos', 'action' => 'recentesAll')) ?>
              </li>
              <li>
                <?php echo $this->Html->link(__('Todos'), array('controller' => 'eventos', 'action' => 'todosEventos')) ?>
              </li>
            </ul>
          </li>
          <?php if(!$logged_in): ?>
            <?php echo $this->Html->tag('li',$this->Html->link(__('Cadastre-se'), array('controller' => 'usuarios', 'action' => 'cadastro')));  ?>
            <?php echo $this->Html->tag('li', $this->Html->link(__('Entrar'), array('controller' => 'usuarios', 'action' => 'login', 'admin' => false))); ?>
            
          <?php else: ?>
            <li>
              <?php echo $this->Html->link(__('Painel de Controle'), array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('target' => '_blank')) ?>
            </li>
            

          <?php endif; ?>
    </ul>
  </div>
</header>