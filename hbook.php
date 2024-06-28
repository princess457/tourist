
 <?php
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 }
include"config.php";

$d=date('y-m-d');
$sql1="insert into hotelbook (hid,uid,rate,date) values('{$_GET["id"]}','{$_SESSION["uid"]}','{$_GET["rate"]}','{$d}') "; 
		echo $sql1;
		if($con->query($sql1))
		{
					$sql="select * from registration where uid='{$_SESSION["uid"]}'";
					$res=$con->query($sql);
					
					$rec=$res->fetch_assoc();
					
					if($rec["visit"]==1||$rec["visit"]==0)
						{
								header("location:book.php");
						}
						else
						{
							echo "error";
						}
					}
					else
					{		//echo $sql;
							//header("location:book.php");
					}						
?>