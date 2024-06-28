<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:admin.php?mes=Don't Misuse ....!!");
 }
?>

<body>

<?php
include"nav.php";
include"config.php";?>
<div class='row'>
	<div class='col-md-3'>
	<h1 id='on'align='center'  style='color:red;text-shadow: black 1px 5px 7px;'>Restarent Name</h1>
	<?php
	
		$sql1="select *,restarent.rno as `sendno` from restarentwish inner join restarent on restarentwish.rno=restarent.rno group by restarent.rno ";
		$res1=$con->query($sql1);
		//echo $sql1;
	if($res1->num_rows>0)
	{	
	$i=1;
		while($rec1=$res1->fetch_assoc())
		{
			echo"<a href='resmore.php?id={$rec1["sendno"]}'><h1 class='on2'>$i)<span style='color:blue;'> {$rec1["rname"]}</span></h1></a>";
			$i++;
		}
		
	}
	
	?>
	<h1 id='on' align='center' style='color:red;text-shadow: black 1px 5px 7px;'>Hotel Details</h1>
			<?php 
				$sql4="select *,hotel.hid as `sendid` from hotelwish inner join hotel on hotelwish.hid=hotel.hid group by hotel.hid ";
				$res4=$con->query($sql4);
				//echo $sql4;
				if($res4->num_rows>0)
				{	$j=1;
					while($rec4=$res4->fetch_assoc())
					{	
					
						echo"<a href='hotelmore.php?id={$rec4["sendid"]}'><h1 class='on2'>$j)<span style='color:blue;'> {$rec4["hname"]}</span></h1></a>";
						$j++;
					}
					
				}
				?>
	
	</div>
	<div class='col-md-9'>
		<h1 id='on'align='center'style='color:red;text-shadow: black 1px 5px 7px;'>Place Details</h1>
		<?php
		
		$sql="select * from placewish inner join product on placewish.sno=product.sno group by product.sno ";
		$res=$con->query($sql);
	
		if($res->num_rows>0)
		{
			while($rec=$res->fetch_assoc())
					{
						
							echo"
							<div class='col-md-3'   style='height:250px; margin:20px 0px'>
								<div class='panel panel-info' style=' border:solid 1px; box-shadow:grey 10px 10px 15px;'>
									<div class='panel-heading' style='background-color:7F7F7F;' ><h3 class='on2'  style='color: style='color:white;';'>{$rec["pname"]}</h3></div>
									<div class='panel-body' style='height:180px;background-color:57F4F8;'><a><img id='img' class=' img-thumbnail' style='height:150; width:240; border-radius:150;' src='{$rec["pic"]}'></a></div>
									
							</div>
							</div>";
						
					}
		}
		else
		{
		//echo"no product ";
		}
		
		?>
		</div>
		
</body>			
</html>