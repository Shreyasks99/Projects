<?php 

$con=new mysqli("localhost","root","","MedicineNgoDB");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>