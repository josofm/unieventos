<?php 
            	//echo $this->element('sql_dump'); 
            	//echo  print_r($dados);
            	//exit();
            ?>

    <?php if(empty($dados)){ ?>
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Atenção!!</strong> Você não tem 0 inscritos.
        </div>

    <?php }else{ ?>
    <h1 class="text-center"><?php echo __('Eventos ') ?></h1>
    <table class="table table-hover">
    	<thead>
	    	<tr>
	    		<th>Nome</th>
	    		<th>Instituição</th>
	    		<th>Status</th>
	    		<th>Ações</th>
	    	</tr>
    	</thead>
    	
        <?php foreach ($dados as $l): ?>
        	<?php
        		$status = 'Pago';
        		$css=''; 
        		if($l['pag']['status'] == 0){
        			$css = "style = color:red;";
        			$status = 'Não Pago';
        		}
                $options =  $l['user']['id'].'-'.$l['Cadastro']['evento_id'].'-'.$l['pag']['id'];

        	?>
        <tr>
            <td <?php echo $css; ?>>
                <?php echo $l['user']['nome']; ?>
            </td>
            <td <?php echo $css; ?>>
                <?php echo $l['user']['instituicao']; ?>
            </td>
            <td <?php echo $css; ?>>
                <?php echo $status; ?>
            </td>
            <td <?php echo $css; ?>>
            	<?php echo $this->Html->link('Validar pagamento', array('controller' => 'pagamentos', 'action' => 'validarPagamento', 'admin' => true,$options)) ?>
            </td>
            
        </tr>
        <?php endforeach; }?>
        <?php unset($l); ?>
    </table>