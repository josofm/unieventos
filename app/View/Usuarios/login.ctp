<?php 
	echo $this->Session->flash();
	echo $this->Session->flash('auth');

	echo $this->Form->create('Usuario', array('class' => 'form-signin'));
	echo $this->Html->tag('h2',__('Por Favor efetue o login'), array('class' => 'form-signin-heading'));
	echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => __('Endereço de email'), 'label' => false, 'autofocus'=>'autofocus'));
	echo $this->Form->input('senha', array('class' => 'form-control', 'placeholder' => __('Senha'), 'type' => 'password','label' => false));
	echo $this->Html->link(__('Esqueceu sua senha?'), '#').'<br />';
	echo $this->Html->link(__('Cadastrar-se'), array('controller' => 'usuarios', 'action' => 'cadastro'));
	echo $this->Form->button(__('Entrar'), array('class' => 'btn btn-lg btn-primary btn-block'));
?>