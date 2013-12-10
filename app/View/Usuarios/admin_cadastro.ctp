<?php if(AuthComponent::user('nivel') == 0){ ?>
    <h1>Voce não tem permição de acessar essa pagina</h1>
<?php } else{?>
<div class="breadcrumbs" id="breadcrumbs">
</div>
<div class="page-content">
  <div class="page-header">
    <h1>
      <?php echo __('Cadastro de novos usuarios'); ?>
      <small>
        <i class="icon-double-angle-right"></i>
        overview &amp; stats
      </small>
    </h1>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <?php  
  echo $this->Form->create('Usuario', array('class' => 'form-horizontal', 'novalidate' )); ?>
    <fieldset>  
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><?php echo __('Nome'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('nome', array('id' => 'form-field-1','class' => 'col-xs-10 col-sm-5', 'label' => false, 'placeholder' => 'Nome completo ')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="control-label" for="input01"><?php echo __('Sobrenome'); ?></label>  
        <div class="controls"> 
          <?php echo $this->Form->input('sobrenome', array('class' => 'input-xlarge', 'label' => false, 'placeholder' => 'sobrenome')); ?> 
        </div>  
      </div>   
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo __('CPF'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('cpf', array('id' => 'form-field-2','class' => 'col-xs-10 col-sm-5', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo __('RG'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('rg', array('id' => 'form-field-3','class' => 'col-xs-10 col-sm-5', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group ">  
        <label class="col-sm-3 control-label no-padding-right" for="input01"><?php echo __('Sexo'); ?></label>  
        <div class="col-sm-9 radio"> 
          <?php echo $this->Form->radio('sexo', array('0' => __('Feminino'), '1' => __('Masculino')) ,array('legend' => false, 'after' => '--after--', 'between' => '--between---','separator' => '<br />')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"><?php echo __('Data de Nascimento'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('data_nasc', array('id' => 'form-field-4','class' => 'col-xs-10 col-sm-5','dateFormat' => 'DMY', 'label' => false, 'style' => 'width: inherit;')); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"><?php echo __('Email') ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('email', array('id' => 'form-field-5','class' => 'col-xs-10 col-sm-5', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-6"><?php echo __('Instituição de ensino') ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('instituicao', array('id' => 'form-field-6','class' => 'col-xs-10 col-sm-5', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-7"><?php echo __('Rede Social'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('end_rede_soc', array('id' => 'form-field-7','class' => 'col-xs-10 col-sm-5', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-8"><?php echo __('Outro contato'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('outro_contato_url', array('id' => 'form-field-8','class' => 'col-xs-10 col-sm-5 input-mask-date', 'label' => false)); ?> 
        </div>  
      </div>
      <!--relacionado com outra tabela -->
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-9"><?php echo __('Estado'); ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('estado_id', array('id' => 'form-field-9','class' => 'col-xs-10 col-sm-5','options' => $estados, 'label' => false, 'type' => 'select', 'id' => 'estados', 'empty' => 'Selecione um estado...')); ?> 
        </div> 

      </div>
      <div class="control-group">  
        <label class="col-sm-3 control-label no-padding-right" for="form-field-10"><?php echo __('Cidade') ?></label>  
        <div class="col-sm-9"> 
          <?php echo $this->Form->input('cidade_id', array('id' => 'form-field-10','class' => 'col-xs-10 col-sm-5', 'label' => false, 'id' =>'cidades', 'empty' => 'Selecione uma cidade...')); ?> 
        </div>  
      </div>

      </fieldset>  
      <div class="form-actions">     
       <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
<?php } ?>