<?php 
	echo $this->Form->create('Evento');
        echo $this->Form->input('Usuario.id', array('type' => 'hidden' , 'value' => AuthComponent::user('id'))); ?>
                	
        <fieldset>
            <legend> <?php echo __('Cadastre seu Evento') ?> </legend>
            <form role="form">
            <div class="form-group">  
                <label class="control-label"><?php echo __('Nome do Evento'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('nome', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo __('Descrição do Evento'); ?></label>
                  
            <div class="controls">
               <?php echo $this->Form->input('descricao', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?>
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Data de Início'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('data_ini', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Data de Término'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('data_fim', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Tipo de Evento'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('tipo_evento', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Tema do Evento'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('tema', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Número de Vagas'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('vagas', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('Duração em Horas'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('duracao_horas', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => ' ')); ?> 
            </div>  
            </div>
            <div class="form-group">  
                <label class="control-label" for="input01"><?php echo __('URL'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->input('url', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => 'caso tenha página externa')); ?> 
            </div>  
            </div>           
            </form>
        </fieldset>

        <div class="form-actions">     
            <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
        </div>
