<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">
			<?php echo __('Configurações de Perfil'); ?>
		</h1>
		<hr style="border-top-color: #ccc;" />
		<?php echo $this->Form->create('Usuario'); ?>
		<div class="row">
			<div class="col-md-4">
				<a href="#" class="thumbnail">
			      <?php echo $this->Html->image('avatar/dafault.png'); ?>
			    </a>
			</div>
			<div class="col-md-8">
				<?php echo $this->Form->input('nome'); ?>
			</div>
		</div>
	</div>
</div>