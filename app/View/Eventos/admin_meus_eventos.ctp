<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
    </ul>
</div>
<h1 class="text-center">Meus Eventos</h1>
<?php if(empty($eventos)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não possui evento cadstrado.'); ?>
    </div>
<?php }else{ ?>
<div class="row-fluid sortable">     
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-book"></i> Eventos</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped  bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th><?php echo __('Nome'); ?></th>
                        <th><?php echo __('Descrição'); ?></th>
                        <th><?php echo __('Ações'); ?></th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($eventos as $evento): ?>
                    <tr>
                
                        <?php //echo $this->element('sql_dump'); ?>
                        
                        <td>
                            <?php echo $evento['Evento']['nome']; ?>
                        </td>
                        <td>
                            <?php echo $evento['Evento']['descricao']; ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link('<i class ="icon-info-sign icon-white"></i>'.__(' Ver'), array('controller' => 'eventos','action' => 'informacoes', 'admin' => true, $evento['Evento']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class ="icon-list-alt icon-white"></i>'.__(' Inscritos'), array('controller' => 'eventos','action' => 'inscritos', 'admin' => true, $evento['Evento']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?> 
                            <?php echo $this->Form->postLink('<i class ="icon-trash icon-white"></i>'.__(' Deletar'), array('action' => 'deletar', 'admin' => true, $evento['Evento']['id']),array('class' => 'btn btn-danger', 'escape' => false),
                                array('confirm' => __('Você Deseja deletar o evento '.$evento['Evento']['nome']) )); ?>
                        </td>
                    </tr>        
                    <?php endforeach; }?>
                    <?php unset($recado); ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>

   