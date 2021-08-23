 
<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }


 	if(isset($_GET["id"]))
		{
			$sql="delete from medicine WHERE mid=".$_GET["id"];
			$qry=mysqli_query($con,$sql);
			if($qry)
			{
			echo '<script>alert("record deleted successfully");location.href="medicinlist.php";</script>
				';
			}
		
		}
?>

