<?php
session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse....!");
 }
include"config.php";

$sql="SELECT *,product.sno as `sendid` FROM `product` left join placewish on  product.sno=placewish.sno  where product.pname like '%{$_POST["input"]}%' or product.place like '%{$_POST["input"]}%' group by product.sno";
$res=$con->query($sql);

if($res->num_rows>0)
{	
	//echo $sql;
    while($rec=$res->fetch_assoc())
			{
			//print_r($rec);
				echo"
				<div class='col-md-3'   style='height:350px; margin:20px 0px'>
					<div class='panel panel-info' style=' border:solid 1px; box-shadow:grey 10px 10px 15px;'>
				        <div class='panel-heading' style='background-color:7F7F7F;' ><h3 class='on2'  style='color: style='color:white;';'>{$rec["pname"]}</h3></div>
						<div class='panel-body' style='height:200px;background-color:57F4F8;'><a href='view.php?id={$rec["sendid"]}'><img id='img' class=' img-thumbnail' style='height:180; width:240; border-radius:150;' src='{$rec["pic"]}'></a></div>
						<div class='panel-footer' style='background-color:black;height:80px;'><h2><a href='cart.php?id={$rec["sendid"]}' style='color:white;' class='on2'>Add Cart</a>";
						
						
						if($rec["wid"]!=$_SESSION["uid"])
						{
						
						
							echo"<a href='wishproduct.php?id={$rec["sendid"]}'><i  class='btn pull-right fa fa-heart' style='color:white;' ></i></a></h2>";
						}
						else
						{
							echo"<a><i  class='btn pull-right fa fa-heart' style='color:red;' ></i></a></h2>";
						}
						echo"</div>
				   </div>
			   </div>";
			}
}
else
{
 //echo"no product ";
}

?>