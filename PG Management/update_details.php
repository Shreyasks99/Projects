<?php

session_start();
    //check to see whether the user is logged in or not
    include('config.php');
   if(! $db ) {
      die('Could not connect: ' . mysqli_error());
   }
   $guest_id = $_GET['guest_id'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $roomno = $_GET['roomno'];
    
$sql = "UPDATE guest SET firstName = '$fname',lastName='$lname',email='$email',phone=$phone, room_no=$roomno WHERE guest_id=$guest_id";
$sq = "UPDATE `pg_rooms` SET `status`=1 WHERE room_no = $roomno";
   $retval = mysqli_query($db, $sql );
   
if($retval) {
         header("location: guest_details.php");
      }else {
         die('failed to update: ' . mysqli_error());
      }
   mysqli_close($conn);
?>
