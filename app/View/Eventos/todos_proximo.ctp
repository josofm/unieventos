<table class="table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>data Inicio</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($eventos as $e):?>
		<tr>
			<td><?php echo $e['Evento']['nome'] ?></td>
			<td><?php echo $this->Locale->date($e['Evento']['data_ini']) ?></td>
			<td><?php echo $this->Html->link('Ver',array('controller' => 'eventos', 'action' => 'view', $e['Evento']['id'])) ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>