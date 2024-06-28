<html>
	<head>
	<?php include"header.php";
	
	?>
	</head>
	<body>
	<br>
	<br>
	<br>
	<?php include"config.php";?>
	
	<div class="col-md-offset-4 col-md-5">


	<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
	 <h3 class="on">Enter Your New Password</h3>
	 <input type="password" name="password" class="form-control">
	 <br>
	 
	 <input type="submit" name="submit" value="set" class="btn btn-success pull-right">
      
      <?php 
      if(isset($_POST["submit"]))
      {
      $sql="update admin set apass='{$_POST["password"]}' where aid='{$_GET["id"]}' ";
      if($con->query($sql))
      {
      
     
      header("location:adminlogin.php?");
      }
      else
      {
	
       echo"failed";
      }
      }
      ?>	
	</form>
	
	</div>
	</body>
	<?php
	include"footer.php";
	?>
</html>