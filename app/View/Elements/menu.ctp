<div class="header-bar">
    <ul class="clearfix">
    <li><a href="#">About</a></li>
    <li><a href="#">Shortcodes </a></li>
    <li><a href="#">Features </a></li>
    <li><a href="#">Pages</a></li>
    <li><a href="#">Archive</a></li>
    <?php echo $this->Html->tag('li', $this->Html->link(__('cadastre-se'), array('controller' => 'usuarios', 'action' => 'cadastro'))); ?>
    <?php echo $this->Html->tag('li', $this->Html->link(__('Entrar'), array('controller' => 'usuarios', 'action' => 'login'))); ?>
    </ul>
</div>