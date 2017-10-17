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
		
	</thead>
	<tbody>
	<?php 
	$kounter = 1;
	echo count($usersdisabled[0]);
	for($a=0;$a<count($usersdisabled);$a++){
		for ($i=0; $i< count($usersdisabled[$a]); $i++){
			foreach ($usersdisabled as $item) {
			# code...
		
	?>
	<tr>
		<td><?php echo $kounter++; ?></td>
		<td><?php echo $item[$i]['lastname']; ?></td>
		<td><?php echo $item[$i]['firstname']; ?></td>
		<td><?php echo $item[$i]['phonenumber']; ?></td>
		<td><?php echo $item[$i]['emailaddress']; ?></td>
		<td><?php echo $item[$i]['homeaddress']; ?></td>
		<td><?php echo date('d-M-Y', strtotime($item[$i]['datacaptured'])); ?></td>
		
		
	</tr>
	<?php } 
	}} ?>
	</tbody>
</table>

<script src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>boots/js/bootstrap.min.js"></script>
</body>
</html>