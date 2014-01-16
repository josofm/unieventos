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
              <label for="instituicao">Instituição de Ensino</label>
               <?php echo $this->Form->input('instituicao', array('class' => 'form-control', 'label' => false)); ?> 
         </div>
         <div class="form-group">
              <label for="end_rede_soc">Rede Social</label>
               <?php echo $this->Form->input('end_rede_soc', array('class' => 'form-control', 'label' => false)); ?> 
         </div>
        </div>
                    <div class="btn btn-default">     
			 <?php  echo $this->Form->end(__('Cadastrar'), array('class' => 'btn btn-primary')); ?>
      </div>  
                            
			</div>
		</div>
	</div>
</div>