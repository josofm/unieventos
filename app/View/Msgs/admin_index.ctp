<div class="btn-group right">
    <?php echo $this->Form->button($this->Html->link('<i class="fa fa-refresh fa-2x"></i>',array('action' => 'index', 'admin' => true), array('escape' => false)), array('class' => 'btn btn-default' )) ?>
    <?php echo $this->Html->link('Escrever', array('controller' => 'msgs', 'action' => 'enviar', 'admin' => true), array('class'=>'btn btn-primary btn-lg active', 'role'=>'button')) ?>
</div>

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
<?php echo $this->Form->button($this->Html->link('<i class=" icon-refresh"></i>',array('action' => 'index', 'admin' => true), array('escape' => false)), array('class' => 'btn btn-large btn-round' )) ?>
                <?php echo $this->Form->button($this->Html->link('<i class=" icon-pencil"></i>'.__('Escrever'), array('controller' => 'msgs', 'action' => 'enviar', 'admin' => true), array('escape' => false)),array('class'=>'btn btn-large btn-primary btn-round') )?>
<div class="row-fluid sortable">     
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-envelope"></i> Mensagens</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php if(empty($msgs)){ ?>
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Atenção!!</strong> Você não tem menssagem.
                        </div>
                    <?php }else{ ?> 
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th><?php echo __('Nome'); ?></th>
                        <th><?php echo __('Mensagem'); ?></th>
                        <th><?php echo __('Data'); ?></th>
                        <th><?php echo __('Ações'); ?></th>
                    </tr>
                </thead>   
                <tbody>
                    
                        <?php foreach ($msgs as $recado): ?>
                            <tr>
                                <?php //echo $this->element('sql_dump'); ?>
                                
                                <td>
                                    <?php echo $recado['Msg']['status']? $recado['Usuario']['nome']:'<b>'.$recado['Usuario']['nome'].'</b>'; ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($recado['Msg']['titulo'], array('controller' => 'msgs', 'action' => 'visualizar', 'escape' => false,$recado['Msg']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Text->truncate($recado['Msg']['texto'],50,array('ellipsis' => '...', 'exact' => false)); ?>
                                </td>
                                <td>
                                    <?php echo $this->Time->format('d/m/Y',$recado['Msg']['modified']); ?>
                                </td>
                            </tr>
                <?php endforeach; }?>
                <?php unset($recado); ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>