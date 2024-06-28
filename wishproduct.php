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
if(isset($_GET["id"],$_GET["cno"]))
{
$id=$_SESSION["uid"];
$sql1="insert into placewish (wid,uid,sno) values('{$id}','{$_SESSION["uid"]}',{$_GET["id"]})";
//echo $sql1;
if($con->query($sql1))
{		
		$sql="select * from registration where uid={$_SESSION["uid"]}";
		$res=$con->query($sql);
		$rec=$res->fetch_assoc();
		//echo $sql;
		if($rec["visit"]==0)
		{	
				$sql2="update registration set visit='1' where uid={$_SESSION["uid"]}";
				//echo $sql2;
			
				if($con->query($sql2))
				{	
				$sql3="update visit set like=('{$_SESSION["uname"]}') where uid={$_SESSION["uid"]}";
					//echo $sql3;
					if($con->query($sql3))
					{
					
						header("location:viewplace.php?id={$_GET["cno"]}");
					}
				}
				else
				{
				echo $sql3;
				}
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