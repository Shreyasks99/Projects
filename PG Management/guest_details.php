
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PG Management | Guest Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" type="image/png" href="./assets/pg-logo.png" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.css" />

</head>

<body style="background-color: #f3f3f3" class="team-body">
<?php
    include('header.php');
      ?>
          <?php
          session_start();
            if(isset($_SESSION['uid'])){
          
                  echo '<a class="nav-item nav-link mr-5" href="./logout.php">Logout</a>';
                  echo '<script>console.log(\''.$_SESSION['uid'].'\')</script>';
          
            }else{

                 echo '<a class="nav-item nav-link mr-5" href="./login.html">Login/Signup</a>';
                 echo '<script>console.log(\'shit\')</script>';


            }     
          ?>
        </div>
      </div>
    </div>
  </nav>

  <div class="container"style="padding-top:5rem; margin-bottom:50px;">
    <div class="row card-holder"  id="area" style="min-height:45vh">
    <?php
      include('config.php');
      $query = "SELECT * FROM guest";
      $result = $db->query($query);
      echo "<div class='container table-class'> <div class='row mb-5'>
       
   </div><table id='med-div' class='table display responsive nowrap' style='width:100%;'><thead class='thead-light'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone No</th><th>Room No</th><th>Delete</th><th>Edit Details</th></tr></thead><tbody>";
    while($row = mysqli_fetch_array($result))
      {
      echo "<tr><td>".$row['firstName'] . "</td><td>".$row['lastName'] . "</td><td>".$row['email'] . "</td><td>".$row['phone'] . "</td><td>".$row['room_no'] . "</td><td><a href='del_guest.php?guest_id=".$row['guest_id']."' class='confirmation text-danger'><i class='fas fa-trash fa-2x'></i></a></td><td><a href='edit_guest.php?guest_id=".$row['guest_id']."' class='text-primary'><i class='fas fa-edit fa-2x'></i></a></td></tr>"; 
     
      }
                echo "</tbody></table></div>";

    ?>
    </div>
</div>

 
    

    <?php
    include('footer.html');
      ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ad3bc45f55.js" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
  


</body>

</html>