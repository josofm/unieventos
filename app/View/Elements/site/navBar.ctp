 <?php if($logged_in){ ?>
 <div class="text-right">
 <h3>
                <?php echo __('Seja bem vindo, '). $current_user['nome'].'.'. $this->Html->link(__(' Sair'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?>
              </h3> 
 </div>
 <?php } ?>