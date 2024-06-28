<?php include"config.php";

	session_start();
	$sql="select * from registration where uid='{$_SESSION["uid"]}'";
	$res=$con->query($sql);
	$rec=$res->fetch_assoc();
	if($rec["comid"]==$_SESSION["uid"])
	{
			unset($_SESSION["uid"]);
			unset($_SESSION["uname"]);
			session_destroy();
			header("location:index.php");
	}
	else
	{
		header("location:comment.php");
	}
	?>

	