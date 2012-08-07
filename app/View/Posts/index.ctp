<table>
<tr>
<th>Title</th>
<th>Created</th>
<th>Modified</th>
<th>Actions</th>
</tr>

<?php foreach ($posts as $post):?>
<tr>
<td><?php echo $post['Post']['title'];?></td>
<td><?php echo $post['Post']['created'];?></td>
<td><?php echo $post['Post']['modified'];?></td>
<td><?php echo $this->html->link('View',array('action'=>'view',$post['Post']['id']));?>
<?php echo " ";

echo $this->html->link('Edit',array('action'=>'edit',$post['Post']['id']));
echo " ";
echo $this->form->postlink('Delete',array('action'=>'delete',$post['Post']['id']),
array('confirm'=>'Are you sure to delete'));

?>
</td>
</tr>
<?php endforeach;?>

</table>