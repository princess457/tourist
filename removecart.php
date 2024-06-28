<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 }
 ?>
 <body>
  <?php include"config.php"; ?>
  <?php include"nav.php";
  //print_r($_SESSION);
  ?>
 
<?php
include"config.php";
$sql1="DELETE FROM `addcart` WHERE sno='{$_GET["id"]}'";
if($con->query($sql1))
{		
header("location:addcart.php");		
}	
		
?>
 </body>
 <?php include"footer.php"; ?>
</html>