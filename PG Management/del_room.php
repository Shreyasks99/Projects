<?php

session_start();
    //check to see whether the user is logged in or not
    include('config.php');
   if(! $db ) {
      die('Could not connect: ' . mysqli_error());
   }
    $no = $_GET['room_no'];

   
    $sql = "DELETE FROM pg_rooms where room_no = '$no'";
   mysqli_select_db($db,$dbname);
   $retval = mysqli_query($db, $sql );
   
if($retval) {
         header("location: available_pg.php");
      }else {
        echo "Deletion failed!";
      }
   mysqli_close($db);
?>
