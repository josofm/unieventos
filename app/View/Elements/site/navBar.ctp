 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="http://localhost/unieventos/">Home</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <!--<li><a href="#">Sobre</a></li>
          <li><a id="swatch-link" href="../#gallery">Gallery</a></li>
          <li><a href="#">Preview </a>
          </li>-->
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
            </ul>
          <?php else: ?>
            <li>
              <?php echo $this->Html->link(__('Painel de Controle'), array('controller' => 'pages', 'action' => 'index', 'admin' => true), array('target' => '_blank')) ?>
            </li>
            </ul>
              <p class="brand" style="float:right;">
                <?php echo __('Seja bem vindo, '). $current_user['nome']. $this->Html->link(__(' Sair'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?>
              </p> 

          <?php endif; ?>
        
       </div>
     </div>
   </div>
 </div>