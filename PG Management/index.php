<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PG Management | Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" type="image/png" href="./assets/pg-logo.png" />
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark" style="background-color: white !important;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="./assets/pg-logo.png" alt="" width="50px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto" style="font-size: 1.15em !important">
          <a class="nav-item nav-link active mr-5" href="index.php">Home</a>

          <!-- <a class="nav-item nav-link mr-5" href="./login.html">Login</a> -->
          <?php
          session_start();
            if(isset($_SESSION['uid'])){
          
                  echo '<a class="nav-item nav-link mr-5" href="./logout.php">Logout</a>';
                  echo '<script>console.log(\''.$_SESSION['uid'].'\')</script>';
          
            }else{

                 echo '<a class="nav-item nav-link mr-5" href="./login.html">Login</a>';


            }     
          ?>
         
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-5 header" id="particle">
    <img src="./assets/pg-logo.png" alt="MOSC" width="200px" class="mb-3 logo-img">
    <p class="main-text" style="margin:25px">PG Management</p>

    <a class="btn btn-shade no-bkg" href="login.html">Login</a>
    <!-- <script src="js/particles.js"></script> -->
    <!-- <script src="js/app.js"></script> -->

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

</body>

</html>