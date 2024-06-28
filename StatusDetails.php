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
<h1 id='on'align='center' style='color:blue;text-shadow: black 1px 5px 5px;'>Status Details</h1>
	
<?php 

$sql="select *from `hotelbook` inner join hotel on hotelbook.hid=hotel.hid where hotelbook.uid='{$_SESSION["uid"]}'";
$res=$con->query($sql);
	//echo $sql;
  if($res->num_rows>0)
  {
    echo"
	    <table class='table table-bordered' >
		<tr>
		    <td class='on2' style='color:610254;'>S.no</td>
		    <td class='on2' style='color:610254;'>Date</td>
		    <td class='on2' style='color:610254;'>Hotel Name</td>
		    <td class='on2' style='color:610254;'>Bill amount</td>
		    <td class='on2' style='color:610254;'>status</td>
		</tr>";
	$i=1;
	  while($rec=$res->fetch_assoc())
	  {
	   echo"
	    <tr>
		   <td class='on2' >$i)</td>
		   <td class='on2' style='color:DC0000;'>{$rec["date"]}</td>
		   <td class='on2' style='color:DC0000;'>{$rec["hname"]}</td>
		   <td class='on2' style='color:BD3AE0;'>{$rec["rate"]}</td>";
		   if($rec["status"]=="1")
		   {
		   echo"<td class='on2' style='color:green'>Order comform</td>";
		   }
		   else
		   {
		   echo"<td class='on2' style='color:red'>Order pending</td>";
		   }
	    echo"</tr>";
		$i++;
	  }
	 echo"</table>";
  }
  
$sqlr="select *from `resbook` inner join restarent on resbook.rno=restarent.rno where resbook.uid='{$_SESSION["uid"]}'";
$resr=$con->query($sqlr);
	//echo $sqlr;
  if($resr->num_rows>0)
  {
    echo"
	    <table class='table table-bordered' >
		<tr>
		    <td class='on2' style='color:610254;'>S.no</td>
		    <td class='on2' style='color:610254;'>Restarent Name</td>
		    <td class='on2' style='color:610254;'>Place</td>
		    <td class='on2' style='color:610254;'>Date</td>
		    <td class='on2' style='color:610254;'>Time</td>
		    <td class='on2' style='color:610254;'>status</td>
		</tr>";
	$i=1;
	  while($recr=$resr->fetch_assoc())
	  {
	   echo"
	    <tr>
		   <td class='on2' >$i)</td>
		   <td class='on2' style='color:DC0000;'>{$recr["res"]}</td>
		   <td class='on2' style='color:DC0000;'>{$recr["place"]}</td>
		   <td class='on2' style='color:BD3AE0;'>{$recr["rdate"]}</td>;
		   <td class='on2' style='color:BD3AE0;'>{$recr["rtime"]}</td>";
		   if($rec["rstatus"]=="1")
		   {
		   echo"<td class='on2' style='color:green'>Order comform</td>";
		   }
		   else
		   {
		   echo"<td class='on2' style='color:red'>Order pending</td>";
		   }
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