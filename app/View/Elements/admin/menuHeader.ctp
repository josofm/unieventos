<ul class="nav navbar-nav navbar-right navbar-user">
  <li class="dropdown messages-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-envelope"></i> <?php echo __('Menssagens') ?>
      <?php 
      $val = $this->requestAction(array('controller' => 'msgs', 'action' => 'conta', 'admin' => true));
      if($val > 0)
        echo '<span class="badge">'.$val.'</span>';  
      ?> 
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li class="dropdown-header">
        <?php 
          if($val == 0){
            echo __('Nenhuma Menssagem');
          }elseif ($val == 1) {
            echo __($val.' Nova Menssagem');
          }else{
            echo __($val.' Novas Menssagens'); 
          }?>
      </li>
      <?php  
        $msgs = $this->requestAction(array('controller' => 'msgs', 'action' => 'naoLidas', 'admin' => true));
        foreach ($msgs as $recado):
      ?>
      <li class="message-preview">
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/50x50"></span>
          <span class="name"><?php echo  $recado['Usuario']['nome'] ?></span>
          <span class="message"><?php echo  $recado['Msg']['texto'] ?></span>
          <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
        </a>
      </li>
      <li class="divider"></li>
    <?php endforeach; ?>

      <li class="text-right">
        <?php echo $this->Html->link(__('Caixa de Entrada'), array('controller'=>'msgs', 'action' => 'index', 'admin' => true)) ?>
      </li>
    </ul>
  </li>
  <li class="dropdown alerts-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="#">Default <span class="label label-default">Default</span></a></li>
      <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
      <li><a href="#">Success <span class="label label-success">Success</span></a></li>
      <li><a href="#">Info <span class="label label-info">Info</span></a></li>
      <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
      <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
      <li class="divider"></li>
      <li><a href="#">View All</a></li>
    </ul>
  </li>
  <li class="dropdown user-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo AuthComponent::user('nome') ?> <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li>
        <?php echo $this->html->link('<i class="fa fa-user"></i> '.__('Perfil'), array('controller' => 'usuarios', 'action' => 'perfil', 'admin' => true, AuthComponent::user('id')), array('escape' => false)) ?>
      </li>
      <li>
        <?php echo $this->html->link('<i class="fa fa-envelope"></i> '.__('Caixa de entrada'), array('controller' => 'msgs', 'action' => 'index', 'admin' => true), array('escape' => false)) ?>
      </li>
      <li><a href="#"><i class="fa fa-gear"></i> <?php echo __('Configurações'); ?></a></li>
      <li class="divider"></li>
      <li>
        <?php echo $this->html->link('<i class="fa fa-power-off"></i> '.__('Sair'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false), array('escape' => false)) ?>
      </li>
    </ul>
  </li>
</ul>