<table>
<tr>
<th>Title</th>
<th>Created</th>
<th>Modified</th>
<th>Actions</th>
</tr>

<?php foreach ($posts as $post):?>
<tr>
<td><?php echo $this->html->link($post['Post']['title'],array('action'=>'view',$post['Post']['id']));?></td>
<td><?php echo $this->time->niceShort($post['Post']['created']);?></td>
<td><?php echo $this->time->niceShort($post['Post']['modified']);?></td>
<td>
<?php
echo $this->html->link('Edit',array('action'=>'edit',$post['Post']['id']));
echo " ";
echo $this->form->postlink('Delete',array('action'=>'delete',$post['Post']['id']),
array('confirm'=>'Are you sure to delete'));

?>
</td>
</tr>
<?php endforeach;?>

</table>
<?php  
    echo $this->paginator->first('First') . '  ';  
    echo $this->paginator->prev('Previous'). '  ';  
    echo $this->paginator->numbers(). '  ';  
    echo $this->paginator->next('Next'). '  ';  
    echo $this->paginator->last('Last'). '  ';  
?>
<?php echo "<br>".$this->html->link('Add Post',array('action'=>'add'));?>
<?php echo "<br>".$this->html->link('Logout',array('controller'=>'users','action'=>'logout'));?>