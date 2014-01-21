<?php echo $this->Form->create('Inscricao') ?>
 

<legend> <?php echo __('Complete Dados da Inscrição')?> </legend>		
<fieldset>
        <div class="control-group">  
            <label class="control-label" for="input01"><?php echo __('Data de Início'); ?></label>  
            <div class="controls"> 
                <?php echo $this->Form->input('data_ini', array('dateFormat' => 'DMY','separator' => '/', 'label' => false, 'style' => 'width: inherit;')); ?> 
            </div>  
        </div>    
    <br/>
        <div class="control-group">  
            <label class="control-label" for="input01"><?php echo __('Data de Término'); ?></label>  
            <div class="controls"> 
                <?php echo $this->Form->input('data_fim', array('dateFormat' => 'DMY','separator' => '/', 'label' => false, 'style' => 'width: inherit;')); ?> 
            </div>  
        </div>
    <br/>   

        <div class="control-group">  
                <label class="control-label" for="input01"><?php echo __('Tipo de Inscrição'); ?></label>  
            <div class="controls">
                <?php echo $this->Form->select('paga',array('0'=> 'Gratuita', '1' => 'Paga')) ?> 
            </div>  
        </div>
     <br/>   
        <div class="control-group">  
            <label class="control-label" for="input01"><?php echo __('Valor'); ?></label>  
            <div class="controls">
                <div class="input-prepend input-append">
                    <span class="add-on">R$</span><?php echo $this->Form->input('valor', array('class' => 'input-xlarge', 'label' => false, 'div' => false, 'placeholder' => ' ')); ?> 
                </div>
            </div>  
        </div>
     <br/>
</fieldset>
        <div class="form-actions">     
            <?php  echo $this->Form->end(__('Salvar'), array('class' => 'btn btn-primary')); ?>
        </div>