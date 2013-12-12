<?php if(AuthComponent::user('nivel') == 0){ ?>
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h1>Você não tem permição para acessar essa pagina!</h1>
  </div>
<?php } else { ?>
<div class="text-right">
    <?php echo $this->Html->link('<i class="fa fa-user"></i> ' . __('Cadastrar Evento'), array('controller' => 'eventos', 'action' => 'cadastro', 'admin' => true),  array('escape' => false, 'class' => 'btn btn-primary btn-lg active')) ?>
</div>
<?php if(empty($eventos)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não existe nenhum evento cadstrado.'); ?>
    </div>
<?php }else{ ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th><?php echo __('Nome'); ?></th>
                <th><?php echo __('Descrição'); ?></th>
                <th><?php echo __('Situação'); ?></th>
                <th><?php echo __('Ações'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
            <tr <?php echo $evento['Evento']['aprovacao']? '':'style= "color: #ff0000;"'; ?>>
                
                <?php //echo $this->element('sql_dump'); ?>
                
                <td>
                    <?php echo $evento['Evento']['nome']; ?>
                </td>
                <td>
                    <?php echo $evento['Evento']['descricao']; ?>
                </td>
                <td>
                    <?php echo $evento['Evento']['aprovacao']? __('Aprovado'): 'Esperando Aprovação'; ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Ver', array('action' => 'verPerfil', 'admin' => true, $evento['Evento']['id'])); ?> |
                    <?php echo $this->Form->postLink('Deletar', array('action' => 'deletar', 'admin' => true, $evento['Evento']['id']),
                        array('confirm' => __('Você Deseja deletar o evento '.$evento['Evento']['nome']) )); ?>
                </td>
            </tr>
            <?php endforeach; }?>
            <?php unset($evento); ?>
        </tbody>
    </table>
<?php } ?>

