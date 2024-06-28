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
$sql1="insert into addcart (addcart,uid,sno) values ('{$d}','{$_SESSION["uid"]}','{$_GET["id"]}')";
if($con->query($sql1))
{		
		$sql="select * from registration where uid={$_SESSION["uid"]}";
		$res=$con->query($sql);
		$rec=$res->fetch_assoc();
		if($rec["visit"]==0)
		{
			$sql2="update registration set visit='1' where uid={$_SESSION["uid"]}";
			if($con->query($sql2))
			{	
					$sql3="update visit set like=('{$_SESSION["uname"]}') where uid={$_SESSION["uid"]}";
					if($con->query($sql3))
					{
						header("location:addcart.php");
					}
					else
					{
						echo $sql3;
					}
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			
			header("location:addcart.php");
		}
}
	
else
{
		echo $sql1;
}

?>
 </body>
 <?php include"footer.php"; ?>
</html>