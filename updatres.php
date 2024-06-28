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
<div class="col-md-offset-2 col-md-5">
<?php
$sql1="SELECT * FROM `restarent` WHERE rno='{$_GET["id"]}'";
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
		$sq="update `restarent` set  rname='{$_POST["rname"]}',place='{$_POST["place"]}',star='{$_POST["star"]}' where rno='{$_GET["id"]}'";
			if($con->query($sq))
			{
					if(isset($_FILES["rpic"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic"]["tmp_name"], $target_file)) 
				{


					$sql="update `restarent` set  rpic='{$target_file}' where rno='{$_GET["id"]}'";
					
					if($con->query($sql))
					{
					
				//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:restarent.php");
					}
					else
					{
					 echo $sql;
					//echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

	
	if(isset($_FILES["rpic1"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic1"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic1"]["tmp_name"], $target_file)) 
				{


					$sql2="update `restarent` set rpic1='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql2))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:restarent.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}
if(isset($_FILES["rpic2"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic2"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic2"]["tmp_name"], $target_file)) 
				{


					$sql3="update `restarent` set rpic2='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql3))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					
					header("location:restarent.php");
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

if(isset($_FILES["rpic3"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic3"]["tmp_name"], $target_file)) 
				{


					$sql4="update `restarent` set rpic3='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql4))
					{
					
					echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:restarent.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}
if(isset($_FILES["rpic4"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic4"]["tmp_name"], $target_file)) 
				{


					$sql5="update `restarent` set rpic4='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql5))
					{
					
					echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:restarent.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}
if(isset($_FILES["rpic5"]))
	{
			$target_dir = "urfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic5"]["tmp_name"], $target_file)) 
				{


					$sql6="update `restarent` set rpic5='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql6))
					{
					
					echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:restarent.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			header("location:restarent.php");
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


$sql8="select * from restarent where rno='{$_GET["id"]}'";
 $res1=$con->query($sql8);
 if($res1->num_rows>0)
 {
	 $rec1=$res1->fetch_assoc();
 }
?>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
<h1 id="on1">Enter details</h1>
<br>
<input type="text" id="on2" name="rname" placeholder="Restarent Name" value="<?php echo $rec1["rname"]; ?>"class="form-control">
<br>
<input type="text" id="on2" name="star" placeholder="Restarent Name" value="<?php echo $rec1["star"]; ?>"class="form-control">
<br>
<input type="text" id="on2" name="place" value="<?php echo $rec1["place"]; ?>" placeholder="Enter District Name" class="form-control">
<br>
<input type="file" id="on2" name="rpic" value="<?php echo $rec1["rpic"]; ?>"  class="form-control">
<br>
<input type="file" id="on2" name="rpic1" value="<?php echo $rec1["rpic1"]; ?>" class="form-control">
<br>
<input type="file" id="on2" name="rpic2" value="<?php echo $rec1["rpic2"]; ?>" class="form-control">
<br>
<input type="file" id="on2" name="rpic3" value="<?php echo $rec1["rpic3"]; ?>" class="form-control">
<br>
<input type="file" id="on2" name="rpic4" value="<?php echo $rec1["rpic4"]; ?>" class="form-control">
<br>
<input type="file" id="on2" name="rpic5" value="<?php echo $rec1["rpic5"]; ?>" class="form-control">
<br>
<input type="submit" class="btn btn-primary" value="save" name="submit">
<input type="reset" class="btn btn-info  pull-right" value="cancel">
</form>


<?php
if(isset($_GET["mes"]))
{
 
echo"<div class='alert alert-success'>{$_GET["mes"]}</div>";
}
?>
</div>
</body>

<?php include"footer.php"; ?>
         
</html>