<html>
	<head>
	<?php include"header.php";
	session_start();

	?>
	</head>
	<body>
	<?php include"config.php";?>
	
	
	</div>
	<div class='row'>
		<h1 id='on1' align='center'style='color:red;text-shadow: black 1px 5px 5px;'>Forget Password</i></h2>

	</div>
	<div class="col-md-offset-4 col-md-4">

	<?php
	if(isset($_POST["submit"]))
	{
		$sql="select * from registration where uname='{$_POST["uname"]}' and phoneno='{$_POST["phoneno"]}' and dob='{$_POST["dob"]}'";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{  
		   
			$rec=$res->fetch_assoc();
			header("location:userpass.php?id={$rec["uid"]}");
		}
		else
		{
			echo"<div class='alert alert-danger'>Username or phone number is incorrect</div>";
		}
	}
	?>
	<?php
	if(isset($_GET["mes"]))
	{
	 echo"<h1>{$_GET["mes"]}</h1>";
	}
	?>
	
	<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
	 
	 <h3 class="on2">1)<span style='color:blue;'>  User Name</span> </h3>
	 <input type="text" name="uname" class="form-control">
	 <h3 class="on2">2)<span style='color:blue;'>  phone Number</span></h3>
	 <input type="text" name="phoneno" class="form-control">
	  <h3 class="on2">3)<span style='color:blue;'>  DOB</span></h3>
	   <input type="date" name="dob" class="form-control">
	 <br>
	 
	 <input type="submit" name="submit" value="submit" class="btn btn-success pull-right" style='backkground:green;color:white;'>
	
	</form>
	
	</div>
	</body>
	<?php
	include"footer.php";
	?>
</html>