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

<div class="col-md-6">
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'> Add Category Details</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
<div class="form-group">

<input type="text" id="on2" name="cname"placeholder="Category Name" class="form-control">
<br>
<input type="file" id="on2" name="cimage" placeholder="Upload image" class="form-control">
</div>
<div class="form-group">
<input type="submit" class="btn btn-warning" name="submit" value="Add category">
<input type="reset" class="btn btn-info" name="cancel" >
</div>
</form>
<?php 
if(isset($_POST["submit"]))
{
	if(isset($_FILES["cimage"]))
	{ // print_r($_FILES);
			$target_dir = "cfile/";
			$target_file = $target_dir .rand(100,999). basename($_FILES["cimage"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif"|| $imageFileType == "jfif" )
			{
		          if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $target_file)) 
				  {

                      
                          $sql="insert into category (cname,cimage) values('{$_POST["cname"]}','{$target_file}')";
                          if($con->query($sql))
                          {
                          
                          echo"<div class='alert alert-success'>Category Added Successfully</div>";
                          }
                          else
                          {
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
<h1 id="on1" style='text-shadow: black 1px 5px 7px;'>Category Details</h1>
<?php
$sql="select * from category";
$res=$con->query($sql);
if($res->num_rows>0)
{
 echo"
 <table class='table table-bordered'>
 <tr>
   <th class='on2'>S.NO</th>
   <th class='on2'>Category Name</th>
   <th class='on2'>Category Image</th>
   <th class='on2'>Update</th>
   <th class='on2'>Delete</th>
 </tr>";
 $i=1;
  While($rec=$res->fetch_assoc())
  {
  echo"<tr>
    <td id='on2'>$i</td>
    <td id='on2'>{$rec["cname"]}</td>
    <td id='on2'><img src='{$rec["cimage"]}' height='80' width='80'></td>
    <td id='on2'><a href='updatecat.php?id={$rec["cno"]}'><i class='fa fa-edit'></i></a></td>
    <td id='on2'><a href='deletecat.php?id={$rec["cno"]}'><i class='fa fa-trash'></i></a></td>
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