<?php
	//Create connection credentials
	
	$db_host = 'localhost';
	$db_name = 'quizzer';
	$db_user = 'root';
	$db_pass = 'password';
	
	//Create mysqli object
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
	
	//Error Handler
	if($mysqli->connect_error){
		printf("Connect failed: %s\n", $mysql->connect_error);
		exit();
	}
	
?>