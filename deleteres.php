<?php	
include"config.php";
	$sql="Delete from restarent where rno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:restarent.php?mes=Message deleted successfully..!");
	}
	else
	{
		echo $sql;
	}
?>