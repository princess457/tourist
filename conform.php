<?php
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
 include"config.php";
 include"header.php";
 $d=date('y-m-d');
	$sql="select * from hotelbook where bookno={$_GET["id"]}";
	$res1=$con->query($sql);
	//echo $sql;
	$rec1=$res1->fetch_assoc();

  $sql1="insert into placeorder (uid,pdate,bill) values ('{$_SESSION["uid"]}','{$d}','{$rec1["rate"]}')";
  if($con->query($sql1))
  {
	$sqls="SELECT max(pno) FROM `placeorder`";
	$res=$con->query($sqls);
	
	if($res->num_rows>0)
	{
		$r=$res->fetch_assoc();
		$sqlu="update hotelbook set oid='{$r["max(pno)"]}' where hotelbook.uid='{$_SESSION["uid"]}' and hotelbook.oid=0 and hotelbook.bookno='{$_GET["id"]}'";
		if($con->query($sqlu))
		{
		header("location:book.php");
		}
		else
		{
		echo $sqlu;
		}
		
	}
	else
	{
	echo $sqls;
	}
    
  }
  else
  {
  echo $sql1;
  }

?>

