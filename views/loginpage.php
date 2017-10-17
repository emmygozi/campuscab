<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
	
	<title>Home</title>

	<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css"/>
	<style type="text/css">
	.error{
		color: red;
	}

	.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}

	</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/flipimages.css" type="text/css">

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/jquery-3.2.1.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/flipimages.js">
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>boots/js/bootstrap.js"></script>





</head>

<body >
<div style="position: absolute;display: table;width: 100%;height: 100%;">
	<div style="vertical-align: middle;display: table-cell;text-align: center;">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="display: inline-block;text-align: left;padding: ;border: ">
            <h1 class="text-center login-title">Sign in to continue to UBACAMPUS</h1>
            <?php if ($this->session->has_userdata('signup') == true) {
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red;' class='text-center'>Wrong email or password!! Try again</span>";
				$this->session->unset_userdata('signup');

				} ?>
            <div class="account-wall">
            	
                <img class="profile-img" src="<?php echo base_url(); ?>images/photo.png"
                    alt="">
                    <form action="<?php echo base_url('contact/signin'); ?>" method="post" class="form-signin" >
                <input type="email" class="form-control" placeholder="Email" name="mail2" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="pwrd2" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo base_url(); ?>" class="text-center new-account">Create an account </a>
        </div>
    </div>

</div>
</body>
</html>
