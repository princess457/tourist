<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:admin.php?mes=Don't Misuse....!");
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

$sql="select * from registration where uid='{$_GET["id"]}'";
//echo $sql;
$res=$con->query($sql);
if($res->num_rows>0)
{
 
  While($rec=$res->fetch_assoc())
  {
  echo"<div class='row'>
  <center>
  <h1 id='on' style='color:black; box-shadow:10px 10px 50px gold;'>{$rec["uname"]}</h1>
  </center>
  <br>
  <br>
  <br>
	<div class='col-md-6'>
	<img src='{$rec["profile"]}' class='img img-thumbnail' height='500' width='400' >
	</div>
    <div class='col-md-6'>
    <h1 class='on2' >User Id:<span style='color:red;'>  {$rec["uid"]}</span></h1>
    <h1 class='on2' >Place:<span style='color:blue;'>  {$rec["place"]}</span></h1>
    <h1 class='on2' >Date of Birth:<span style='color:blue;'>  {$rec["dob"]}</span></h1>
    <h1 class='on2' >Gender:<span style='color:blue;'>  {$rec["gender"]}</span></h1>
    <h1 class='on2' >Phone NO:<span style='color:blue;'>  {$rec["phoneno"]}</span></h1>
    <h1 class='on2' >E-Mail ID:<span style='color:blue;'> {$rec["email"]}</span></h1>
    <h1 class='on2' >Comments:<span style='color:blue;'>  {$rec["commend"]}</span></h1>
    <h1 class='on2' >About:<span style='color:blue;'>  {$rec["about"]}</span></h1>
	</div>
 </div>";
  
  

 }
}
?>
</div>
</body>
<?php include"footer.php";?>
</html>