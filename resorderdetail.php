<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:adminlogin.php?mes=Don't Misuse....!");
 }
 ?>
 <body>
  <?php include"config.php"; ?>
  <?php include"nav.php";  ?>
  
<?php
 $sql="select *,resbook.rno as `sendid` from resbook  inner join restarent on restarent.rno=resbook.rno where resbook.resno='{$_GET["id"]}'";
 $res=$con->query($sql);
 //echo $sql;
 if($res->num_rows>0)
 {
		while($rec=$res->fetch_assoc())
		{
			echo"<div class='row'>
		<center>
		<h1 id='on' style='color:black; box-shadow:10px 10px 50px gold;'>{$rec["rname"]}</h1>
		</center>
		<br>
		<br>
		<br>
		<div class='col-md-offset-1 col-md-5'>
						<div id='mycarousel1' class='col-md-12 carousel slide' data-ride='carousel'>
							<ol class='carousel-indicators'>
								<li data-target='#mycarousel1' data-slide-to='0' class='active'></li>
								<li data-target='#mycarousel1' data-slide-to='1' class='active'></li>
								<li data-target='#mycarousel1' data-slide-to='2' class='active'></li>
								<li data-target='#mycarousel1' data-slide-to='3' class='active'></li>
								<li data-target='#mycarousel1' data-slide-to='4' class='active'></li>
								<li data-target='#mycarousel1' data-slide-to='5' class='active'></li>
								</ol>
							<div class='carousel-inner'>
								<div class='item active'><img   src='{$rec["rpic"]}' class='img img-thumbnail' alt='image not found'style='width: 100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["rpic1"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["rpic2"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["rpic3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["rpic3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["rpic3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								
							
							</div>
						</div>
			</div>
		
		<div class='col-md-6'>
			
			<h1 class='on2' >Restarent Place:<span style='color:brown;'>{$rec["place"]}</span></h1>
			<h1 class='on2' >Order Date:<span style='color:brown;'>{$rec["rdate"]}</span></h1>
			<h1 class='on2' >Order Time:<span style='color:brown;'>{$rec["rtime"]}</span></h1>
			<h1 class='on2' >Star Rating:<span style='color:brown;'>{$rec["star"]}</span><i class='fa fa-star' style='color:gold;'></i></h1>
			
		</div>";
		
		
		echo"</div>";
		}
}
		?>
  
 </body>
 <?php include"footer.php"; ?>
</html>