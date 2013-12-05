<?php if(empty($msgs)){ ?>
    <div class="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Atenção!!</strong> Você não tem menssagem.
    </div>
<?php }else{ ?>
<table>
    <tr>
        <th>De</th>
        <th>Titulo</th>
        <th>Texto</th>
    </tr>
    <?php foreach ($msgs as $recado): ?>
    <tr>
        
        <?php //echo $this->element('sql_dump'); ?>
        
        <td>
            <?php echo $recado['Msg']['status']? $recado['Usuario']['nome']:'<b>'.$recado['Usuario']['nome'].'</b>'; ?>
        </td>
        <td><?php echo $this->Html->link($recado['Msg']['titulo'], array('controller' => 'msgs', 'action' => 'visualizar',$recado['Msg']['id'])); ?></td>
        <td>
            <?php echo $this->Text->truncate($recado['Msg']['texto'],22,array('ellipsis' => '...', 'exact' => false)); ?>
        </td>
        <?php echo '</b>'; ?>
    </tr>
    <?php endforeach; }?>
    <?php unset($recado); ?>
</table>


