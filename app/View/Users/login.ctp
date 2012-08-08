<?php 
if(isset($error)){
	echo "Invalid Login.";
}
?>
<p>Please log in.</p>
<?php echo $this->form->create('User');?>
<?php echo $this->form->input('username');?>
<?php echo $this->form->input('password');?>
<?php echo $this->form->end('Login');?>
<?php echo $this->html->link('Register',array('action'=>'register'));?>