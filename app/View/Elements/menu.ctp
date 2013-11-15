<div class="header-bar">
    <ul class="clearfix">
    <li><a href="#">About</a></li>
    <li><a href="#">Shortcodes </a></li>
    <li><a href="#">Features </a></li>
    <li><a href="#">Pages</a></li>
    <li><a href="#">Archive</a></li>
    <?php echo $this->Html->tag('li', $this->Html->link('cadastre-se', array('controller' => 'usuarios', 'action' => 'cadastro'))) ?>
    <li><a href="#">Contact</a></li>
    </ul>
</div>