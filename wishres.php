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
$d=$_SESSION["uid"];

$sql1="insert into restarentwish (wid,uid,rno) values ('{$d}','{$_SESSION["uid"]}','{$_GET["id"]}')";
//echo $sql1;
if($con->query($sql1))
{		
	if(isset($_GET["return"]))
		{	
			//echo $sql1;
			$sql="update `visit` set `like`=('{$_SESSION["uname"]}') where uid={$_SESSION["uid"]}";
			if($con->query($sql))
			{
					header("location:view.php?id={$_GET["return"]}");
			}
		

		}
		else
		{
			header("location:search.php");
		}
}
	
else
{
		//echo"no product ";
}

?>
 </body>
 <?php include"footer.php"; ?>
</html>