<?php echo $this->Form->create('Post');?>
<fieldset>
<legend>Add a Post</legend>
<?php echo $this->Form->input('title');?>
<?php echo $this->Form->input('body',array('rows'=>3));?>
</fieldset>

<?php echo $this->Form->end('提交');?>