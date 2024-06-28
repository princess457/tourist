<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:adminlogin.php?mes=Don't Misuse ....!!");
 }
?>

<body>
<?php include"nav.php";?>
<?php include"config.php";?>


<div class="col-md-offset-2 col-md-8">
		<h1 align="center" id="on" style='color:red;text-shadow: black 5px 10px 10px;'> COMMENTS DETAILS </h1>
		<?php 
			$sql="select * from registration ";
			$res=$con->query($sql);
			if($res->num_rows>0)
			{	
						echo"<table class='table table-bordered'>
						<tr>
						<th class='on2'>S.No</th>
						<th class='on2'>User Name</th>
						<th class='on2'>Visit Details</th>
						<th class='on2'>Commends</th>
						</tr>
					";
					$i=1;
				while($rec=$res->fetch_assoc())
				{
					echo"
					<tr>
						<th class='on2'style='color:brown;'>$i)</th>
						<th class='on2' ><a href='mesmore.php?id={$rec["uid"]}'style='color:blue;'>{$rec["uname"]}</th>";
						if($rec["visit"]==2)
						{
						echo"<th class='on2'style='color:blue;'>Booked</th>";
						}
						else if($rec["visit"]==1)
						{
						echo"<th class='on2' style='color:blue;'>Like</th>";
						}
						else
						{
						echo"<th class='on2' style='color:blue;'>Visiter Only</th>";
						}
					echo"	<th class='on2' style='color:blue;'>{$rec["commend"]}</th>
					</tr>
					";
					$i++;
				}
			}
		?>
</div>
</body>
<?php include"footer.php";?>
     
</html>