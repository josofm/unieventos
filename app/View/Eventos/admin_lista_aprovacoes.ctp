<?php if(AuthComponent::user('nivel') == 0){ ?>
      <h1 class="text-center" style="color: #ff0000;">Você não tem permição para acessar essa pagina!</h1>
<?php } else{?>
    <?php if(empty($lista)){ ?>
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Atenção!!</strong> Você não tem mais eventos para aprovar.
        </div>
    <?php }else{ ?>
    <h1 class="text-center"><?php echo __('Eventos a serem aprovados') ?></h1>
    <table class="table table-hover">
        <?php foreach ($lista as $l): ?>
        <tr>
            <td>
                <?php echo $l['Evento']['nome']; ?>
            </td>
            <td>
                <?php echo $this->Form->postLink('Aprovar', 
                    array(
                        'controller' => 'eventos',
                        'action' => 'aprovacao', 
                        'admin' => true, $l['Evento']['id']
                        ),  
                    array(
                        'confirm' => __('Você deseja realmente aprovar o evento "'. $l['Evento']['nome'].'"?')
                        )
                ) ?>
            </td>
            <?php //echo $this->element('sql_dump'); ?>
            
        </tr>
        <?php endforeach; }?>
        <?php unset($l); ?>
    </table>

<?php } ?>