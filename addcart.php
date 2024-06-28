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
 
<?php
include"config.php";
	
		$sql="select * from product inner join addcart on product.sno=addcart.sno  where addcart.addcart='{$_SESSION["uid"]}' group by product.sno";
		
		$res=$con->query($sql);
		
		if($res->num_rows>0)
		{
			while($rec=$res->fetch_assoc())
					{
						echo"
							<div class='col-md-3' style='height:350px; margin:20px 0px'>
								<div class='panel panel-info' style=' border:solid 1px; box-shadow:grey 10px 10px 15px;'>
									<div class='panel-heading' style='background-color:7F7F7F;' ><h3 class='on2'  style='color: style='color:white;';'>{$rec["pname"]}</h3></div>
									<div class='panel-body' style='height:220px;background-color:57F4F8;'><a href='view.php?id={$rec["sno"]}'><img id='img' class=' img-thumbnail' style='height:180; width:240; border-radius:150;' src='{$rec["pic"]}'></a></div>
									<div class='panel-footer' style='background-color:black;height:50px; text-align:center;'><a href='removecart.php?id={$rec["sno"]}' style='color:white;' class='on2'>Remove Cart</a></div>
								</div>
						    </div>";
					}
					
		}
	
		else
		{
		//echo"no product ";
		}

?>
 </body>
 <?php include"footer.php"; ?>
</html>