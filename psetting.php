<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 }
 ?>
<style>
.col-md-6
{
padding-left:50px;
}
</style>
<body>
<?php include"nav.php";?>
<?php include"config.php";?>
<div >
<?php
if(isset($_GET["mes"]))
{
echo"<div class='alert alert-info'>{$_GET["mes"]}</div>";
}

$sql="select * from registration where uid='{$_SESSION["uid"]}'";
$res=$con->query($sql);
$rec=$res->fetch_assoc();
?>
  
<div class='row'>
  <center>
  <h1 id='on' style='color:black; box-shadow:10px 10px 50px gold;'><?php echo $rec["uname"] ?></h1>
  </center>
  <br>
  <br>
  <br>
  <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>"enctype="multipart/form-data">
	<div class='col-md-6'>
	<img src='<?php echo $rec["profile"];?>' class='img img-responsive img-circle img-thumbnail' height='800' width='500'  >
	<br>
	<input placeholder='<?php echo $rec["profile"]?>' type='file' name='image' class='form-control'>
	<br>
	<input type='submit' name='set' value='submit' class='btn btn-primary'>
<?php 
if(isset($_POST["set"]))
{
	if(isset($_FILES["image"]))
	{  
	        //print_r($_FILES);
			$target_dir = "uprofile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["image"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
				  {

                      
                         $sql="update registration set profile='{$target_file}' where uid='{$_SESSION["uid"]}'";
                         //echo $sql;
						 if($con->query($sql))
                          {
						
						 echo"
						
						 <div class='alert alert-success'>set Successfully.....!</div>";
                          }
                          else
                          {
                           echo"failed";
                          }
                    }
					}
					else
					{
			
			        echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			        }
				}	
			 
			 else
			 {
			
			 echo"<div class='alert alert-info'>File Upload error</div>";
			 }
}

?>

	</div>
    <div class='col-md-6'>
	
    <label class='on2'><span style='color:red;'>1)</span>Place:</label>
	<br>
	<input value='<?php echo $rec["place"];?>' type='text' name='place' class='form-control on2'>
	<label class='on2'><span style='color:red;'>2)</span>Date of Birth:</label>
	<br>
	<input value='<?php echo $rec["dob"];?>' type='date' name='dob' class='form-control on2'>
    <label class='on2'><span style='color:red;'>3)</span>Gender:</label>
	<br>
	<input value='<?php echo $rec["gender"];?>'type='text' name='gender' class='form-control on2'>
	<label class='on2'><span style='color:red;'>4)</span>Phone No:</label>
	<br>
	<input value='<?php echo $rec["phoneno"];?>'type='number' name='phoneno' class='form-control on2'>
	<label class='on2'><span style='color:red;'>5)</span>Email Id:</label>
	<br>
	<input value='<?php echo $rec["email"];?>' type='email' name='email' class='form-control on2'>
	<label class='on2'><span style='color:red;'>6)</span>Comments:</label>
	<br>
	<input value='<?php echo $rec["commend"];?>' type='text' name='commend' class='form-control on2'>
	<label class='on2'><span style='color:red;'>7)</span>About:</label>
	<br>
	<input value='<?php echo $rec["about"];?>' type='text' name='about' class='form-control on2'>
	<center>
	<br>
	<input name='set' type='submit' value='set' class='btn btn-info' >
	</center>
<?php 
if(isset($_POST["set"]))
{

                      
     $sql1="update registration set place='{$_POST["place"]}',gender='{$_POST["gender"]}',dob='{$_POST["dob"]}',commend='{$_POST["commend"]}',phoneno='{$_POST["phoneno"]}',about='{$_POST["about"]}' where uid='{$_SESSION["uid"]}'";
     ///echo $sql1;
	 if($con->query($sql1))
	 {
	 //echo $sql1;
	 echo"<div class='alert alert-success'>set Successfully.....!</div>";
	 }
     else
     {
      echo"failed";
     }
}
?>

	</form>
	</div>
 </div>
  
  


</div>
</body>
<?php include"footer.php";?>
</html>