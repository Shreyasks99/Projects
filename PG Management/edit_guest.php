<?php
session_start();
    //check to see whether the user is logged in or not
    include('config.php');
   if(! $db ) {
      die('Could not connect: ' . mysqli_error());
   }
    $guest_id = $_GET['guest_id'];

   
   $sql = "SELECT * FROM guest where guest_id = '$guest_id'";
   $retval = mysqli_query($db, $sql );
        
    

?>

<!DOCTYPE html>
<html>

<head>
    <title>PG Management | Edit</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" type="image/png" href="./assets/pg-logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="shortcut icon" type="image/png" href="./assets/pg-logo.png" />

</head>

<body>
    <?php
    include('header.php');
    ?>

    <!-- The main content goes here-->
    
        <center>
            <h1 class="text-white">Edit Details</h1>
        </center><br/>
        <div class="container edit-form-div">
        <form action='update_details.php' method='get'>
                        <div class="form-group">
                            <label for="guest_id">Guest ID</label>
                            <input type="text" name='guest_id' class="form-control" id="guest_id" value=<?php echo $_GET['guest_id'];?> readonly>
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name='fname' class="form-control" id="fname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name='lname' class="form-control" id="lname" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name='email' class="form-control" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone No</label>
                            <input type="text" name='phone' class="form-control" id="phone" placeholder="Enter Phone No">
                        </div>
                        <div class="form-group">
                            <label for="roomno">Room No</label>
                            <input type="text" name='roomno' class="form-control" id="roomno" placeholder="Enter Room no">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id='add-btn'>Add</button>
                        </div>
                    </form>
        </div>
       
        <?php
    include('footer.html');
    ?>

    

    <!--Script tags-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
