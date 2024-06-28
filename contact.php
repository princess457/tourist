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
	<h1 id="on" style="text-shadow: black 3px 2px 7px;color:black;text-indent:30px;">Contact Details</h1>
	</center>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	 
	 <h3 id="on2"><span style='color:red;'>1)</span>  User Name</h3>
	 <input type="text" name="cname" class="form-control">
	  <h3 id="on2"><span style='color:red;'>2)</span>  E-mail</h3>
	 <input type="email" name="email" class="form-control">
	  <h3 id="on2"><span style='color:red;'>3)</span>  Phone Number</h3>
	 <input type="number" name="number" class="form-control">
	 <h3 id='on2'><span style='color:red;'>4)</span>  Address</h3>
	 <textarea id='on3' class='form-control' name='address' ></textarea>
	 <br>
	 <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">
	</form>
  <?php
	if(isset($_POST["submit"]))
	{
		$sql="insert into comment (cname,email,number,address) values ('{$_POST["cname"]}','{$_POST["email"]}','{$_POST["number"]}','{$_POST["address"]}')";
		echo $sql;
		if($con->query($sql))
		{
			header("location:index.php");
		}
		else
		{  //echo $sql;
			echo"<div class='alert alert-danger'>Username or password is incorrect</div>";
		}
	}
?>
	</div>
	</body>
	<?php
	include"footer.php";
	?>
</html>