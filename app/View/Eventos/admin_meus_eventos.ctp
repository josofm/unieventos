<h1 class="text-center">Meus Eventos</h1>
<?php if(empty($eventos)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não possui evento cadstrado.'); ?>
    </div>
<?php }else{ ?>
    <table class="table table-hover">
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
                    <?php echo $this->Html->link(__('Informações'), array('controller' => 'eventos','action' => 'informacoes', 'admin' => true, $evento['Evento']['id']), array('class' => 'btn btn-primary')); ?>
                    <?php echo $this->Html->link(__('Inscritos'), array('controller' => 'eventos','action' => 'inscritos', 'admin' => true, $evento['Evento']['id']), array('class' => 'btn btn-primary')); ?> 
                    <?php echo $this->Form->postLink('Deletar', array('action' => 'deletar', 'admin' => true, $evento['Evento']['id']),array('class' => 'btn btn-primary'),
                        array('confirm' => __('Você Deseja deletar o evento '.$evento['Evento']['nome']) )); ?>
                </td>
            </tr>
            <?php endforeach; }?>
            <?php unset($evento); ?>
        </tbody>
    </table>
