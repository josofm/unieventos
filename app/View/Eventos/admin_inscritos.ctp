<?php 
            	echo $this->element('sql_dump'); 
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
        <tr>
            <td>
                <?php echo $l['user']['nome']; ?>
            </td>
            <td>
                <?php echo $l['user']['instituicao']; ?>
            </td>
            <td>
                <?php echo $l['pag']['status']? '0':'1'; ?>
            </td>
            <td></td>
            
        </tr>
        <?php endforeach; }?>
        <?php unset($l); ?>
    </table>