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
$sql1="SELECT * FROM `product` WHERE sno='{$_GET["id"]}'";
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
		$sq="update `product` set  pname='{$_POST["pname"]}',cno='{$_POST["cno"]}',place='{$_POST["place"]}' where sno='{$_GET["id"]}'";
			if($con->query($sq))
			{
				header("location:aplace.php");
				//echo $sq;				
			}
			else
			{
			 echo $sq;
			}
	if(isset($_FILES["pic"]))
	{
			$target_dir = "upfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["pic"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) 
				{


					$sql="update `product` set  pic='{$target_file}' where sno='{$_GET["id"]}'";
					
					if($con->query($sql))
					{
					
				//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					//header("location:aplace.php");
					}
					else
					{
					 echo $sql;
					//echo"failed";
					}
				}
			}
			else{
			
			echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

	
	if(isset($_FILES["pic1"]))
	{
			$target_dir = "upfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["pic1"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file)) 
				{


					$sql2="update `product` set pic1='{$target_file}' where sno='{$res["sno"]}'";
					
					if($con->query($sql2))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					//header("location:aplace.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			
			echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}
if(isset($_FILES["pic2"]))
	{
			$target_dir = "upfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["pic2"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file)) 
				{


					$sql3="update `product` set pic2='{$target_file}' where sno='{$res["sno"]}'";
					
					if($con->query($sql3))
					{
					
					//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					
					//header("location:aplace.php");
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			
			echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

if(isset($_FILES["pic3"]))
	{
			$target_dir = "upfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["pic3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["pic3"]["tmp_name"], $target_file)) 
				{


					$sql4="update `product` set pic3='{$target_file}' where sno='{$res["sno"]}'";
					
					if($con->query($sql4))
					{
					
					echo"<div class='alert alert-success'>Product Added Successfully</div>";
					header("location:aplace.php");
					
					}
					else
					{
					echo"failed";
					}
				}
			}
			else{
			
			echo"<div class='alert alert-info'>Please Upload Image Only</div>";
			}
}
else
{

echo"<div class='alert alert-info'>file upload error</div>";
}

}


$sql5="select *,category.cname from product inner join category on product.cno=category.cno where sno='{$_GET["id"]}'";
 $res1=$con->query($sql5);
 if($res1->num_rows>0)
 {
	 $rec1=$res1->fetch_assoc();
 }
?>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
<h1 id="on1">Enter details</h1>
<br>
<input type="text" id="on2" name="pname" placeholder="Place Name" value="<?php echo $rec1["pname"]; ?>"class="form-control">
<br>
<select name="cno" id="on2" placeholder="Place category" class="form-control">
<option value="<?php echo $rec1["cno"]; ?>" id="on2"><?php echo $rec1["cno"]; ?><?php echo $rec1["cname"]; ?></option>
<?php
	$sql6='select *from category ';
		$res2=$con->query($sql6);
		if($res2->num_rows>0)
		{
			while($rec2=$res2->fetch_assoc())
			{
				echo"<option id='on2' value='{$rec2["cno"]}'> {$rec2["cno"]}{$rec2["cname"]}</option>";
			}
		}
?>

</select>
<br>
<input type="text" id="on2" name="place" value="<?php echo $rec1["place"]; ?>" placeholder="Enter District Name" class="form-control">
<br>
<input type="file" id="on2" name="pic" value="<?php echo $rec1["pic"]; ?>"  class="form-control">
<br>
<input type="file" id="on2" name="pic1" value="<?php echo $rec1["pic1"]; ?>" class="form-control">
<br>
<input type="file" id="on2" name="pic2" value="<?php echo $rec1["pic2"]; ?>" class="form-control">
<br>
<input type="file" id="on2" class="form-control" value="<?php echo $rec1["pic3"]; ?>" name="pic3">
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