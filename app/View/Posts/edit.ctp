<?php echo $this->Form->create('Post');?>
<fieldset>
<legend>Edit a Post</legend>
<?php echo $this->Form->input('id',array('type'=>'hidden'));?>
<?php echo $this->Form->input('title');?>
<?php echo $this->Form->input('body',array('rows'=>3));?>
</fieldset>

<?php echo $this->Form->end('提交');?>