<?php
 session_start();
 if(!$_SESSION["uid"])
 {
  header("location:userlogin.php?mes=Don't Misuse ....!!");
 }
 include"config.php";
 include"header.php";
 $d=date('y-m-d');
	$sql="select * from resbook where resno={$_GET["id"]}";
	//echo $sql;
	$res1=$con->query($sql);
	$rec1=$res1->fetch_assoc();

  $sql1="insert into resorder (uid,rdate,res,place) values ('{$_SESSION["uid"]}','{$rec1["rdate"]}','{$rec1["res"]}','{$rec1["place"]}')";
  if($con->query($sql1))
  {
	$sqls="SELECT max(placeno) FROM `resorder`";
	//echo $sqls;
	$res=$con->query($sqls);
	
	if($res->num_rows>0)
	{
		$r=$res->fetch_assoc();
		$sqlu="update resbook set roid='{$r["max(placeno)"]}' where resbook.uid='{$_SESSION["uid"]}' and resbook.roid=0 and resbook.resno='{$_GET["id"]}'";
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

