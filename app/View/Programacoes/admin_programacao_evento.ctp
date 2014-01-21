<?php 
	echo $this->Form->create('Programacao');
	
?>

<div class="control-group">  
    <label class="control-label"><?php echo __('Titulo'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('titulo', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Palestrante'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('palestrante', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Descrição'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('descricao', array('type' => 'textArea','rows' => 5 ,'class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Local'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('local', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Sala'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('sala', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Dia'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->text('data', array('class' => 'input-xlarge datepicker', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>

<div class="control-group">  
    <label class="control-label"><?php echo __('Hora Inicial'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('hora_ini', array('type' => 'time','class' => 'input-small', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="control-group">  
    <label class="control-label"><?php echo __('Hora Final'); ?></label>  
    <div class="controls">
        <?php echo $this->Form->input('hora_fim', array('type' => 'time','class' => 'input-small', 'label' => false, 'placeholder' => ' ')); ?> 
    </div>  
</div>
<div class="form-actions">
	<?php echo $this->Form->end('salvar');  ?>
</div>								