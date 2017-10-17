<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<?php if ($this->session->has_userdata('logged') == true) {
	echo "<div class='alert alert-info alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='close'>
	<span aria-hidden='true'>&times;</span>
	</button>

	<strong class='makesmall'>Important Notice: </strong> 
	<span class='makesmall'>You are Logged out!! Log in below to continue..
	</span>

	</div>";

					//unset logged in user after it has shown
	$this->session->unset_userdata('logged');
} ?>
<head>
	<title>Home</title>

	<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>boots/css/bootstrap.min.css"/>
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


</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/flipimages.css" type="text/css">

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/flipimages.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/bootstrap.js"></script>





</head>

<body>

<div class="container-fluid">
<div class="wrapper">

<div id="right">
	<ul>
	<li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url(); ?>contact/redirect">Profile</a></li>
    
    
	
	
	</ul>
</div>

<div id="left" >
	
</div>


    
</div>




	<div class="container">
		<div class="row">  <!-- you can further name bootstrap classes for specific functions -->
			<div class="row" >
				<div class="col-md-12"  >
					<div id="changehome" style="height: 11em; background-color: #B80000;">
						<img class="col-sm-5" id="changer" src="<?php echo base_url(); ?>images/guy.jpg" height="150em;" 
						style="float: left;" >
						<div class="col-md-1" style="display: inline-block;vertical-align: 
						bottom; margin-top: 13%;">
						<button id="sup" class="btn btn-outline-info btn-sm" style="" >Hide Heading</button>
					</div>
					<img class="col-sm-5" id="changer2" src="<?php echo base_url(); ?>images/ubacards.jpg" height="150em;"
					style="float: right;">	<br>

				</div><br>
			</div>	

		</div>
		<div class="row">
			<div class="col-md-8">
				<h5 style="font-weight: bolder;">  Please Register Below To Use UBACAMPUS</h5>
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>

					<strong class="makesmall">Important Notice</strong> 
					<span class="makesmall">By creating an account you agree to our 
						<a href="#">Terms & Conditions</a>.</span>

					</div>

					<a href="<?php echo base_url('contact/loginpage'); ?>"><input type="button" value="Log In" class="btn btn-info btn-sm" /></a>
					Login here if you already have an account<br><br>

					<!--Form start -->

					

					<form action="<?php echo base_url('contact/index'); ?>" method="post" >
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><b>First name</b></label>
									<input type="text" class="form-control" id="name" placeholder="Enter first name" name="firstname"  required autofocus><?php echo form_error('firstname'); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label><b>Last name</b></label>

									<input type="text" class="form-control" id="mail" placeholder="Enter last name" name="lastname" required><?php echo form_error('lastname'); ?>
								</div>
							</div>

						</div>


						<div class="form-group">
							<label><b>Email</b></label>
							<input type="email" class="form-control" id="mail" placeholder="Enter Email" name="emailaddress" required><?php echo form_error('emailaddress'); ?>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><b>Password</b></label>
									<span class="glyphicon glyphicon-lock"></span>
									<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pass" required><?php echo form_error('pass'); ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label><b>Gender</b></label><br>
							<input type="radio" name="gender" value="male" required> Male 
							&nbsp; &nbsp; <input type="radio" name="gender" value="female" required> Female
						</div>

						<div class="row">


							<div class="col-md-4">
								<label><b>Choose Campus</b></label>

								<select name="campus" id="campus" class="form-control">
									<option value="">Select Campus..</option>
									<?php
									$kounter = 1;




									foreach ($instinfo as $item) {
										?>
										<option value="<?php echo $item['id'] ?>"> <?php echo $item['campusname']; ?></option>



										<?php 
									} ?>
								</select>
								&nbsp; 
							</div>


							<div id="mother" class="col-md-4">
								<div id="loader" >

								</div>
							</div>

							<div id="kid" class="col-md-4">
								<div id="loaderx">


								</div>
							</div>



						</div>






						<div class="form-group">
							<button type="submit" id="btnsubmit" name="btnsubmit"   class="btn btn-success" disabled="disabled">Submit
							</button>
						</div>
					</form>

				</div>

				<div class="col-md-4">
					<div class="hideit">

						<div class="circle">
							<div class="front">
								<img width="300"  height="300" src="<?php echo base_url(); ?>images/mobilebanking.jpg">
							</div>
							<div class="back">

								<img width="300" height="300" src="<?php echo base_url(); ?>images/baner-students.jpg">

							</div>
						</div>
					</div>
				</div>


				

			</div>
		</div>

	</div>
</div>	
</body>

<script type="text/javascript">
	$(document).ready(function(){

		var checkpageload = false;
		$("#campus").change(function(){
			var campus = $("#campus").val();
		//var g;
		if (campus != "") {
			var r = $("#loader").load("contact/facultyload", function(){
				checkpageload = true;
			});
			if (checkpageload == false) {
				var r = $("#loader").load("facultyload");
			}
			$("#mother").show();
			//$("#loaderx").show();
		}else if (campus == "") {
			$("#mother").hide();
			$("#kid").hide();
			$('#btnsubmit').prop('disabled', true);
			 //g = true;
			}



		});


	});

</script>

</html>
