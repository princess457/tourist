<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 }
 ?>
 <body>
  <?php include"config.php"; ?>
  <?php include"nav.php";
  //print_r($_SESSION);
  ?>
  <h1 align="center" id="on">Welcome <?php echo $_SESSION["uname"]; ?>!! </h1>
  <?php
  $sql='select *from category ';
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
			while($rec=$res->fetch_assoc())
			{
				echo"
				<div class='col-md-3' style='height:350px;'>
				<div class='panel panel-info' style='border:solid 1px; box-shadow:grey 10px 10px 15px;'>
				        <div class='panel-heading' style='background-color:black;'><h3 class='on2' style='color:white;'; >{$rec["cname"]}</h3></div>
						<div class='panel-body' style='height:220px; background-color:B2F9FB;'><a href='viewplace.php?id={$rec["cno"]}'><img id='img'class='img img thumbnail' style='height:180; width:220; border-radius:150;' src='{$rec["cimage"]}'></a></div> 
					 </div>
					 </div>";
			}
		}
  ?>
 </body>
 <?php include"footer.php"; ?>
</html>