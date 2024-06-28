<html>
<?php include"header.php";
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
?>

<body>
<?php include"nav.php";?>
<?php include"config.php";?>
<h1 align="center" id="on1">Your Book Details  <?php echo $_SESSION["uname"]; ?>!! </h1>
<br>

<div class='col-md-offset-1 col-md-9'>
	
		
			<?php 
			$sql1="select *from hotelbook ";
			$res1=$con->query($sql1);
			$oid=0;
			while($rec1=$res1->fetch_assoc())
			{
				if($rec1["oid"]==0)
				{
				$oid+=1;
				}
			}
			
			
			if($oid!=0)
			{
			$sql="select * from  hotelbook  inner join hotel on hotelbook.hid=hotel.hid  where hotelbook.uid='{$_SESSION["uid"]}' and hotelbook.oid=0";
			$res=$con->query($sql);
			
			if($res->num_rows>0)
			{
			
			echo"
			
			<table class='table table-bordered'>
				<tr><h1 id='on' style='color:DC0000;text-shadow: black 1px 5px 5px;'>Hotel Details</h1></tr>
					<tr>
					<th class='on2'>S.no</th>
					<th class='on2'>Date</th>
					<th class='on2'>Hotel Name</th>
					<th class='on2'>Room Amount</th>
					<th class='on2'>Conform</th>
					<th class='on2'>Delete</th>
					</tr>";
					$i=1;
					
				
			While($rec=$res->fetch_assoc())
			{
					echo"<tr>
					<td class='on2' >$i)</td>
					<td class='on2' style='color:blue;'>{$rec["date"]}</td>
					<td class='on2' style='color:blue;'>{$rec["hname"]}</td>
					<td class='on2' style='color:blue;'>{$rec["rate"]}</td>
					<td class='on2'><a href='conform.php?id={$rec["bookno"]}'><i class='fa fa-check' style='color:green;'></i></a></td>
					<td class='on2'><a href='hdelete.php?id={$rec["bookno"]}'><i class='fa fa-trash'></i></a></td>
					
					
					</tr>";
				$i++;
				
			
			}
			
			
			}		
			}
			?>
</div>
<div class='col-md-offset-1 col-md-9'>
		
			<?php 
			$sql2="select *from resbook";
			$res2=$con->query($sql2);
			$oid=0;
			//echo $sql2;
			while($rec2=$res2->fetch_assoc())
			{
				if($rec2["roid"]==0)
				{
				$oid+=1;
				}
			}
			
			
			if($oid!=0)
			{
			$sql3="select * from  resbook  inner join restarent on resbook.rno=restarent.rno  where resbook.uid='{$_SESSION["uid"]}' and resbook.roid=0";
			$res3=$con->query($sql3);
			//echo $sql3;
			if($res3->num_rows>0)
			{
			
			echo"
			
			<table class='table table-bordered'>
				<tr><h1 id='on' style='color:DC0000;text-shadow: black 1px 5px 5px;'>Restarent Details</h1></tr>
					<tr>
					<th class='on2'>S.no</th>
					<th class='on2'>Date</th>
					<th class='on2'>Restarent Name</th>
					<th class='on2'>Place</th>
					<th class='on2'>Conform</th>
					<th class='on2'>Delete</th>
					</tr>";
					$i=1;
					
				
			While($rec3=$res3->fetch_assoc())
			{
					echo"<tr>
					<td class='on2'>$i)</td>
					<td class='on2' style='color:blue;'>{$rec3["rdate"]}</td>
					<td class='on2' style='color:blue;'>{$rec3["rname"]}</td>
					<td class='on2' style='color:blue;'>{$rec3["place"]}</td>
					<td class='on2'><a href='rconform.php?id={$rec3["resno"]}'><i class='fa fa-check' style='color:green;'></i></a></td>
					<td class='on2'><a href='rdelete.php?id={$rec3["resno"]}'><i class='fa fa-trash'></i></a></td>
					
					
					</tr>";
			$i++;
				
			
			}
			
			
			}		
			}
			
		?>


</div>
<?php
	$sql4="select * from registration where uid='{$_SESSION["uid"]}'";
	$res4=$con->query($sql4);
	if($res4->num_rows>0)
	{
		while($rec4=$res4->fetch_assoc())
		{
			if($rec4["visit"]==1)
			{
				$sql5="update `visit` set `like`='{$_SESSION["uname"]}' where `uid`={$_SESSION["uid"]}";
				$res5=$con->query($sql5);
				
			}
			else if($rec4["visit"]==$_SESSION["uid"])
			{
				$sql6="update `visit` set `book`='{$_SESSION["uname"]}',`like`='0' where `uid`={$_SESSION["uid"]}";
				$res6=$con->query($sql6);
			
			}
			else
			{
				//echo "error";
			}
		}
	}
?>
</body>
<?php include"footer.php";?>

     
</html>