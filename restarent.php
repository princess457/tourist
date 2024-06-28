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
	
	if(isset($_FILES["rpic"]))
	{
			$target_dir = "rfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic"]["tmp_name"], $target_file)) 
				{


					$sql="insert into restarent (rname,place,star,rpic) values('{$_POST["rname"]}','{$_POST["place"]}','{$_POST["star"]}','{$target_file}')";
					
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

	$sql1="SELECT * FROM `restarent` WHERE rname='{$_POST["rname"]}'";
	$rec=$con->query($sql1);
	if($rec->num_rows>0)
		{
			$res=$rec->fetch_assoc();
			
			
		}
	else
		{
			echo"error";
		}
	if(isset($_FILES["rpic1"]))
	{
			$target_dir = "rfile/";
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
if(isset($_FILES["rpic2"]))
	{
			$target_dir = "rfile/";
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

if(isset($_FILES["rpic3"]))
	{
			$target_dir = "rfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic3"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic3"]["tmp_name"], $target_file)) 
				{


					$sql4="update `restarent` set rpic3='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql4))
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
if(isset($_FILES["rpic4"]))
	{
			$target_dir = "rfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic4"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic4"]["tmp_name"], $target_file)) 
				{


					$sql5="update `restarent` set rpic4='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql5))
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
if(isset($_FILES["rpic5"]))
	{
			$target_dir = "rfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["rpic5"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		if (move_uploaded_file($_FILES["rpic5"]["tmp_name"], $target_file)) 
				{


					$sql6="update `restarent` set rpic5='{$target_file}' where rno='{$res["rno"]}'";
					
					if($con->query($sql6))
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
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'> Restarent Details</h1>
<br>
<input type="text" id="on2" name="rname" placeholder="Restarent Name" class="form-control">
<br>
<input type="text" id="on2" name="place" placeholder="Enter District Name" class="form-control">
<br>
<input type="text" id="on2" name="star" placeholder="Enter Star Rating" class="form-control">
<br>
<input type="file" id="on2" name="rpic"  class="form-control">
<br>
<input type="file" id="on2" name="rpic1" class="form-control">
<br>
<input type="file" id="on2" name="rpic2" class="form-control">
<br>
<input type="file" id="on2" name="rpic3" class="form-control">
<br>
<input type="file" id="on2" name="rpic4" class="form-control">
<br>
<input type="file" id="on2" name="rpic5" class="form-control">
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

<h1 id="on1">Restarent Details</h1>
<?php
$sql='select * from restarent ';
$res=$con->query($sql);
if($res->num_rows>0)
{
 echo"
 <table class='table table-bordered'>
 <tr>
   <th class='on2'>S.NO</th>
   <th class='on2'>Restarent  Name</th>
   <th class='on2'>Place</th>
   <th class='on2'>Star rating</th>
   <th class='on2'>Pic</th>
   <th class='on2'>Pic1</th>
   <th class='on2'>Pic2</th>
   <th class='on2'>Pic3</th>
   <th class='on2'>Pic4</th>
   <th class='on2'>Pic5</th>
   <th class='on2'>Update</th>
   <th class='on2'>Delete</th>
 </tr>";
 $i=1;
  While($rec=$res->fetch_assoc())
  {
  echo"<tr>
    <td id='on2'>$i</td>
    <td id='on2'>{$rec["rname"]}</td>
    <td id='on2'>{$rec["place"]}</td>
    <td id='on2'>{$rec["star"]}</td>
    <td id='on2'><img src='{$rec["rpic"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["rpic1"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["rpic2"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["rpic3"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["rpic4"]}' height='100' width='100'></td>
    <td id='on2'><img src='{$rec["rpic5"]}' height='100' width='100'></td>
    <td id='on2'><a href='updatres.php?id={$rec["rno"]}'><i class='fa fa-edit'></i></a></td>
    <td id='on2'><a href='deleteres.php?id={$rec["rno"]}'><i class='fa fa-trash'></i></a></td>
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