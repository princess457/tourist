<html>
	<head>
	<?php include"header.php";
	session_start();
	?>
	</head>
	<body >
	<?php include"config.php";?>
	<div>
	<?php include"nav.php";?>
	</div>
	<div class="col-md-offset-4 col-md-4">
	<center>
	<?php
	if(isset($_POST["submit"]))
	{
		if($_POST["password"]==$_POST["cpassword"])
		{
		$sql="insert into registration (first,last,place,dob,gender,phoneno,
		email,uname,password) values('{$_POST["first"]}','{$_POST["last"]}',
		'{$_POST["place"]}','{$_POST["dob"]}','{$_POST["gender"]}',
		'{$_POST["phoneno"]}','{$_POST["email"]}',
		'{$_POST["uname"]}','{$_POST["password"]}')";
	  if($con->query($sql))
	  {
			
			header("location:userlogin.php");
			
	  }
	  else
	  {
	   echo"<div class='alert alert-danger'>try again....!</div>";
	  }
	  }
	  else{
		 echo"<div class='alert alert-info'>Password Mismatch</div>";
	  }
	  $sql2="select * from registration where dob='{$_POST["dob"]}'and gender='{$_POST["gender"]}'";
	  $res2=$con->query($sql2);
	  $rec2=$res2->fetch_assoc();
	  $sql1="insert into `visit` (uid,uname) values ('{$rec2["uid"]}','{$rec2["uname"]}') ";
	  $res1=$con->query($sql1);
	  
	}
	?>
	<h1 id="on1" style='text-shadow: black 3px 2px 7px;color:black;'>Registration</h1>
	</center>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	 <label id="on2"><span style='color:red;'>1)</span>  First Name</label>
	 <input type="text" name="first" class="form-control">
	 <label id="on2"><span style='color:red;'>2)</span>  Last Name</label>
	 <input type="text" name="last" class="form-control">
	 <label id="on2"><span style='color:red;'>3)</span>  Which place you </label>
	 <input type="text" name="place" class="form-control">
	 <label id="on2"><span style='color:red;'>4)</span>  Date of Birth</label>
	 <input type="date" name="dob" class="form-control">
	 <label id="on2"><span style='color:red;'>5)</span>  Gender</label>
	 <input type="radio" name="gender"value="male"><span id="on2">Male</span>
	 <input type="radio" name="gender"value="female"><span id="on2">Female</span>
	 <br>
	 <label id="on2"><span style='color:red;'>6)</span>  phone number</label>
	 <input type="text" name="phoneno"  class="form-control">
	 <label id="on2"><span style='color:red;'>7)</span>  E-mail</label>
	 <input type="email" name="email" class="form-control">
	 <label id="on2"><span style='color:red;'>8)</span>  User Name</label>
	 <input type="text" name="uname" class="form-control">
	 <label id="on2"><span style='color:red;'>9)</span>  Password</label>
	 <input type="password" name="password" class="form-control">
	<label id="on2"><span style='color:red;'>10)</span>  Confirm Password</label>
	 <input type="password" name="cpassword" class="form-control">
	 <br>
	 <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
	</form>
	
	</div>
	</body>
	<?php
	include"footer.php";
	?>
</html>