<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:adminlogin.php?mes=Don't Misuse ....!!");
 }
?>

<body>
<?php include"nav.php";?>
<?php include"config.php";?>


<?php
if(isset($_POST["submit"]))
{
//print_r($_FILES);
		$sq="update `category` set  cname='{$_POST["cname"]}' where cno='{$_GET["id"]}'";
			if($con->query($sq))
			{
				if(isset($_FILES["cimage"]))
	{
			$target_dir = "ucfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["cimage"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $target_file)) 
				{


					$sql="update `category` set  cimage='{$target_file}' where cno='{$_GET["id"]}'";
					
					if($con->query($sql))
					{
					//echo $sql;
				//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:pcate.php");
					}
					else
					{
					 echo $sql;
					//echo"failed";
					}
				}
			}
			else{
			header("location:pcate.php");
			//echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";

}
}
}
	$sq="select * from category where cno='{$_GET["id"]}'";
	$res=$con->query($sq);
	if($res->num_rows>0)
		{
			$rec=$res->fetch_assoc();
		}
	else
		{
			echo"error";
		}
?>
<div class="col-md-offset-3 col-md-6">
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'> Update Category Details</h1>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
<div class="form-group">

<input type="text" id="on2" name="cname" value="<?php echo $rec["cname"]?>" placeholder="Category Name" class="form-control">
<br>
<input type="file" id="on2" name="cimage"  value="<?php echo $rec["cimage"]?>" placeholder="Upload image" class="form-control">
</div>
<div class="form-group">
<center>
<input type="submit"  class="btn btn-success" name="submit" value="set category">
</center>
</div>
</form>

</div>

<?php
if(isset($_GET["mes"]))
{
echo"<div class='alert alert-info'>{$_GET["mes"]}</div>";
}
?>
</body>
<?php include"footer.php";?>
</html>