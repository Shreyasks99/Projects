
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PG Management | Rooms</title>
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
      $query = "SELECT * FROM pg_rooms where status='FALSE'";
      $result = $db->query($query);
      echo "<div class='container table-class'> <div class='row mb-5'>
       <div class='col-md-12'>
            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
       Add New Rooms
       </button>
       </div>
   </div><table id='med-div' class='table display responsive nowrap' style='width:100%;'><thead class='thead-light'><tr><th>ROOM NO</th><th>STATUS</th><th>Delete</th><th>Add Guest</th></tr></thead><tbody>";
    while($row = mysqli_fetch_array($result))
      {
      echo "<tr><td>".$row['room_no'] . "</td><td>Available</td><td><a href='del_room.php?room_no=".$row['room_no']."' class='confirmation text-danger'><i class='fas fa-trash fa-2x'></i></a></td><td><a href='addMember.php?room_no=".$row['room_no']."' class='text-primary'><i class='fas fa-user-plus fa-2x'></i></a></td></tr>"; 
     
      }
                echo "</tbody></table></div>";

    ?>
    </div>
</div>

      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new Rooms</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action='addRoom.php' method='get'>
                        <div class="form-group">
                            <label for="roomNo">Room Number</label>
                            <input type="text" name='roomNo' class="form-control" id="roomNo" placeholder="Enter Room Number">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id='add-btn'>Add Room</button>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer display-msg">

                </div>
            </div>
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