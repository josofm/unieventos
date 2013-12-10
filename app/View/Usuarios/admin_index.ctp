<?php if(AuthComponent::user('nivel') == 0){ ?>
    <div class="alert alert-danger">
        <h1 class="text-center" style="color: #ff0000;">Você não tem permição para acessar essa pagina!</h1>
    </div>
<?php } else { ?>
<div class="text-right">
    <?php echo $this->Html->link('<i class="fa fa-user"></i> ' . __('Cadastrar'), array('controller' => 'usuarios', 'action' => 'cadastro', 'admin' => true),  array('escape' => false, 'class' => 'btn btn-primary btn-lg active')) ?>
</div>
<?php if(empty($usuarios)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não existe nenhum usuario cadstrado.'); ?>
    </div>
<?php }else{ ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th><?php echo __('Nome'); ?></th>
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('Instituição'); ?></th>
                <th><?php echo __('Ações'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                
                <?php //echo $this->element('sql_dump'); ?>
                
                <td>
                    <?php echo $usuario['Usuario']['nome']; ?>
                </td>
                <td>
                    <?php echo $usuario['Usuario']['email']; ?>
                </td>
                <td>
                    <?php echo $usuario['Usuario']['instituicao']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Ver', array('action' => 'verPerfil', 'admin' => true, $usuario['Usuario']['id'])); ?> |
                    <?php echo $this->Form->postLink('Deletar', array('action' => 'deletar', 'admin' => true, $usuario['Usuario']['id']),
                        array('confirm' => __('Você Deseja deletar o Usuario '.$usuario['Usuario']['nome']) )); ?>
                </td>
            </tr>
            <?php endforeach; }?>
            <?php unset($recado); ?>
        </tbody>
    </table>
<?php } ?>

