<html>
<head>
<?php include"header.php";
session_start();

?>
</head>
<body>
<?php include"config.php";?>
<?php include"nav.php";?>
<div class="col-md-offset-2 col-md-8">
<h1 align="center" id="on" style='color:red;text-shadow: black 1px 5px 7px;'> Contact Details </h1>
		
<?php 
$sql="select *from `comment` ";
$res=$con->query($sql);
  if($res->num_rows>0)
  {
    echo"
	    <table class='table table-bordered' >
		<tr>
		    <td class='on2'>S.no</td>
		    <td class='on2'>Name</td>
		    <td class='on2'>Number</td>
		    <td class='on2'>E-mail</td>
		    <td class='on2'>Address</td>
		</tr>";
	$i=1;
	  while($rec=$res->fetch_assoc())
	  {
	   echo"
	    <tr>
		   <td class='on2' >$i)</td>
		   <td class='on2' style='color:blue;'>{$rec["cname"]}</td>
		   <td class='on2' style='color:blue;'>{$rec["number"]}</td>
		   <td class='on2' style='color:blue;'>{$rec["email"]}</td>
		   <td class='on2' style='color:blue;'>{$rec["address"]}</td>";
	    echo"</tr>";
		$i++;
	  }
	 echo"</table>";
  }
?>
</div>
</body>

<?php include"footer.php"; ?>
         
</html>