<html>
	<head>
	<?php include"header.php";
	 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 } 
	?>
	</head>
	<body>
	<br>
	<br>
	<br>
	<?php include"config.php";?>
	
	<div class="col-md-offset-4 col-md-5">

	<h3 id='on'>Enter Your booked Date & Time</h3>
	<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
	 <h3 id="on1"> Restarent Date</h3>
	 <input type="date" name="rdate" class="form-control">
	  <h3 id="on1">Restarent Time</h3>
	 <input type="time" name="rtime" class="form-control">
	 <br>
	 
	 <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">
      

 <?php
if(isset($_POST["submit"]))
{ 
	$sql1="select * from restarent where rno={$_GET["id"]}";
	$res1=$con->query($sql1);
	$rec1=$res1->fetch_assoc();
	
	
	$sql="insert into resbook (rno,uid,rdate,rtime,res,place) values('{$_GET["id"]}','{$_SESSION["uid"]}','{$_POST["rdate"]}','{$_POST["rtime"]}','{$rec1["rname"]}','{$rec1["place"]}') "; 
			if($con->query($sql))
			{
				$sql="select * from registration where uid={$_SESSION["uid"]}";
				$res=$con->query($sql);
				$rec=$res->fetch_assoc();
				if($rec["visit"]==1||$rec["visit"]==0)
				{
					$sql2="update registration set visit='{$_SERVER["uname"]}' where uid={$_SESSION["uid"]}";
					if($con->query($sql2))
					{
							header("location:book.php");
					}
					else
					{
						echo $sql2;
					}
				}
			}
			else
			{
			echo $sql;
			}
}			
?>