<?php 
function load_donor($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Gender</th>
			 
				<th>City</th>
				<th>State</th>
				<th>Contact-1</th>
				<th>Contact-2</th>
				<th>View</th>
				<th>Delete</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['NAME']."</td>";
									echo "<td>".$row['GENDER']."</td>";
							 
									echo "<td>".$row['CITY']."</td>";
									echo "<td>".$row['STATE']."</td>";
									echo "<td>".$row['CONTACT_1']."</td>";
									echo "<td>".$row['CONTACT_2']."</td>";
										
									echo "<td><a href='admin_view_donor.php?id=".$row['DONOR_ID']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='admin_delete_donor.php?id=".$row['DONOR_ID']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
									echo "</tr>";
								}
							}
							
						
				
			echo'</table>';

}

function load_patient($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Blood</th>
				<th>Unit</th>
				<th>Hospital</th>
				<th>Reason</th>
				<th>R-Date</th>
				<th>Status</th>
				<th>Update</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['NAME']."</td>";
									echo "<td>".$row['GENDER']."</td>";
									echo "<td>".$row['BLOOD']."</td>";
									echo "<td>".$row['BUNIT']."</td>";
									echo "<td>".$row['HOSP']."</td>";
									echo "<td>".$row['REASON']."</td>";
									echo "<td>".$row['RDATE']."</td>";
										
									 
									
									
									echo "<td><a href='admin_view_request.php?id={$row['ID']}' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									
									
									echo "</tr>";
									
								}
							}
							else
							{
								echo "<div >No Blood Request Yet</div>";
							}
						
				
			echo'</table>';

}


function load_medicine($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Medicine Name</th>
				<th>Medicine Brand</th> 
				<th>Medicine type</th>
				<th>Manfactured Date</th>
				<th>Expiry Date</th>
				<th>Donator Name</th>
				<th>View Donor</th>
				<th>Delete</th>
				<th>Status</th>
				<th>Stock</th>
				<th>Donated</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['medicine_name']."</td>";
									echo "<td>".$row['medicine_brand']."</td>";
							 
									echo "<td>".$row['type']."</td>";
									echo "<td>".$row['man_date']."</td>";
									echo "<td>".$row['exp_date']."</td>";
									echo "<td>".$row['donor_name']."</td>";
										
									echo "<td><a href='admin_view_donor.php?id=".$row['donated_id']."' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> View</a></td>";
									echo "<td><a href='deletemedicine.php?id=".$row['mid']."' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a></td>";
										echo "<td><a href='updatemedicinestatus.php?id=".$row['mid']."' class='btn btn-warning btn-xs'>".$row['status']."</a></td>";
											echo "<td><a href='updatemedicinestock.php?id=".$row['mid']."' class='btn btn-warning btn-xs'>".$row['stock']."</a></td>";
											echo "<td><a href='donated.php?id=".$row['mid']."' class='btn btn-warning btn-xs'>".$row['donated']."</a></td>";
									echo "</tr>";
								}
							}
							
						
				
			echo'</table>';

}

 


function load_medicine_user($sql,$con)
{
	echo '
				<table class="table table-striped">
				<tr>
				<th>S.No.</th>
				<th>Medicine Name</th>
				<th>Medicine Brand</th> 
				<th>Medicine type</th>
				<th>Manfactured Date</th>
				<th>Expiry Date</th>
				<th>Donator Name</th>
				<th>View Donor</th>
			 
				<th>Status</th>
				
 
				<th>Donated</th>
				<th>Invoice</th>
				
				</tr>';
				
					
							$result=$con->query($sql);
							$n=0;
							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{   
									$n++;
									echo "<tr>";
									echo "<td>".$n."</td>";
									echo "<td>".$row['medicine_name']."</td>";
									echo "<td>".$row['medicine_brand']."</td>";
							 
									echo "<td>".$row['type']."</td>";
									echo "<td>".$row['man_date']."</td>";
									echo "<td>".$row['exp_date']."</td>";
									echo "<td>".$row['donor_name']."</td>";
										
										echo "<td><a href='myprofile.php?id=".$row['donated_id']."' class='btn btn-primary btn-xs'>View  Profile</a></td>";
								 
										echo "<td><a  class='btn btn-warning btn-xs'>".$row['status']."</a></td>";
											
											echo "<td><a class='btn btn-warning btn-xs'>".$row['donated']."</a></td>";
											echo "<td><a  href='invoice.php?mid=".$row['mid']." class='btn btn-warning btn-xs'>invoice</a></td>";
									echo "</tr>";
								}
							}
							
						
				
			echo'</table>';

}

?>
