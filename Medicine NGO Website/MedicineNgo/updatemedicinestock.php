<?php
session_start();
include("config.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
 $id=$_GET["id"];
 $stock="In Stock";
 $sts="collected";
 echo $sql="UPDATE medicine SET stock='{$stock}',status='{$sts}' WHERE  mid='{$id}'";
 $con->query($sql);
 header("location:medicinlist.php?");
 
?>