<?php
include('config.php');




   
    $no = $_GET["room_no"];
    $lname = $_GET["lastName"];
    $fname = $_GET["firstName"];
    $email = $_GET["email"];
    $phone = $_GET["phone"];
    
           
    if(! $db ) {
      die('Could not connect: ' . mysqli_error());
    }
        
    $sql = "INSERT INTO `guest`( `firstName`, `lastName`, `email`, `phone`, `room_no`) VALUES ('$fname ', '$lname', '$email', '$phone', '$no')";
    $sq = "UPDATE `pg_rooms` SET `status`=1 WHERE room_no = $no";
    mysqli_query($db, $sq );
    $retval = mysqli_query($db, $sql );
    if($retval == true) {
    echo "<script>alert('insertion successful');";
    header('location:available_pg.php');
      }else{
    die(' insertion failed : ');
       
    }

?>