<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
	$(function () {
	function removeCampo() {
		$(".removerCampo").unbind("click");
		$(".removerCampo").bind("click", function () {
			i=0;
			$(".teste").each(function () {
				i++;
			});
			if (i>1) {
				$(this).parent().remove();
			}
		});
	}
	removeCampo();
	$(".adicionarCampo").click(function () {
		novoCampo = $(".teste:first").clone();
		novoCampo.find("input").val("");
		novoCampo.insertAfter(".teste:last");
		removeCampo();
	});
});
</script>

<div class="teste">
	<?php 
	echo $this->Form->create('Programacao');
	echo $this->Form->input('Progremacao.0.titulo');
	echo $this->Form->input('Progremacao.0.palestrante');
	echo $this->Form->input('Progremacao.0.descricao');

?>
<?php echo $this->Form->button('Remover programação', array('class' => 'removerCampo')); ?>
<hr />
</div>
<div class="teste">
	<?php 
	echo $this->Form->create('Programacao');
	echo $this->Form->input('Progremacao.1.titulo');
	echo $this->Form->input('Progremacao.1.palestrante');
	echo $this->Form->input('Progremacao.1.descricao');

?>
<?php echo $this->Form->button('Remover programação', array('class' => 'removerCampo')); ?>
<hr />
</div>

<?php 	
	echo $this->Form->end('salvar'); 
	echo $this->Form->button('Nova programação', array('class' => 'adicionarCampo'));
?>				