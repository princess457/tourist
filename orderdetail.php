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
 $sql="select *,hotelbook.hid as `sendid` from hotelbook  inner join hotel on hotel.hid=hotelbook.hid where hotelbook.bookno='{$_GET["id"]}'";
 $res=$con->query($sql);
 //echo $sql;
 if($res->num_rows>0)
 {
		while($rec=$res->fetch_assoc())
		{
			echo"<div class='row'>
		<center>
		<h1 id='on' style='color:black; box-shadow:10px 10px 50px gold;'>{$rec["hname"]}</h1>
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
								</ol>
							<div class='carousel-inner'>
								<div class='item active'><img   src='{$rec["himg"]}' class='img img-thumbnail' alt='image not found'style='width: 100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["himg1"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["himg2"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								<div class='item' ><img src='{$rec["himg3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
								
							
							</div>
						</div>
			</div>
		
		<div class='col-md-6'>
			
			<h1 class='on2' >Hotel District:<span style='color:brown;'>{$rec["place"]}</span></h1>
			<h1 class='on2' >place:<span style='color:brown;'>{$rec["location"]}</span></h1>
			<h1 class='on2' >Rooms:<span style='color:brown;'>{$rec["room"]}</span></h1>
			<h1 class='on2' >Floors:<span style='color:brown;'>{$rec["floor"]}</span></h1>
			<h1 class='on2' >Opening Year:<span style='color:brown;'>{$rec["year"]}</span></h1>
			<h1 class='on2' >Star Rating:<span style='color:brown;'>{$rec["star"]}</span><i class='fa fa-star' style='color:gold;'></i></h1>
			
		</div>";
		
		$id=$rec["sendid"];
		echo"</div>";
		}
$sql1="select * from hotel where hid='{$id}'";
$res1=$con->query($sql1); 
	echo"
	<br>
	<br>
	<br>
	<div class='col-md-offset-2 col-md-8'>
	<table class='table table-bordered'>
	<tr>
	<th class='on2'>Single Room</th>
	<th class='on2'>Double Room</th>
	<th class='on2'>Ac single Room</th>
	<th class='on2'>Ac Double Room</th>
	
	</tr>";

		While($rec1=$res1->fetch_assoc())
		{
		echo"<tr>
		
		<td class='on2'>{$rec1["sroom"]}</td>
		<td class='on2'>{$rec1["droom"]}</td>
		<td class='on2'>{$rec1["asroom"]}</td>
		<td class='on2'>{$rec1["adroom"]}</td>
		</tr>
		
		
		</table>";
		}
		echo "<h1 class='on2'>Hotel Booked Amount Is :<span style='color:Blue;'>{$_GET["rate"]}</span></h1>";
}
?>
  
 </body>
 <?php include"footer.php"; ?>
</html>