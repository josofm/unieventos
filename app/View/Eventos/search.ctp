<?php 
echo $this->Search->create();
echo $this->Search->input('filter1');
echo $this->Search->end(__('Filtrar', true));

 ?>

<table> 
    <tr> 
        <th>Id</th> 
        <th>Title</th> 
                <th>Action</th> 
        <th>Created</th> 
    </tr> 



<?php foreach ($eventos as $post): ?> 
    <tr> 
        <td><?php echo $post['Evento']['id']; ?></td> 
        <td> 
            <?php echo $html->link($post['Evento']['nome']);?> 
                </td> 
                <td> 
            < 
            <?php echo $html->link('Edit', '/posts/edit/'.$post['Post']['id']);?> 
        </td> 
        <td><?php echo $post['Evento']['created']; ?></td> 
    </tr> 
<?php endforeach; ?> 
</table> 