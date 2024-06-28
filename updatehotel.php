<html>
<?php include"header.php";
session_start();
 if(!$_SESSION["aid"])
 {
  header("location:adminlogin.php?mes=Don't Misuse....!");
 }
?>
<body>
<?php include"config.php";?>
<?php include"nav.php";?>

<?php
$sql1="SELECT * FROM `hotel` WHERE hid='{$_GET["id"]}'";
	$rec=$con->query($sql1);
	if($rec->num_rows>0)
		{
			$res=$rec->fetch_assoc();
		}
	else
		{
			echo"error";
		}
if(isset($_POST["submit"]))
{
//print_r($_FILES);
		$sq="update `hotel` set  hname='{$_POST["hname"]}',place='{$_POST["place"]}',location='{$_POST["location"]}',room='{$_POST["room"]}',year='{$_POST["year"]}',star='{$_POST["star"]}',sroom='{$_POST["sroom"]}',droom='{$_POST["droom"]}',asroom='{$_POST["asroom"]}',adroom='{$_POST["adroom"]}' where hid='{$_GET["id"]}'";
			if($con->query($sq))
			{
				if(isset($_FILES["himg"]))
	{
			$target_dir = "uhfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["himg"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["himg"]["tmp_name"], $target_file)) 
				{


					$sql="update `hotel` set  himg='{$target_file}' where hid='{$_GET["id"]}'";
					
					if($con->query($sql))
					{
					
				//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:hoteldetail.php");
					}
					else
					{
					 echo $sql;
					//echo"failed";
					}
				}
			}
			else{
			header("location:hoteldetail.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";

}

	
	if(isset($_FILES["himg1"]))
	{
			$target_dir = "uhfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["himg1"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["himg1"]["tmp_name"], $target_file)) 
				{


					$sql2="update `hotel` set himg1='{$target_file}' where hid='{$res["hid"]}'";
					
					if($con->query($sql2))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:hoteldetail.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:hoteldetail.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}
if(isset($_FILES["himg2"]))
	{
			$target_dir = "uhfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["himg2"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["himg2"]["tmp_name"], $target_file)) 
				{


					$sql3="update `hotel` set himg2='{$target_file}' where hid='{$res["hid"]}'";
					
					if($con->query($sql3))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					
					header("location:hoteldetail.php");
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:hoteldetail.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

if(isset($_FILES["himg3"]))
	{
			$target_dir = "uhfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["himg3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["himg3"]["tmp_name"], $target_file)) 
				{


					$sql4="update `hotel` set himg3='{$target_file}' where hid='{$res["hid"]}'";
					
					if($con->query($sql4))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:hoteldetail.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:hoteldetail.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}			
			}
			else
			{
			 echo $sq;
			}
	
}
$sql8="select * from hotel where hid='{$_GET["id"]}'";
 $res1=$con->query($sql8);
 if($res1->num_rows>0)
 {
	 $rs=$res1->fetch_assoc();
 }
?>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
<div class="col-md-12">
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'>Enter Hotel Details</h1>
<div class="col-md-4">
		<h1 class="on2"> Update Hotel Details</h1>
		<br>
		<div class="form-group">
		<input type="text" id="on2" name="hname" value="<?php echo $rs["hname"]; ?>" placeholder="Enter the Hotel Name" class="form-control">
		<br>
		<input type="text" id="on2" name="place" value="<?php echo $rs["place"]; ?>" placeholder="Enter the Place" class="form-control">
		<br>
		<input type="text" id="on2" name="location"value="<?php echo $rs["location"]; ?>" placeholder="Enter the Location" class="form-control">
		<br>
		<input type="text" id="on2" name="room" value="<?php echo $rs["room"]; ?>" placeholder="Enter the Rooms" class="form-control">
		<br>
		<input type="text" id="on2" name="floor" value="<?php echo $rs["floor"]; ?>" placeholder="Enter the Floors" class="form-control">
		<br>
		<input type="text" id="on2" name="year"value="<?php echo $rs["year"]; ?>" placeholder="Enter the Opening year" class="form-control">
		<br>
		<input type="text" id="on2" name="star" value="<?php echo $rs["star"]; ?>" placeholder="Enter the Star Rating" class="form-control">
		<br>
		
		</div>
</div>
<div class="col-md-4">
		<h1 class="on2">Enter Hotel Images</h1>
		<br>
		<input type="file" id="on2" placeholder="Upload image 1" name="himg" value="<?php echo $rs["himg"]; ?>" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 2" name="himg1"value="<?php echo $rs["himg1"]; ?>" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 3" name="himg2" value="<?php echo $rs["himg2"]; ?>" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 4" name="himg3"value="<?php echo $rs["himg3"]; ?>" class="form-control">
		<br>
</div>
<div class="col-md-4">
		<h1 class="on2">Enter Hotel Room Details</h1>
		<br>
		<input type="text"  id="on2" placeholder=" Single Room" name="sroom" value="<?php echo $rs["sroom"]; ?>"class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder=" Double Room" name="droom" value="<?php echo $rs["droom"]; ?>"class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder=" AC Single Room" name="asroom"value="<?php echo $rs["asroom"]; ?>" class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder="AC Double Room" name="adroom" value="<?php echo $rs["adroom"]; ?>"class="form-control">
		<br>
</div>
</div>
<center>
<input type="submit" class="btn btn-primary" value="save" name="submit">
</center>
</form>


<?php
if(isset($_GET["mes"]))
{
 
echo"<div class='alert alert-success'>{$_GET["mes"]}</div>";
}
?>

</body>

<?php include"footer.php"; ?>
         
</html>