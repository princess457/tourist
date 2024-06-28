<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["aid"])
 {
  header("location:adminlogin.php?mes=Don't Misuse ....!!");
 }
?>

<body>
<?php include"nav.php";?>
<?php include"config.php";?>


<div class="col-md-offset-2 col-md-8 col-md-offset-2">
		<h1 align="center" id="on" style='color:pink;text-shadow: black 1px 5px 7px;'> BOOKED DETAILS </h1>
		<?php 
		$sql="select * from  hotelbook  inner join registration on hotelbook.uid=registration.uid    ";
		$res=$con->query($sql);
		if($res->num_rows>0)
		{
		echo"<table class='table table-bordered'>
				<tr>
				<th class='on2'>S.no</th>
				<th class='on2'>Date</th>
				<th class='on2'>user Name</th>
				<th class='on2'>Bill Amount</th>
				<th class='on2'>view details</th>
				<th class='on2'>Update Delivery</th>
				<th class='on2'>Status</th>
			
				
				</tr>";
				$i=1;
				
			
		While($rec=$res->fetch_assoc())
		{
				echo"<tr>
				<td class='on2' style='color:brown;'>$i)</td>
				<td class='on2' style='color:blue;'>{$rec["date"]}</td>
				<td class='on2' style='color:blue;'>{$rec["uname"]}</td>
				<td class='on2' style='color:blue;'>{$rec["rate"]}</td>
				<td class='on2' style='color:blue;'><a href='orderdetail.php?id={$rec["bookno"]}&&rate={$rec["rate"]}'><i class='fa fa-eye'></i></a></td>
				<td class='on2' style='color:blue;'><a href='status.php?id={$rec["bookno"]}'><i class='fa fa-edit'></i></a></td>
				";
				if($rec["status"]=="1")
				{
				echo "<td class='on2' style='color:green;'>Order conformed</td>";
				}
				else
				{
				echo "<td class='on2' style='color:red;'>Order Pending</td>";
				}
				
			echo" </tr>";
			$i++;
			
		
		}
		}
		
		?>

</div>

<div class="col-md-offset-1 col-md-10">
<?php 
		$sql1="select *,resbook.res as `rname` ,resbook.place as `rplace` from  resbook  inner join registration on resbook.uid=registration.uid    ";
		$res1=$con->query($sql1);
		
		if($res1->num_rows>0)
		{
		echo"<table class='table table-bordered'>
				<tr>
				<th class='on2'>S.no</th>
				<th class='on2'>user Name</th>
				<th class='on2'>Restarent Name</th>
				<th class='on2'>Place</th>
				<th class='on2'>Booked Date</th>
				<th class='on2'>Booked Time</th>
				<th class='on2'>view details</th>
				<th class='on2'>Update Delivery</th>
				<th class='on2'>Status</th>
			
				
				</tr>";
				$j=1;
				
			
		While($rec1=$res1->fetch_assoc())
		{		//print_r($rec1);
				echo"<tr>
				<td class='on2' style='color:brown;'>$j)</td>
				<td class='on2' style='color:blue;'>{$rec1["uname"]}</td>
				<td class='on2' style='color:blue;'>{$rec1["rname"]}</td>
				<td class='on2' style='color:blue;'>{$rec1["rplace"]}</td>
				<td class='on2' style='color:blue;'>{$rec1["rdate"]}</td>
				<td class='on2' style='color:blue;'>{$rec1["rtime"]}</td>
				<td class='on2'><a href='resorderdetail.php?id={$rec1["resno"]}'><i class='fa fa-eye'></i></a></td>
				<td class='on2'><a href='rstatus.php?id={$rec1["resno"]}'><i class='fa fa-edit'></i></a></td>
				";
				if($rec1["rstatus"]=="1")
				{
				echo "<td class='on2' style='color:green;'>Order conformed</td>";
				}
				else
				{
				echo "<td class='on2' style='color:red;'>Order Pending</td>";
				}
				
			echo" </tr>";
			$j++;
			
		
		}
		}
		
		?>
</div>
</body>
<?php include"footer.php";?>
     
</html>