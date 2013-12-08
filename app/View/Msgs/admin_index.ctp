<?php if(empty($msgs)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Atenção!!</strong> Você não tem menssagem.
    </div>
<?php }else{ ?>
<div class="btn-group right">
    <button type="button" class="btn btn-default">Atualizar</button>
    <button type="button" class="btn btn-default">Escrever</button>
</div>
<table class="table table-hover">
    <?php foreach ($msgs as $recado): ?>
    <tr>
        
        <?php //echo $this->element('sql_dump'); ?>
        
        <td>
            <?php echo $recado['Msg']['status']? $recado['Usuario']['nome']:'<b>'.$recado['Usuario']['nome'].'</b>'; ?>
        </td>
        <td>
            <?php echo $this->Html->link($recado['Msg']['titulo'], array('controller' => 'msgs', 'action' => 'visualizar',$recado['Msg']['id'])); ?>
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
</table>


