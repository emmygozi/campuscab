<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Temperature</title>


<link rel="stylesheet" href="<?php echo base_url(); ?>boots/css/bootstrap.min.css">
<style type="text/css">
	.error{
		color: red;
	}
</style>

</head>
<body>
<h1>Guestbook  </h1>

<table class="table table-striped table-hover">
	<thead>
		<th>S/NO</th>
		<th>Lastname</th>
		<th>Firstname</th>
		<th>Phone Number</th>
		<th>Email Address</th>
		<th>Home Address</th>
		<th>Date Captured</th>
		<th>Action</th>
	</thead>
	<tbody>
	<?php 
	$kounter = 1;
		foreach ($guestinfo as $item) {
			# code...
		
	?>
	<tr>
		<td><?php echo $kounter++; ?></td>
		<td><?php echo $item['lastname']; ?></td>
		<td><?php echo $item['firstname']; ?></td>
		<td><?php echo $item['phonenumber']; ?></td>
		<td><?php echo $item['emailaddress']; ?></td>
		<td><?php echo $item['homeaddress']; ?></td>
		<td><?php echo date('d-M-Y', strtotime($item['datacaptured'])); ?></td>
		<td><a href="<?php echo base_url(); ?>contact/editguest/<?php echo $item['contact_id']; ?>" class="btn btn-success" >Edit

		<a href="<?php echo base_url(); ?>contact/deleteguest/<?php echo $item['contact_id']; ?>" class="btn btn-danger"> <i class="glyphicon glyphicon-bin"></i>Delete </a>
		<a href="<?php echo base_url(); ?>contact/disableguest/<?php echo $item['contact_id']; ?>" class="btn btn-danger"> <i class="glyphicon glyphicon-bin"></i>Disable User</a>
		</td>
		
	</tr>
	<?php } ?>
	</tbody>
</table>

<script src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>boots/js/bootstrap.min.js"></script>
</body>
</html>