
<div class="box span12">
	<div class="box-header well" data-original-title>
		<h2><i class="icon-th"></i> <?php echo $evento['Evento']['nome'] ?></h2>
		<div class="box-icon">
			<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
			<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
			<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
		</div>
	</div>
	<div class="box-content">
  	<div class="row-fluid">
  		<?php echo $this->Form->create('Presenca');  
        echo $this->Form->input('cadastros_evento_id', array('type' => 'hidden' , 'value' => $evento['Evento']['id'])); ?>
        <div class="span4">
        	<?php echo $this->Form->input('programacoes_id', array('type' => 'select','options' => $prog, 'data-rel'=>"chosen")); ?>
        </div>
        <div class="span4">
        	<?php echo $this->Form->input('cadastros_usuario_id', array('type' => 'select' , 'options' => $usuarios,'data-rel'=>"chosen")); ?>
        </div>
        <div class="span3"><?php echo $this->Form->end('Salvar'); ?></div>
    </div>                   
  </div>
</div>