<?php
session_start();
include("config.php");
include("admin_function.php");
if(!isset($_SESSION["DONOR_ID"]))
{
header("Location:userlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body>

<?php
include("top_nav.php");
?>

 
<div class="container" style='margin-top:70px'>
	<div class="row">
		 
		<div class="col-sm-12" >
			<h3 class="text-primary"><i class="fa fa-search"></i> Search Donor Details </h3><hr>    
		<div class="row">
	 
		<div class='col-md-12'>
			<div class='table-responsive' id="feedback">
			
			<?php 
			$id=$_SESSION['DONOR_ID'];
				$sql="Select * from medicine where donated_id='$id'";
				load_medicine_user($sql,$con);
			?>
			
			<div>
		</div>
		
		
	</div>
		
		
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  <script>
	$(document).ready(function()
	{
		$("#q").keyup(function(){
				var txt=$("#q").val();
				$.post('admin_ser.php',{q:txt},function(data){
					$("#feedback").html(data);
				});
			
		});
	
	});
  </script>

	</body>
</html>