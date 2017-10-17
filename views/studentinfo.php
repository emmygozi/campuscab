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
		<th>Image</th>
		
	</thead>
	<tbody>
	<?php 
	$kounter = 1;
	
			foreach ($studentinfo as $item) {
			# code...
		
	?>
	<tr>
		<td><?php echo $kounter++; ?></td>
		<td><?php echo $item['lastname']; ?></td>
		<td><?php echo $item['firstname']; ?></td>
	     <td><img class="img img-responsive" width="40px;" height="40px;" src="<?php echo base_url(); ?><?php echo $item['photograph']; ?>"></td>
		
		
	</tr>
	<?php } 
	?>
	</tbody>
</table>

<script src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>boots/js/bootstrap.min.js"></script>
</body>
</html>