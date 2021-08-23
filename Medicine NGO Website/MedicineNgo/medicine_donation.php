<?php 
include("config.php"); 
session_start();
error_reporting();
if(!isset($_SESSION["DONOR_ID"]))
{
header("Location:userlogin.php");
}
   $sts=$_SESSION['STATUS'];
if($sts=="0")
{
echo '<script>alert("sorry to say your application has not activated yet or if were then our admin has deactivated your account.please contact us in contact us section");location.href="contact.php";</script>';
}
					 



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body>

<?php
include("top_nav.php");
?>
    <div class="container" style='margin-top:70px;'>
        <div class="row">
            <div class="col-md-12">
                <h3 class=" text-primary">
					  medicine donation
                </h3><hr>
						 

            </div>
        </div>
	
	
			<div class="row centered-form ">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<?php
					if(isset($_POST["submit"]))
					{
						
										
$target_dir = "medicine_image/";
$img="medicine_image/noimage.jpg";
$target_file = $target_dir.rand(100,999). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000) {
   // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo '<script>alert("please select valid file format");</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $img=$target_file;
    } else {
     //   echo "Sorry, there was an error uploading your file.";
    }
}
 

 
 


$NAME=$_POST["NAME"];
$medicine_brand=$_POST["medicine_brand"];
$type=$_POST["type"];
$man_date=$_POST["man_date"];
$exp_date=$_POST["exp_date"];
$NAME=$_POST["NAME"];
$sql="
INSERT INTO `medicine`(`medicine_name`, `medicine_brand`, `type`, `man_date`, `exp_date`, `donated_id`, `donor_name`, `donor_number`, `image`,`quantity`)
 VALUES 
 ('{$_POST["NAME"]}', '{$_POST["medicine_brand"]}', '{$_POST["type"]}', '{$_POST["man_date"]}', '{$_POST["exp_date"]}', '{$_SESSION["DONOR_ID"]}', '{$_SESSION["NAME"]}','{$_SESSION["CONTACT"]}','{$img}','{$_POST["quantity"]}');";
						if($con->query($sql))
							{
								echo '
								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Success!</strong> medicine request has successfully complted.you can ship medicine to the address in about section.
								</div>
								';
							}
							else

							{
								echo mysqli_error($con);
							}
					}
				?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-left" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-user "> </span> fill  Medicine information</h3>
                    </div>
			 
                    <div class="panel-body">
						<form method="post" action="medicine_donation.php" autocomplete="off" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label text-primary" for="NAME" >Medicine Name</label>
							<input type="text" placeholder="Medicine Name" id="NAME" name="NAME"  required class="form-control input-sm">
						</div>
						<div class="form-group">
							<label class="control-label text-primary" for="medicine_brand">Brand Name</label>
							<input type="text" placeholder="Brand Name" id="medicine_brand" name="medicine_brand" required class="form-control input-sm">
						</div>
						
						<div class="form-group">
							<label class="control-label text-primary"  for="GENDER">type</label>
								<select id="gen" name="type" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="drug">drug</option>
									<option value="syrup">syrup</option>
									<option value="liquid drops">liquid drops</option>
									<option value="sanitizer">sanitizer</option>
									<option value="salines">salines</option>
									<option value="painkiller">pain killer</option>
								
								</select>
						</div>
						
						<div class="form-group">
							<label class="control-label text-primary" for="DOB">Manufacture Date</label>
							<input type="text"  placeholder="YYYY/MM/DD" required id="man_date" name="man_date"  class="form-control input-sm DATES">
						</div>

							<div class="form-group">
							<label class="control-label text-primary" for="DOB">Expiry Date</label>
							<input type="text"  placeholder="YYYY/MM/DD" required id="exp_date" name="exp_date"  class="form-control input-sm DATES">
						</div>
						
				 
							<div class="form-group">
							<label class="control-label text-primary" for="DOB">Quantity</label>
							<input type="number"  placeholder="500,1000" required min="500" max="50000000"   name="quantity"  class="form-control">
						</div>
					
						 
					  
				 
							<div class="form-group">
							<label class="control-label text-success" for="fileToUpload" >Upload Photo</label>
							<input type="file" class="form-control"  name="fileToUpload">
						  </div>
						
							  <div class="form-group">
								<label class="control-label text-success"><input type="checkbox" checked id="c2">&nbsp; I have read the eligibility criteria and confirm that i am eligible to donate blood.</label> 
								<label class="control-label text-success"><input type="checkbox" checked id="c3" >&nbsp; I agree to the Term and Conditions and consent to have my contact and donor information published to the potential blood recipients.</label>
						  </div>
						
					
						
						  <div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit" >Registar Now</button>
						  </div>
						 </form>
                    </div>
                </div>
            </div>
			 
            
        </div>
        
       
    </div>    

 <?php include("footer.php"); ?>
 <script>
	$(document).ready(
				function(){
						$("#volu").hide();
						$("#c1").click(function(){
							if($("#c1").is(':checked'))
							{
								$("#volu").show(1000);
								$("#new").hide(100);
							}
							else
							{
								$("#volu").hide(1000);
								$("#new").show(100);
							}
						});
						
						/*
						$("#CITY").change(function(){
							var city=$("#CITY").val();
							//alert(city);
							$.post('functions.php',{G_CITY_ID:city},function(data){
							//	alert(data);
								$("#STATE").html(data);
							});
							
						});*/
						
						
						$("#COUNTRY").change(function(){
							var countr=$("#COUNTRY").val();
							//alert(city);
							$.post('get_state.php',{G_STATE_ID:countr},function(data){
							//	alert(data);
								$("#STATE").html(data);
							});
							
						});
						
							$("#STATE").change(function(){
							var stid=$("#STATE").val();
							//alert(city);
							$.post('get_city.php',{G_STATE_ID:stid},function(data){
							//	alert(data);
								$("#CITY").html(data);
							});
							
						});
					
						
							
				});
	
	
  $(function() {
    var availableTags = [
      <?php 
	  $sql="SELECT AREA_NAME FROM area";
							$result=$con->query($sql);
							
							if($result->num_rows>0)
							{
								$i=0;
								$n=$result->num_rows;
								while($row=$result->fetch_assoc())
								{   
									$i++;
									if($n!=$i)
									{
										echo '"'.$row['AREA_NAME'].'",';
									}
									else
									{
										echo '"'.$row['AREA_NAME'].'"';
									}
								}
								
							}
	  
	  
	  ?>
    ];
    $( "#AREA" ).autocomplete({
      source: availableTags
    });
  });
  
 </script>
 
</body>
</html>_re