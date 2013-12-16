<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">
			<?php echo __('Configurações de Perfil'); ?>
		</h1>
		<hr style="border-top-color: #ccc;" />
		<?php echo $this->Form->create('Usuario'); ?>
		<div class="row">
			<div class="col-md-4">
				<a href="#" class="thumbnail">
			      <?php 
              echo $this->Html->image('avatar/dafault.png'); 
            
            ?>
			    </a>
			</div>
			<div class="col-md-8">
                               <form role="form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <?php echo $this->Form->input('nome', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Nome completo ')); ?>
            </div>
            <div class="form-group">
              <label for="sobrenome">Sobrenome</label>
              <?php echo $this->Form->input('sobrenome', array('class' => 'form-control', 'label' => false, 'placeholder' => 'sobrenome')); ?> 
            </div>
            <div class="form-group">
              <label for="cpf">CPF</label>
              <?php echo $this->Form->input('cpf', array('class' => 'form-control', 'label' => false)); ?> 
            </div>
            
           <div class="form-group">
              <label for="rg">RG</label>
              <?php echo $this->Form->input('rg', array('class' => 'form-control', 'label' => false)); ?> 
            </div>
           
           <div class="form-group">
              <label for="sexo">Sexo</label>
              <?php echo $this->Form->select('sexo',array('0' => __('Feminino'), '1' => __('Masculino'))); ?>
            </div>
             
            <div class="form-group">
              <label for="data_nasc">Data de Nascimento</label>
               <?php echo $this->Form->input('data_nasc', array('dateFormat' => 'DMY','separator' => '/', 'label' => false, 'style' => 'width: inherit;')); ?> 
            </div>
                                   
          <div class="form-group">
              <label for="email">Email</label>
               <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false)); ?> 
         </div>
                                   
         <div class="form-group">
              <label for="senha">Password</label>
               <?php echo $this->Form->input('senha', array('type' => 'password','class' => 'form-control', 'label' => false, 'value'=>'')); ?> 
         </div>
         <div class="form-group">
              <label for="senha_confirm">Confirmar senha</label>
               <?php echo $this->Form->input('senha_confirm', array('class' => 'form-control', 'label' => false, 'value'=>'', 'type'=>'password')); ?> 
         </div>
        <div class="form-group">
              <label for="instituicao">Instituição de Ensino</label>
               <?php echo $this->Form->input('instituicao', array('class' => 'form-control', 'label' => false)); ?> 
         </div>
         <div class="form-group">
              <label for="end_rede_soc">Rede Social</label>
               <?php echo $this->Form->input('end_rede_soc', array('class' => 'form-control', 'label' => false)); ?> 
         </div>
         
         <div class="form-group">
              <label for="estado_id">Estado</label>
               <?php echo $this->Form->input('cidade_id', array('class' => 'form-control', 'label' => false, 'id' =>'cidades', 'empty' => 'Selecione uma cidade...')); ?> 
         </div>
            </div>
                    <div class="btn btn-default">     
			 <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
      </div>  
            
</form>
                            
			</div>
		</div>
	</div>
</div>