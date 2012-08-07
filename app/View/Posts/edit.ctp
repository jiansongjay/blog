<?php echo $this->Form->create('Post');?>
<fieldset>
<legend>Edit a Post</legend>
<?php echo $this->form->input('id',array('type'=>'hidden'));?>
<?php echo $this->form->input('title');?>
<?php echo $this->form->input('body',array('rows'=>3));?>
</fieldset>

<?php echo $this->form->end('提交');?>