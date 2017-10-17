<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div>
<label><b>Department</b></label>
							<select class="form-control" name="dept" id="dept">
								<option value="">Choose Department..</option>
													<?php 
	
	
	
			
		print_r($departmentinfo);
			foreach ($departmentinfo as $item) {
			?>
			<option value="<?php echo $item['id'] ?>"><?php echo $item['departmentname']; ?></option>
		
	
	
	<?php 
	} ?>




</select>

</div>
<script type="text/javascript">
$(document).ready(function(){

	

	$("#dept").change(function(){
		var course =$("#dept").val();

 if (course != "") {
			

			$('#btnsubmit').prop("disabled", false);
}			
		

	});


});
</script>


</body>
</html>