<h1>Edit Post</h1>
<?php
echo $this->Form->create('Evento');
echo $this->Form->input('nome');
echo $this->Form->input('descricao');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>