<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Temperature</title>

<link href="<?php echo base_url(); ?>boots/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"/>
<style type="text/css">
	.error{
		color: red;
	}
</style>

</head>
<body>

<form method="post" action="<?php echo base_url('contact/index'); ?>">
<h1>Guest list</h1>
<input type="text" name="lastname" id="last" placeholder="lastname"><?php echo form_error('lastname'); ?><br>
<input type="text" name="firstname" id="first" placeholder="firstname"><?php echo form_error('firstname'); ?><br>
<input type="text" name="phone" id="phone" placeholder="phone"><?php echo form_error('phone'); ?><br>
<input type="text" name="emailaddress" id="email" placeholder="email"><?php echo form_error('emailaddress'); ?><br>
<input type="text" name="home" id="home" placeholder="home address"><br>




<div id="hide"></div>
<input type="submit" class="btn btn-success btn-lg" name="sub">
</form>


<script src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>boots/js/bootstrap.min.js"></script>
</body>
</html>