
<html>
	<head>
	<?php include"header.php";
	session_start();
	?>

	</head>
	<body>
	<?php include"config.php";?>
	<div>
	<?php include"nav.php";?>
	</div>
	<div class="col-md-offset-4 col-md-4">

	<?php
	
	
	if(isset($_POST["submit"]))
	{
		$sql="Update registration set commend=('{$_POST["commend"]}'),comid=('{$_SESSION["uid"]}') where uid='{$_SESSION["uid"]}'";
		if($con->query($sql))
		{
		
			unset($_SESSION["uid"]);
			unset($_SESSION["uname"]);
			session_destroy();
			header("location:index.php");
		}
		else
		{
			echo "error";
		}
	}
	?>
	<?php
	if(isset($_GET["mes"]))
	{
	 echo"<h1>{$_GET["mes"]}</h1>";
	}
	?>

	<h1 id='on1' style='color:blue;text-shadow: black 1px 5px 5px;'>User Logout</i></h2>
    
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	 
	 <h3 class="on2">COMMEND BOX</h3>
	 <textarea name="commend" class="form-control"></textarea>
	 <br>
	  <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">
	 
	</form>

	</div>


	</body>
	<?php
	include"footer.php";
	?>
</html>