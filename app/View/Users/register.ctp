<?php echo $this->Form->create('User');?>
<fieldset>
<legend>用户注册</legend>
<?php echo $this->Form->input('username');?>
<?php echo $this->Form->input('password');?>
<?php echo $this->Form->input('email');?>
<?php echo $this->Form->input('first_name');?>
<?php echo $this->Form->input('last_name');?>
<?php echo $this->Form->input('role',array('value'=>'author'));?>
</fieldset>

<?php echo $this->Form->end('注册');?>