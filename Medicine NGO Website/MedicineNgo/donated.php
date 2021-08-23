<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
 $id=$_GET["id"];
 $stock="Donated";
 $sts="donated";
 $donated="donated";
 echo $sql="UPDATE medicine SET stock='{$stock}',status='{$sts}',donated='$donated' WHERE  mid='{$id}'";
 $con->query($sql);
 header("location:medicinlist.php?");
 
?>