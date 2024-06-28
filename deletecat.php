<?php	
include"config.php";
	$sql="Delete from category where cno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:pcate.php?mes=Message deleted successfully..!");
	}
	else
	{
		echo $sql;
	}
?>