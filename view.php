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
 <div class="row">
  <?php
  $sql="select *from product where sno='{$_GET["id"]}'";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
			while($rec=$res->fetch_assoc())
			{
				echo"<div>
				
				<h1 id='on1' align='center'>{$rec["pname"]}</h1>
				<div id='mycarousel' class='col-md-offset-2 col-md-8 carousel slide' data-ride='carousel' >
					<ol class='carousel-indicators'>
						<li data-target='#mycarousel' data-slide-to='0' class='active'></li>
						<li data-target='#mycarousel' data-slide-to='1' class='active'></li>
						<li data-target='#mycarousel' data-slide-to='2' class='active'></li>
						<li data-target='#mycarousel' data-slide-to='3' class='active'></li>
					</ol>
					<div class=' carousel-inner' style='border:solid 2px; border-radius:50px;' >
						<div class='item active'><img src='{$rec["pic"]}' alt='image not found'style='width:100%;height:330px;'></div>
						<div class='item'><img src='{$rec["pic1"]}' alt='image not found' style='width:100%; height:330px;'></div>
						<div class='item'><img src='{$rec["pic2"]}' alt='image not found' style='width:100%; height:330px;'></div>
						<div class='item'><img src='{$rec["pic3"]}' alt='image not found' style='width:100%; height:330px;'></div>
					<a class='left carousel-control' href='#mycarousel' role='button' data-slide='prev'>
						<span class='glyphicon glyphicon-chevron-left'></span>
						<span class='sr-only'>Previous</span>
					</a>
				    <a class='right carousel-control' href='#mycarousel' role='button' data-slide='next'>
						<span class='glyphicon glyphicon-chevron-right'></span>
						<span class='sr-only'>Next</span>
					</a>
					</div>
				</div>
				</div>
				<br>";
			}
		}
	
	
  ?>
  </div>
  <br>
  <br>
  <h1 id="on1" style="text-indent:20px;">Restarents Details :</h1>
  <div class="col-md-12">
  <?php
  $sql2="select * from product where sno='{$_GET["id"]}'";
	$res2=$con->query($sql2);
	
	if($res2->num_rows>0)
	{
		$rec2=$res2->fetch_assoc();
	
	}
	$sql1="select *,restarent.rno as `sendid` from restarent left join restarentwish on restarent.rno=restarentwish.rno where place='{$rec2["place"]}' group by restarent.rno";
	$res1=$con->query($sql1);
	//echo $sql1;
	if($res1->num_rows>0)
	{	$i=0;
		while($rec1=$res1->fetch_assoc())
		{	
			echo "
		<div class='col-md-4' style='width:45%; border:solid 1px black; margin:20px 10px; padding:10px 5px;background:skyblue;box-shadow:10px 10px 15px black;'>
					
			<div class='col-md-6'>
				<div id='mycarousel1' class='carousel slide' data-ride='carousel'>
					<ol class='carousel-indicators'>
						<li data-target='#mycarousel1' data-slide-to='0' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='1' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='2' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='3' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='4' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='5' class='active'></li>
					</ol>
					<div class='carousel-inner'>
						<div class='item active'><img   src='{$rec1["rpic"]}' class='img img-thumbnail' alt='image not found'style='width: 100%; height:220px;'></div>
						<div class='item'><img src='{$rec1["rpic1"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec1["rpic2"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec1["rpic3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec1["rpic4"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec1["rpic5"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
				
					</a>
					</div>
				</div>
			
	</div>";
			
					echo"<h1 class='on2' >{$rec1["rname"]}</h1>";
					
					if($rec1["wid"]!=$_SESSION["uid"])
						{
						echo"<h2><a href='wishres.php?id={$rec1["sendid"]}&&return={$_GET["id"]}'><i  class='btn pull-right fa fa-heart' style='color:white;' ></i></a></h2>";
						}
						else
						{
							echo"<h2><a href='resdelete.php?id={$rec1["sendid"]}&&return={$_GET["id"]}'><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></a></h2>";
						}
					echo"<h1 class='on2' >Star rating :{$rec1["star"]}<i class='fa fa-star' style='color:gold;'></i></h1>
					<h1 class='on2'><i class='fa-solid fa-location-dot'></i>location  :</h1>
					<a href='resbook.php?id={$rec1["sendid"]}'><button id='on2'name='book' class='btn btn-primary' style='border-radius:50px;'>Book</button></a>
					</div>";
$i++;
		}
	}

	
  ?>
  </div>
  <br>
  <br>
  <h1 id="on1" style="text-indent:20px;">Hotel Details :</h1>
  <div class="col-md-12">
  <?php
  $sql3="select * from product where sno='{$_GET["id"]}'";
	$res3=$con->query($sql3);
	
	if($res3->num_rows>0)
	{
		$rec3=$res3->fetch_assoc();
	
	}
	$sql4="select *,hotel.hid as `sendid` from hotel left join hotelwish on hotel.hid=hotelwish.hid where hotel.place='{$rec3["place"]}' group by hotel.hid";
	$res4=$con->query($sql4);
	
	if($res4->num_rows>0)
	{	$j=0;
		while($rec4=$res4->fetch_assoc())
		{	
			echo "
		<div class='col-md-4' style='width:45%; border:solid 1px black; margin:20px 10px; padding:10px 5px;background:skyblue;box-shadow:10px 10px 15px black;'>
					
			<div class='col-md-6'>
				<div id='mycarousel2' class='carousel slide' data-ride='carousel'>
					<ol class='carousel-indicators'>
						<li data-target='#mycarousel1' data-slide-to='0' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='1' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='2' class='active'></li>
						<li data-target='#mycarousel1' data-slide-to='3' class='active'></li>
						
					</ol>
					<div class='carousel-inner'>
						<div class='item active'><img   src='{$rec4["himg"]}' class='img img-thumbnail' alt='image not found'style='width: 100%; height:220px;'></div>
						<div class='item'><img src='{$rec4["himg1"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec4["himg2"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						<div class='item'><img src='{$rec4["himg3"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:220px;'></div>
						
					</a>
					</div>
				</div>
			
	</div>";
				
					if($rec4["wid"]==$_SESSION["uid"])
					{
					echo"<h2><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></h2>";
					}
					else
					{
					echo"<a href='wish.php?id={$rec4["sendid"]}&&no={$_GET["id"]}'><h2><i  class='btn pull-right fa fa-heart' style='color:white;' ></i></h2></a>";
					}
					echo"<h1 class='on2' >{$rec4["hname"]}</h1>
					<h1 class='on2' >Star rating :{$rec4["star"]}<i class='fa fa-star' style='color:gold;'></i></h1>
					<h1 class='on2'><i class='fa-solid fa-location-dot'></i>location  :</h1>
					<a href='hotel.php?id={$rec4["sendid"]}'><button id='on2' class='btn btn-primary pull-right' style='border-radius:50px;'>View</button></a>
					
			
</div>";
$j++;
		}
	}
  ?>
  </div>
 </body>

 
 <?php include"footer.php"; ?>

</html>
  