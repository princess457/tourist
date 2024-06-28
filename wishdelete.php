<?php	
include"config.php";
if(isset($_GET["id"],$_GET["cno"]))
{
	$sql="Delete from placewish where sno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:viewplace.php?id={$_GET["cno"]}");
	}
	else
	{
		echo $sql;
	}
}
else
{
$sql="Delete from placewish where sno='{$_GET["id"]}'";
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