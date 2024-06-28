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
	if(isset($_GET["mes"]))
	{
	 echo"<h1>{$_GET["mes"]}</h1>";
	}
	?>
	<h1 id="on" style="text-shadow: black 3px 2px 7px;color:black;text-indent:30px;"> Admin Login</h1>
	</center>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	 
	 <h3 id="on2"><span style='color:red;'>1)</span>  Admin Name</h3>
	 <input type="text" name="uname" class="form-control">
	 <h3 id="on2"><span style='color:red;'>2)</span>  Password</h3>
	 <input type="password" name="password" class="form-control">
	 <br>
	 <input type="submit" name="forget" value="forget password" class="btn btn-warning">
	 <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">
	</form>
  <?php
	if(isset($_POST["submit"]))
	{
		$sql="select * from admin where aname='{$_POST["uname"]}' and apass='{$_POST["password"]}'";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
			$rec=$res->fetch_assoc();
			print_r($rec);
			$_SESSION["aid"]=$rec["aid"];
			$_SESSION["aname"]=$rec["aname"];
			header("location:ahome.php");
		}
		else
		{  //echo $sql;
			echo"<div class='alert alert-danger'>Username or password is incorrect</div>";
		}
	}
	?>
	 <?php
	 if(isset($_POST["forget"]))
	 {
        header("location:aforget.php");
	 }
	 ?>
	</div>
	</body>
	<?php
	include"footer.php";
	?>
</html>