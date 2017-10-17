<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div>
<label><b>Faculty</b></label>
							<select class="form-control" name="faculty" id="faculty">
								<option value="">Choose Faculty..</option>
													<?php 
	
	
	
			
		
			foreach ($facultyinfo as $item) {
			?>
			
			<option value="<?php echo $item['relatedfacid'] ?>"><?php echo $item['facultyname']; ?></option>
			
	
	
	<?php 
	} ?>




</select>

</div>
<script type="text/javascript">
$(document).ready(function(){


	var course =$("#faculty").val();
	




$("#faculty").change(function(){

		var faculty = $("#faculty").val();
		var checkload = false;

		if (faculty != "") {
			$("#kid").show();
			 $("#loaderx").load("contact/departmentload/" + faculty, function(){
			 	checkload = true;
			 });

			if (checkload == false) {
				$("#loaderx").load("departmentload/" + faculty);
			}

			
			
		}else if (faculty == "") {
			
			$("#kid").hide();
			$('#btnsubmit').prop('disabled', true);
		}
			
		
		

	});

});
</script>


</body>
</html>