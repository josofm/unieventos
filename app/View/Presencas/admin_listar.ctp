<?php var_dump($pres); ?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
    </ul>
</div>
<h1 class="text-center"><?php __('Lista de Presença') ?></h1>
<?php if(empty($pres)){ ?>
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?php echo __('Atenção!!') ?></strong> <?php echo __('No momento não possui presentes no evento.'); ?>
    </div>
<?php }else{ ?>
<div class="row-fluid sortable">     
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-book"></i> Eventos</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped  bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th><?php echo __('Nome'); ?></th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($pres as $p): ?>
                    <tr>
                
                        <?php //echo $this->element('sql_dump'); ?>
                        
                        <td>
                            <?php echo $p['user']['nome']; ?>
                        </td>
                    </tr>        
                    <?php endforeach; }?>
                    <?php unset($pres); ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>

