    <?php if(empty($lista)){ ?>
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Atenção!!</strong> Você não tem mais eventos para aprovar.
        </div>
    <?php }else{ ?>
    <h1 class="text-center"><?php echo __('Eventos ') ?></h1>
    <table class="table table-hover">
        <?php foreach ($lista as $l): ?>
        <tr>
            <td>
                <?php echo $l['Evento']['nome']; ?>
            </td>
            <td>
                <?php echo $l['Evento']['descricao']; ?>
            </td>
            <td>
                <?php echo $l['Evento']['tipo_evento']; ?>
            </td>
            <td>
                <?php echo $this->Html->link('Ver Mais', array('action' => 'verMais', 'admin' => false, $l['Evento']['id']), array('target' => '_blank', 'class' => 'btn btn-primary')); ?>
            </td>
            <?php //echo $this->element('sql_dump'); ?>
            
        </tr>
        <?php endforeach; }?>
        <?php unset($l); ?>
    </table>