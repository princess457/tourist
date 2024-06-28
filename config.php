<?php
	$con=new mySqli("localhost","root","","tourist");
	//server name,username,password,databasename
	if(!$con=="")
	{
		//echo"Db Connected";
	}
	else
	{	
		echo"error";
	}
		
?>