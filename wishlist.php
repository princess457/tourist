<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
?>

<body>

<?php
include"nav.php";
include"config.php";?>
<div class='row'>
		<h1 id='on'align='center' style='color:blue;text-shadow: black 1px 5px 5px;'>Place Details</h1>
	
		<?php
		
		$sql="select * from placewish inner join product on placewish.sno=product.sno where placewish.uid='{$_SESSION["uid"]}' group by product.sno ";
		$res=$con->query($sql);
	
		if($res->num_rows>0)
		{
			while($rec=$res->fetch_assoc())
					{
						if($rec["wid"]==$_SESSION["uid"])
						{
							echo"
							<div class='col-md-3'   style='height:350px; margin:20px 0px'>
								<div class='panel panel-info' style=' border:solid 1px; box-shadow:grey 10px 10px 15px;'>
									<div class='panel-heading' style='background-color:7F7F7F;' ><h3 class='on2'  style='color: style='color:white;';'>{$rec["pname"]}</h3></div>
									<div class='panel-body' style='height:200px;background-color:57F4F8;'><a href='view.php?id={$rec["sno"]}'><img id='img' class=' img-thumbnail' style='height:180; width:240; border-radius:150;' src='{$rec["pic"]}'></a></div>
									<div class='panel-footer' style='background-color:black;height:80px;'><h2><a href='cart.php?id={$rec["sno"]}' style='color:white;' class='on2'>Add Cart</a><a href='wishdelete.php?id={$rec["sno"]}'><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></a></h2></div>
							</div>
							</div>";
						}
					}
		}
		else
		{
		//echo"no product ";
		}
		
		?>
</div>
<div class='row'>
<h1 id='on'align='center' style='color:blue;text-shadow: black 1px 5px 5px;'>Restarent Details</h1>

<?php
$sql1="select * from restarentwish inner join restarent on restarentwish.rno=restarent.rno where restarentwish.uid='{$_SESSION["uid"]}' ";
$res1=$con->query($sql1);
	 
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
					echo"<h2><a href='resdelete.php?id={$rec1["rno"]}'><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></a></h2>";
					echo"<h1 class='on2' >Star rating :{$rec1["star"]}<i class='fa fa-star' style='color:gold;'></i></h1>
					<h1 class='on2'><i class='fa-solid fa-location-dot'></i>location  :</h1>
					<a href='resbook.php?id={$rec1["rno"]}'><button id='on2'name='book' class='btn btn-primary' style='border-radius:50px;'>Book</button></a>
					</div>";
$i++;
		}
	}

	?>
</div>
<div class='row'>
			<h1 id='on'align='center' style='color:blue;text-shadow: black 1px 5px 5px;'>Hotel Details</h1>
			<?php 
				$sql4="select * from hotelwish inner join hotel on hotelwish.hid=hotel.hid where hotelwish.uid='{$_SESSION["uid"]}'";
				$res4=$con->query($sql4);
				
				if($res4->num_rows>0)
				{	$j=0;
					while($rec4=$res4->fetch_assoc())
					{	
						if($rec4["wid"]==$_SESSION["uid"])
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
								
								echo"<a href='hoteldelete.php?id={$rec4["hid"]}'><h2><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></h2></a>";
								
								echo"<h1 class='on2' >{$rec4["hname"]}</h1>
								<h1 class='on2' >Star rating :{$rec4["star"]}<i class='fa fa-star' style='color:gold;'></i></h1>
								<h1 class='on2'><i class='fa-solid fa-location-dot'></i>location  :</h1>
								<a href='hotel.php?id={$rec4["hid"]}'><button id='on2' class='btn btn-primary pull-right' style='border-radius:50px;'>View</button></a>
								
						
			</div>";
			$j++;
					}
				}
				}
				else
				{
				//echo "not found";
				}
			?>
 </div>
