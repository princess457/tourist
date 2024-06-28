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
if(isset($_GET["id"],$_GET["no"]))
{
	$d=$_SESSION["uid"];
	$sql1="insert into hotelwish (wid,uid,hid)values ('{$d}','{$_SESSION["uid"]}','{$_GET["id"]}')";
	if($con->query($sql1))
	{	
		$sql="update `visit` set `like`=('{$_SESSION["uname"]}') where uid='{$_SESSION["uid"]}'";
		if($con->query($sql))
		{
			header("location:view.php?id={$_GET["no"]}");
		}
		else
		
		{
		echo $sql;
		}
		
	}
	else
	{
			echo $sql1;
	}
}
else
{
	$d=$_SESSION["uid"];
	$sql1="insert into hotelwish (wid,uid,hid)values ('{$d}','{$_SESSION["uid"]}','{$_GET["id"]}')";
	if($con->query($sql1))
	{	
		$sql="update `visit` set `like`=('{$_SESSION["uname"]}') where uid='{$_SESSION["uid"]}'";
		if($con->query($sql))
		{
			header("location:wishlist.php");
		}
		else
		
		{
		echo $sql;
		}
		
	}
	else
	{
			echo $sql1;
	}
}
?>
 </body>
 <?php include"footer.php"; ?>
</html>