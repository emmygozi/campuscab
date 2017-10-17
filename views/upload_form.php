<html>
<head>
<title>Upload Form</title>
</head>
<body>
<link rel="stylesheet" href="<?php echo base_url(); ?>boots/css/bootstrap.min.css">
<style type="text/css">
	.error{
		color: red;
	}
</style>


<?php echo $error;?>


<?php echo form_open_multipart('upload/do_upload');?>

<label>First name</label><br>
<input type="text" name="firstname" ><br>
<label>Last name</label><br>
<input type="text" name="lastname" ><br>
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="submit" class="btn btn-success sm" />

</form>

</body>
</html>