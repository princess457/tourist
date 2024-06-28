<html>
	<head>
	<?php include"header.php";
	session_start();
	?>
	<style>

	</style>
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
		$sql="select * from registration where uname='{$_POST["uname"]}' and password='{$_POST["password"]}'";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
			$rec=$res->fetch_assoc();
			//print_r($rec);
			$_SESSION["uid"]=$rec["uid"];
			$_SESSION["uname"]=$rec["uname"];
			header("location:profile.php");
		}
		else
		{
			header("location:rigister.php");
			//echo"<div class='alert alert-danger'>Username or password is incorrect</div>";
		}
	}
	?>
	<?php
	if(isset($_GET["mes"]))
	{
	 echo"<h1>{$_GET["mes"]}</h1>";
	}
	?>

	<h2 id="on1" style='text-shadow: black 3px 2px 7px;color:black;'> User Login</h2>
    
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	 
	 <h3 id="on2"><span style='color:red;'>1)</span> User Name</h3>
	 <input type="text" name="uname" class="form-control">
	 <h3 id="on2"><span style='color:red;'>2)</span> Password</h3>
	 <input type="password" name="password" class="form-control">
	 <br>
	 <input type="submit" name="forget" value="forget password" style="background-color:orange; color:;" class="btn btn-warning">
	 <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
	 <?php
	 if(isset($_POST["forget"]))
	 {
        header("location:uforget.php");
	 }
	 ?>
	</form>

	</div>


	</body>
	<?php
	include"footer.php";
	?>
</html>