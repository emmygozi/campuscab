<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<?php 

$this->session->set_userdata('online','person');
if ( (($this->session->has_userdata('online') == true) && (count($user) > 0))) {
	$this->session->set_userdata('individual',$user);
} ?>
<head>
	<title>Home</title>

	<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"/>
	<style type="text/css">
	.error{
		color: red;
	}


	

	.wrapper{border-bottom: 1px solid white; width: 100%; overflow: hidden;}
	#right{background-color: #202C45; float: left; width: 85%; height: 50px;}
	#left{background-color: #DA670F ; height: 50px; width: 15%; float: left;}
	p{color: white; text-align: center;}
	ul li{display: inline-block; list-style-type: none; margin-left: 10px; text-align: left;}

	li{margin-top: 10px;}

	a{color: white; text-decoration: none;}
	a:hover{color: #202C45; background-color: white;text-decoration: none; border-radius: 15px; padding: 5px;}
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/flipimages.css" type="text/css">

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/flipimages.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/bootstrap.js"></script>





</head>

<body >

<div class="container-fluid">
			<div class="wrapper">

<div id="right">
	<ul>
	<li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url(); ?>contact/redirect">Profile</a></li>
    <li><a href="<?php echo base_url(); ?>contact/Logout">Logout</a></li>
    
	
	
	</ul>
</div>

<div id="left" >
	
</div>


    
</div>
	</div>		


	<div class="container">
		<div class="row">
			Congratulations!!

			<table border="2" width="100%">
				<thead>
					<td>First Name</td>	
					<td>Last Name</td>
					<td>Email Address</td>
					<td>Reference ID</td>
				</thead>

				<?php 


				$usersession = $this->session->userdata('individual');




				echo "<tbody><tr> <td>".$usersession['firstname']."</td> ";
				echo "<td>".$usersession['lastname']."</td>";
				echo "<td>".$usersession['email']."</td>";
				echo "<td>".$usersession['randomid']."</td>";
				echo "</tr><tbody>";


				?>
			</table>
			<br>
			<a href="<?php echo base_url(); ?>"><input type="button" value="Home"></a>
			<a href="<?php echo base_url('contact/logout'); ?>"><input type="button" value="Logout"></a>
		</div>
	</div>
</body>
</html>
