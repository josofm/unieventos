
<?php  
  echo $this->Form->create('Usuario', array('type' => 'file','class' => 'form-horizontal', 'novalidate' )); ?>
    <fieldset>
        
      <legend><?php echo __('Cadastre-se para participe dos eventos') ?></legend>  
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Nome'); ?></label>  
        <div class="controls"> 
        	<?php echo $this->Form->input('nome', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => 'Nome completo ')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Sobrenome'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('sobrenome', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => 'sobrenome')); ?> 
        </div>  
      </div>   
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('CPF'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('cpf', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('RG'); ?></label>  
        <div class="controls"> 
        	<?php echo $this->Form->input('rg', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group ">  
        <label class="control-label" for="input01"><?php echo __('Sexo'); ?></label>  
        <div class="controls radio"> 
          <?php echo $this->Form->select('sexo',array('0' => __('Feminino'), '1' => __('Masculino'))); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Data de Nascimento'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('data_nasc', array('dateFormat' => 'DMY','separator' => '/', 'label' => false, 'style' => 'width: inherit;')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Email') ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('email', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Senha'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('senha', array('type' => 'password','class' => 'input-xlarge', 'label' => false, 'value'=>'')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Confirmar Senha'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('senha_confirm', array('class' => 'input-xlarge', 'label' => false, 'value'=>'', 'type'=>'password')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Instituição de ensino') ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('instituicao', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Rede Social'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('end_rede_soc', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Outro contato'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('outro_contato_url', array('class' => 'input-xlarge', 'label' => false)); ?> 
        </div>  
      </div>
      <!--relacionado com outra tabela -->
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Estado'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('estado_id', array('class' => 'input-xlarge','options' => $estados, 'label' => false, 'type' => 'select', 'id' => 'estados', 'empty' => 'Selecione um estado...')); ?> 
        </div> 

      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Cidade') ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('cidade_id', array('class' => 'input-xlarge', 'label' => false, 'id' =>'cidades', 'empty' => 'Selecione uma cidade...')); ?> 
        </div>  
      </div>      
      </fieldset>  
      <div class="form-actions">     
            <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
      </div>  