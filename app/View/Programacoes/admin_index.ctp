<div class="text-right">
    <?php echo $this->Html->link('<i class="fa fa-user"></i> ' . __('Cadastrar Programação'), array('controller' => 'programacoes','action' => 'programacaoEvento', 'admin' => true, $ide),  array('escape' => false, 'class' => 'btn btn-primary btn-lg active')) ?>
</div>
<?php if(empty($prog)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não existe nenhuma programação cadastrada.'); ?>
    </div>
<?php }else{ ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th><?php echo __('Nome'); ?></th>
                <th><?php echo __('Descrição'); ?></th>
                <th><?php echo __('Palestrante'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prog as $p): ?>
            <tr >
                
                <?php //echo $this->element('sql_dump'); ?>
                
                <td>
                    <?php echo $p['Programacao']['titulo']; ?>
                </td>
                <td>
                    <?php echo $p['Programacao']['descricao']; ?>
                </td>
                <td>
                    <?php echo $p['Programacao']['palestrante']; ?>
                </td>
                
            </tr>
            <?php endforeach; }?>
            <?php unset($p); ?>
        </tbody>
    </table>
