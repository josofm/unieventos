<?php 
    echo $this->Form->create('Msg', array('class'=>'form-horizontal'));
?>
<div class="control-group">
	<div class="controls">
	<label><?php echo __('Destino') ?></label>
	<?php echo $this->Form->input('usuario_msg', array('type' => 'select','options' => $usuarios, 'id' => 'usuario', 'data-rel'=>"chosen", 'class'=>'input-xlarge datepicker', 'label' => false)); ?>
	</div>
</div>
<div class="control-group">
	<div class="controls">
	<label><?php echo __('Titulo') ?></label>
	<?php  echo $this->Form->input('titulo', array('label' => false, 'class'=>'input-xlarge datepicker'));?>
	</div>
</div>
<div class="control-group">
	<div class="controls">
	<label><?php echo __('Mensagem') ?></label>
	<?php echo $this->Form->input('texto' ,array('type' => 'textArea',  'class'=>'cleditor', 'id'=>'textarea2', 'rows'=>'3')); ?>
	</div>
</div>

<div class="form-actions">
  	<?php echo $this->Form->end('Enviar', array('class'=>"btn btn-primary")); ?>
</div>