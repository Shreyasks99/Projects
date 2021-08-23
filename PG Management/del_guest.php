<?php

session_start();
    include('config.php');
   if(! $db ) {
      die('Could not connect: ' . mysqli_error());
   }
    $no = $_GET['guest_id'];

   
    $sql = "DELETE FROM guest where guest_id = '$no'";
   mysqli_select_db($db,$dbname);
   $retval = mysqli_query($db, $sql );
   
if($retval) {
         header("location: guest_details.php");
      }else {
        echo "Deletion failed!";
      }
   mysqli_close($db);
?>
