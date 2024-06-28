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
if(isset($_POST["submit"]))
{
//print_r($_FILES);
	
	if(isset($_FILES["pic"]))
	{
			$target_dir = "pfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["pic"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) 
				{


					$sql="insert into product (pname,cno,place,pic) values('{$_POST["pname"]}','{$_POST["cno"]}','{$_POST["place"]}','{$target_file}')";
					
					if($con->query($sql))
					{
					
				//echo"<div class='alert alert-success'>Product Added Successfully</div>";
					
					
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

	$sql1="SELECT * FROM `product` WHERE pname='{$_POST["pname"]}'";
	$rec=$con->query($sql1);
	if($rec->num_rows>0)
		{
			$res=$rec->fetch_assoc();
			
			
		}
	else
		{
			echo"error";
		}
	if(isset($_FILES["pic1"]))
	{
			$target_dir = "pfile/";
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
			$target_dir = "pfile/";
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
			$target_dir = "pfile/";
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



?>
<form method="post" action="<?php $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'>Enter details</h1>
<br>
<input type="text" id="on2" name="pname" placeholder="Place Name" class="form-control">
<br>
<select name="cno" id="on2" placeholder="Place category" class="form-control">
<option value='' id="on2">Select Category</option>
<?php
	$sql='select *from category ';
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
			while($rec1=$res->fetch_assoc())
			{
				echo"<option id='on2' value='{$rec1["cno"]}'>{$rec1["cname"]}</option>";
			}
		}
?>

</select>
<br>
<input type="text" id="on2" name="place" placeholder="Enter District Name" class="form-control">
<br>
<input type="file" id="on2" name="pic"  class="form-control">
<br>
<input type="file" id="on2" name="pic1" class="form-control">
<br>
<input type="file" id="on2" name="pic2" class="form-control">
<br>
<input type="file" id="on2" class="form-control" name="pic3">
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
<div class="col-md-12">

<h1 id="on1">Place Details</h1>
<?php
$sql='select *,category.cname from product inner join category on product.cno=category.cno ';
$res=$con->query($sql);
if($res->num_rows>0)
{
 echo"
 <table class='table table-bordered'>
 <tr>
   <th class='on2'>S.NO</th>
   <th class='on2'>Place Name</th>
   <th class='on2'>Place category</th>
   <th class='on2'>Place</th>
   <th class='on2'>Pic</th>
   <th class='on2'>Pic1</th>
   <th class='on2'>Pic2</th>
   <th class='on2'>Pic3</th>
   <th class='on2'>Update</th>
   <th class='on2'>Delete</th>
 </tr>";
 $i=1;
  While($rec=$res->fetch_assoc())
  {
  echo"<tr>
    <td id='on2'>$i</td>
    <td id='on2'>{$rec["pname"]}</td>
    <td id='on2'>{$rec["cname"]}</td>
    <td id='on2'>{$rec["place"]}</td>
    <td id='on2'><img src='{$rec["pic"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["pic1"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["pic2"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["pic3"]}' height='100' width='100'></td>
    <td id='on2'><a href='updatplace.php?id={$rec["sno"]}'><i class='fa fa-edit'></i></a></td>
    <td id='on2'><a href='deleteplace.php?id={$rec["sno"]}'><i class='fa fa-trash'></i></a></td>
  </tr>";
  $i++;
  }
  echo"</table>";
 }
  else
  {
  echo"<div class='alert alert-info'>product not found...!</div>";
  }

?>
</div>
</body>

<?php include"footer.php"; ?>
         
</html>