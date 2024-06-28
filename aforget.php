<html>
	<head>
	<?php include"header.php";
	session_start();
	?>
	</head>
	<body>
	<?php include"config.php";?>

	<div class="col-md-offset-4 col-md-4">
	
	</center>
	<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
	 
	 <h3 class="on">Admin Name</h3>
	 <input type="text" name="uname" class="form-control">
	 <br>
	 <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">
	</form>
  <?php
	if(isset($_POST["submit"]))
	{
		$sql="select * from admin where aname='{$_POST["uname"]}'";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{   
		    $rec=$res->fetch_assoc();
			header("location:adminpass.php?id={$rec["aid"]}");
		}
		else
		{
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