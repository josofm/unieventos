
<?php 
  echo $this->Session->flash();
  echo $this->Session->flash('auth');

  echo $this->Form->create('Usuario', array('class' => 'form-inline'));
 ?>
  <div class="form-group">
    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => __('Endereço de email'), 'label' => false, 'autofocus'=>'autofocus')); ?>
  </div>
  <div class="form-group">
    <?php echo $this->Form->input('senha', array('class' => 'form-control', 'placeholder' => __('Senha'), 'type' => 'password','label' => false)); ?>
  </div>
  <?php echo $this->Form->button(__('Entrar'), array('controller' => 'usuarios', 'action' => 'login', 'admin' => true) ,array('class' => 'btn btn-default')); ?>
