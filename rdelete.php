<?php	
include"config.php";
	$sql="Delete from resbook where resno='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:book.php?mes=Message deleted successfully..!");
	}
	else
	{
		echo $sql;
	}
?>