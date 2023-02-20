<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "car_rental";
	
	try{
	$conn = new PDO("mysql:host=".$host.";dbname=".$db,$user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}
	catch (PDOException $e)
	{
	exit("Error: " . $e->getMessage());
	}
?>
