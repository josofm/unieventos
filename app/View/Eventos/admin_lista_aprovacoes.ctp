<?php if(empty($lista)){ ?>
    <div class="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Atenção!!</strong> Você não tem menssagem.
    </div>
<?php }else{ ?>
<div class="btn-group right">
    <button type="button" class="btn btn-default">Atualizar</button>
    <button type="button" class="btn btn-default">Escrever</button>
</div>
<table class="table table-hover">
    <?php foreach ($lista as $l): ?>
    <tr>
        <td>
            <?php echo $l['Evento']['nome']; ?>
        </td>
        <td>
            <?php echo $this->Html->link('Aprovar', array('controller' => 'eventos', 'action' => 'aprovacao', 'admin' => true, $l['Evento']['id'])) ?>
        </td>
        <?php //echo $this->element('sql_dump'); ?>
        
    </tr>
    <?php endforeach; }?>
    <?php unset($l); ?>
</table>


