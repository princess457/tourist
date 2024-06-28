<?php
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
 include"config.php";
 include"header.php";
 $d=date('y-m-d');
	$sql="select * from resbook where rno={$_GET["id"]}";
	$res1=$con->query($sql);
	$rec1=$res1->fetch_assoc();

  $sql1="insert into resorder (uid,rdate,res,place) values ('{$_SESSION["uid"]}','{$rec["rdate"]}','{$rec1["res"]}','{$rec1["place"]}')";
  if($con->query($sql1))
  {
	$sqls="SELECT max(roid) FROM `resorder`";
	$res=$con->query($sqls);
	
	if($res->num_rows>0)
	{
		$r=$res->fetch_assoc();
		$sqlu="update resbook set oid='{$r["max(placeno)"]}' where resbook.uid='{$_SESSION["uid"]}' and resbook.oid=0 and resbook.resno='{$_GET["id"]}'";
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

