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
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
<div class="col-md-12">
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'>Enter Hotel Details</h1>
<div class="col-md-4">
		<h1 class="on2"> Add Hotel Details</h1>
		<br>
		<div class="form-group">
		<input type="text" id="on2" name="hname" placeholder="Enter the Hotel Name" class="form-control">
		<br>
		<input type="text" id="on2" name="place" placeholder="Enter the Place" class="form-control">
		<br>
		<input type="text" id="on2" name="location" placeholder="Enter the Location" class="form-control">
		<br>
		<input type="text" id="on2" name="room" placeholder="Enter the Rooms" class="form-control">
		<br>
		<input type="text" id="on2" name="floor" placeholder="Enter the Floors" class="form-control">
		<br>
		<input type="text" id="on2" name="year" placeholder="Enter the Opening year" class="form-control">
		<br>
		<input type="text" id="on2" name="star" placeholder="Enter the Star Rating" class="form-control">
		<br>
		
		</div>
</div>
<div class="col-md-4">
		<h1 class="on2">Enter Hotel Images</h1>
		<br>
		<input type="file" id="on2" placeholder="Upload image 1" name="himg" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 2" name="himg1" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 3" name="himg2" class="form-control">
		<br>
		<input type="file" id="on2" placeholder="Upload image 4" name="himg3" class="form-control">
		<br>
</div>
<div class="col-md-4">
		<h1 class="on2">Enter Hotel Room Details</h1>
		<br>
		<input type="text"  id="on2" placeholder=" Single Room" name="sroom" class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder=" Double Room" name="droom" class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder=" AC Single Room" name="asroom" class="form-control">
		<br>
		
		<input type="text"  id="on2" placeholder="AC Double Room" name="adroom" class="form-control">
		<br>
</div>
</div>
<div class="col-md-offset-5 col-md-5">
<input type="submit" class="btn btn-primary " id="on2" name="submit" value="Insert">
</div>
</form>
<?php 
if(isset($_POST["submit"]))
{
	if(isset($_FILES["himg"]))
	{ // print_r($_FILES);
			$target_dir = "hfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["himg"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		          if (move_uploaded_file($_FILES["himg"]["tmp_name"], $target_file)) 
				  {

							$sql="insert into hotel(`hname`, `place`, `location`, `room`, `floor`, `year`, `star`, `himg`,`sroom`, `droom`, `asroom`, `adroom`) VALUES ('{$_POST["hname"]}','{$_POST["place"]}','{$_POST["location"]}','{$_POST["room"]}','{$_POST["floor"]}','{$_POST["year"]}','{$_POST["star"]}','{$target_file}','{$_POST["sroom"]}','{$_POST["droom"]}','{$_POST["asroom"]}','{$_POST["adroom"]}')";
                          if($con->query($sql))
                          {
                          
                          echo"<div class='alert alert-success'>Category Added Successfully</div>";
                          }
                          else
                          {
						   echo $sql;
                           echo"failed";
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
$sql1="SELECT * FROM `hotel` WHERE hname='{$_POST["hname"]}'";
	$rec=$con->query($sql1);
	if($rec->num_rows>0)
		{
			$res=$rec->fetch_assoc();
			
			
		}
	else
		{
			echo"error";
		}
		
	if(isset($_FILES["himg1"]))
	{
			$target_dir = "hfile/";
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
if(isset($_FILES["himg2"]))
	{
			$target_dir = "hfile/";
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
if(isset($_FILES["himg3"]))
	{
			$target_dir = "hfile/";
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
</div>
<div class="col-md-6">
<?php
if(isset($_GET["mes"]))
{
echo"<div class='alert alert-info'>{$_GET["mes"]}</div>";
}
?>
<h1 id="on1">Hotel Details</h1>
<?php
$sql="select * from hotel";
$res=$con->query($sql);
if($res->num_rows>0)
{
 echo"
 <table class='table table-bordered'>
 <tr>
   <th class='on2'>S.NO</th>
   <th class='on2'>Hotel Name</th>
   <th class='on2'>District</th>
   <th class='on2'>Location</th>
   <th class='on2'>Rooms</th>
   <th class='on2'>Floors</th>
   <th class='on2'>Opening Year</th>
   <th class='on2'>Star Rating</th>
   <th class='on2'>img</th>
   <th class='on2'>img1</th>
   <th class='on2'>img2</th>
   <th class='on2'>img3</th>
   <th class='on2'>Single Room</th>
   <th class='on2'>Double Room</th>
   <th class='on2'>Ac single Room</th>
   <th class='on2'>Ac Double Room</th>
   <th class='on2'>Update</th>
   <th class='on2'>Delete</th>
 </tr>";
 $i=1;
  While($rec=$res->fetch_assoc())
  {
  echo"<tr>
    <td class='on2' style='color:brown;'>$i</td>
    <td class='on2' style='color:blue;'>{$rec["hname"]}</td>
    <td class='on2' style='color:blue;'>{$rec["place"]}</td>
    <td class='on2' style='color:blue;'>{$rec["location"]}</td>
    <td class='on2' style='color:blue;'>{$rec["room"]}</td>
    <td class='on2' style='color:blue;'>{$rec["floor"]}</td>
    <td class='on2' style='color:blue;'>{$rec["year"]}</td>
    <td class='on2' style='color:blue;'>{$rec["star"]}</td>
    <td class='on2' style='color:blue;'><img src='{$rec["himg"]}' height='80' width='80'></td>
    <td class='on2' style='color:blue;'><img src='{$rec["himg1"]}' height='80' width='80'></td>
    <td class='on2' style='color:blue;'><img src='{$rec["himg2"]}' height='80' width='80'></td>
    <td class='on2' style='color:blue;'><img src='{$rec["himg3"]}' height='80' width='80'></td>
	<td class='on2' style='color:blue;'>{$rec["sroom"]}</td>
	<td class='on2' style='color:blue;'>{$rec["droom"]}</td>
	<td class='on2' style='color:blue;'>{$rec["asroom"]}</td>
	<td class='on2' style='color:blue;'>{$rec["adroom"]}</td>
    <td class='on2' style='color:blue;'><a href='updatehotel.php?id={$rec["hid"]}'><i class='fa fa-edit'></i></a></td>
    <td class='on2' style='color:blue;'><a href='deletehotel.php?id={$rec["hid"]}'><i class='fa fa-trash'></i></a></td>
  </tr>";
  $i++;
  }
  echo"</table>";
 }
  else
  {
  echo"<div class='alert alert-info'>Category not found...!</div>";
  }

?>
</div>
</body>
<?php include"footer.php";?>
</html>