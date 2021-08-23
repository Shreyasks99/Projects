<?php
include('config.php');
    $roomno = $_GET["roomNo"];
   
    
           
    if(! $db ) {
      die('Could not connect: ' . mysqli_error());
    }
        
    $sql = "INSERT INTO `pg_rooms`(`room_no`, `status`) VALUES ('$roomno','0')";
    
    $retval = mysqli_query($db, $sql );
    if($retval == true) {
    echo "<script>alert('Added Successfully');";
    header('location:available_pg.php');
      }else{
        die("ERROR");
       
    }
?>
