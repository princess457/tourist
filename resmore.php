<html>
 <?php  include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:admin.php?mes=Don't Misuse....!");
 }
 ?>
<style>
.col-md-6
{
padding-left:50px;
}
</style>
<body>
<?php include"nav.php";?>
<?php include"config.php";?>
<div >
<?php
if(isset($_GET["mes"]))
{
echo"<div class='alert alert-info'>{$_GET["mes"]}</div>";
}

$sql="select * from restarent where rno='{$_GET["id"]}'";
//echo $sql;
$res=$con->query($sql);
if($res->num_rows>0)
{
 
  While($rec=$res->fetch_assoc())
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
						<div class='item' ><img src='{$rec["rpic4"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
						<div class='item' ><img src='{$rec["rpic5"]}' class='img img-thumbnail' alt='image not found' style='width:100%; height:330px;'></div>
						
					
					</div>
				</div>
	</div>

 <div class='col-md-6'>
    
    <h1 class='on2' >Restarent place:<span style='color:brown;'>{$rec["place"]}</span></h1>
    <h1 class='on2' >Star Rating:<span style='color:brown;'>{$rec["star"]}</span><i class='fa fa-star' style='color:gold;'></i></h1>
	
 </div>";
  
  

 }
}
?>
</div>
</body>
<?php include"footer.php";?>
</html>