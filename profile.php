<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:index.php?mes=Don't Misuse ....!!");
 }
?>

<body>
<?php include"config.php";?>

<div class="col-md-offset-3 col-md-6">

<h1 id="on" align="center">Profile</h1>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
<div class="form-group">
  <center>
 
      <?php
 
       $sql2="select * from registration where uid='{$_SESSION["uid"]}'";
       $rec2=$con->query($sql2);
	   //echo $sql2;
	   if($rec2->num_rows>0)
	   {
       $res2=$rec2->fetch_assoc();
	 
		 echo" 
	   <img src='{$res2["profile"]}' id='profile' class='img img-responsive img-thumbnail' height='300' width='300' style='border-radius:200px;'>";
	   }
?>
    

  </center>
  <br>
<input type="file" name="image" placeholder="Enter your profile" class="form-control">
<br>
<input type="text" name="about" placeholder="Enter your about" value="<?php echo $res2["about"]?>" class="form-control">
</div>
<div class="form-group">
<input type="submit" class="btn btn-success pull-right" name="next" value="next">
<input type="submit" class="btn btn-info" name="set" value="set" >
</div>
</form>
<?php 
if(isset($_POST["set"]))
{
	if(isset($_FILES["image"]))
	{  
	        //print_r($_FILES);
			$target_dir = "profile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["image"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
				  {

                      
                         $sql="update registration set profile='{$target_file}',about='{$_POST["about"]}' where uid='{$_SESSION["uid"]}'";
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

if(isset($_POST["next"]))
{
header("location:userhome.php");
}
?>
</div>

</body>
<?php include"footer.php";?>
</html>