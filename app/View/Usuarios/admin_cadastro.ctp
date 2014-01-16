<?php if(AuthComponent::user('nivel') == 0){ ?>
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h1>Você não tem permição para acessar essa pagina!</h1>
  </div>

<?php } else{?>
<div class="breadcrumbs" id="breadcrumbs">
</div>
<div class="page-content">
  <div class="page-header">
    <h1>
      <?php echo __('Cadastro de novos usuarios'); ?>
    </h1>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <?php  
  echo $this->Form->create('Usuario', array('class' => 'form-horizontal', 'novalidate' )); ?>
    <fieldset>
      <div class="form-group">  
        <label  for="nome"><?php echo __('Nome'); ?></label>  
          <?php echo $this->Form->input('nome', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Nome completo ')); ?>  
      </div>
      <div class="form-group">  
        <label for="sobrenome"><?php echo __('Sobrenome'); ?></label>  
          <?php echo $this->Form->input('sobrenome', array('class' => 'form-control', 'label' => false, 'placeholder' => 'sobrenome')); ?> 
      </div>   
      <div class="form-group">  
        <label for="cpf" ><?php echo __('CPF'); ?></label>   
          <?php echo $this->Form->input('cpf', array('class' => 'form-control', 'label' => false)); ?>    
      </div>
      <div class="form-group">  
        <label for="rg"><?php echo __('RG'); ?></label>  
          <?php echo $this->Form->input('rg', array('class' => 'form-control', 'label' => false)); ?> 
        </div>  
      </div>
      <div class="form-group ">  
        <label for="sexo"><?php echo __('Sexo'); ?></label>  
        <div></div>
          <?php echo $this->Form->select('sexo', array('0' => __('Feminino'), '1' => __('Masculino')) ,array('legend' => false, 'after' => '--after--', 'between' => '--between---','separator' => '<br />')); ?>   
      </div>
      <div class="form-group">  
        <label for="data_nasc"><?php echo __('Data de Nascimento'); ?></label>   
          <?php echo $this->Form->input('data_nasc', array('id' => 'form-field-4','class' => 'col-xs-10 col-sm-5','dateFormat' => 'DMY', 'label' => false, 'style' => 'width: inherit;')); ?>   
      </div>
      <div class="form-group">  
        <label  for="email"><?php echo __('Email') ?></label>       
          <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false)); ?> 
      </div>
      <div class="form-group">  
        <label for="intituicao"><?php echo __('Instituição de ensino') ?></label>  
          <?php echo $this->Form->input('instituicao', array('class' => 'form-control', 'label' => false)); ?> 
      </div>
      <div class="form-group">  
        <label  for="end_rede_soc"><?php echo __('Rede Social'); ?></label>  
          <?php echo $this->Form->input('end_rede_soc', array('class' => 'form-control', 'label' => false)); ?>  
      </div>
      <div class="form-group">  
        <label for="outro_contato_url"><?php echo __('Outro contato'); ?></label>  
          <?php echo $this->Form->input('outro_contato_url', array('class' => 'form-control', 'label' => false)); ?>    
      </div>
      <!--relacionado com outra tabela -->
      <div class="form-group">  
        <label for="estado_id"><?php echo __('Estado'); ?></label>  
          <?php echo $this->Form->input('estado_id', array('class' => 'form-control', 'label' => false, 'id' =>'estado', 'empty' => 'Selecione um estado...')); ?> 
      </div>
      <div class="form-group">  
        <label for="cidade"><?php echo __('Cidade') ?></label>   
          <?php echo $this->Form->input('cidade_id', array('class' => 'form-control', 'label' => false, 'id' =>'cidade', 'empty' => 'Selecione uma cidade...')); ?> 
      </div>

      </fieldset>  
      <div class="form-group">     
       <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
<?php } ?>