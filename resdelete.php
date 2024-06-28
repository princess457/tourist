<?php	
include"config.php";
if(isset($_GET["id"],$_GET["return"]))
{
	$sql="Delete from restarentwish where rno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:view.php?id={$_GET["return"]}");
	}
	else
	{
		echo $sql;
	}
}
else
{
$sql="Delete from restarentwish where rno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:wishlist.php");
	}
	else
	{
		echo $sql;
	}
}
?>