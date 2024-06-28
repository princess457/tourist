<?php	
include"config.php";
	$sql="Delete from hotel where hid='{$_GET["id"]}'";
	if($con->query($sql))
	{
		header("location:hoteldetail.php?mes=Message deleted successfully..!");
	}
	else
	{
		echo $sql;
	}
?>