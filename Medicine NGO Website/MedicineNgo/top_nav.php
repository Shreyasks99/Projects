    <!-- Navigation -->
    <nav class="navbar navbar-default 	 navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"></i>Medicine NGO</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php"> About us</a></li>
                    <li><a href="userLogin.php"> login</a></li>
                    <li><a href="donor_reg.php"> register</a></li>
              
                    <li><a href="medicine_donation.php">Donate</a></li>
                         <?php 

                    if(isset($_SESSION['DONOR_ID']) || isset($_SESSION['usertype']))
                    {
                    echo ' <li><a href="mydonation.php">My Donation</a></li>';
                    echo '<li><a href="logout.php">logout</a></li>';
                 
                }
                     ?>
                    <li><a href="alldonator.php">our donators</a></li>
                    <li><a href="contact.php">Contact/Feedback</a></li>
                    <li><a href="admin.php">Admin</a></li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>