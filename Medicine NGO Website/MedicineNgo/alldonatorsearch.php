<?php 
			include "config.php";

				$sql="SELECT * FROM donor";
				$result=$con->query($sql);
				if($result)
				{
						$i=0;
					echo "<div class='table-responsive '><table class='table table-striped table-bordered'>
								<tr class='text-primary'>	
									<th>Sno</th>
									<th>Picture</th>
							
									<th>Name</th>
									<th>Area</th>
									<th>Pincode</th>
									<th>City</th>
									<th>State</th>
									<th>Cell</th>
								</tr>
							";
						
					while($row=$result->fetch_assoc())
					{
					 
						 $i++;
							echo"<tr>";
							echo"<td>$i</td>";
							echo"<td><img src='{$row["DONOR_PIC"]}' class='don_img' height='50px' width='50px'></td>";
					
							echo"<td>{$row["NAME"]}</td>";
							echo"<td>{$row["AREA"]}</td>";
							echo"<td>{$row["PINCODE"]}</td>";
							echo"<td>{$row["CITY"]}</td>";
							echo"<td>{$row["STATE"]}</td>";
							echo"<td>{$row["CONTACT_1"]}</td>";
							echo"</tr>";
					 
					}
					echo "</table></div>";
					
					if($i==0)
					{
						
					echo "<div class='alert alert-danger'><i class='fa fa-users'></i> Our Donors already donated</div>";
					}
				}
				else
				{
					echo mysqli_error($con);
					echo "<div class='alert alert-danger'><i class='fa fa-users'></i> No Donors Found</div>";
				}
			
		
			

?>
<div class="modal fade" id="Mymodal">
	<div class="modal-content">
		<div class="modal-body">
		<img src='' id="md_img" height="100%" width="100%">
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(".don_img").click(function(){
			var a=$(this).attr("src");
			$("#md_img").attr("src",a);
			$("#Mymodal").modal();
		});
		
	});
</script>

