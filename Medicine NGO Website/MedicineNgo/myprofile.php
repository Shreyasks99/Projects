<?php
session_start();
include("config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	</head>
	<body>

<?php
include("top_nav.php");
?>
<div class="container"  style='margin-top:70px'>
	<div class="row">
	 
		<div class="col-sm-9" >
			<h3 class='text-primary'><i class="fa fa-users"></i> Donor Details </h3><hr>    
		<div class="row">
		<?php 
		if(isset($_GET["id"]))
		{
			$sql="SELECT * FROM donor WHERE DONOR_ID=".$_GET["id"];
			$result=$con->query($sql);
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				
		?>
		<div class="col-md-4">
					<div class="panel">
					<div class="panel-body">
					<img src="<?php echo $row["DONOR_PIC"];?>" class="image-rounded" height="300px" width="100%">
			</div>
			</div>
			
		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td><?php echo $row["NAME"];?></td>
			</tr>
			<tr>
				<th>Father Name</th>
				<td><?php echo $row["FATHER_NAME"];?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?php echo $row["GENDER"];?></td>
			</tr>
			<tr>
				<th>D.O.B</th>
				<td><?php echo $row["DOB"];?></td>
			</tr>
 
			<tr>
				<th>Email</th>
				<td><?php echo $row["EMAIL"];?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo $row["ADDRESS"];?></td>
			</tr>
			<tr>
				<th>Area</th>
				<td><?php echo $row["AREA"];?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $row["CITY"];?></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td><?php echo $row["PINCODE"];?></td>
			</tr>
			<tr>
				<th>State</th>
				<td><?php echo $row["STATE"];?></td>
			</tr>
	
			<tr>
				<th>Contact-1</th>
				<td><?php echo $row["CONTACT_1"];?></td>
			</tr>
			<tr>
				<th>Contact-2</th>
				<td><?php echo $row["CONTACT_2"];?></td>
			</tr>
			<tr>
				<th>Voluntary</th>
				<td><?php echo $row["VOLUNTARY"];?></td>
			</tr>
  
	 
			
			<tr>
				<th>Status</th>
				<td><?php 
				
					$status=$row["STATUS"];
				
					if($status=="1")
					{
						echo'<a  class="btn btn-sm btn-success">Activated</a>';
					}
					else
					{
							echo'<a   class="btn btn-sm btn-danger">Deactivated</a>';
					}
				
				?></td>
			</tr>
			
		</table>
		</div>
	
		
		<?php
			}
		}	
		else
		{
		echo "<script>window.open('admin_donor.php','_self');</script>";
		}

		?>	
 
			
		</div>
		</div>
	</div>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  <script>
  </script>

	</body>
</html>