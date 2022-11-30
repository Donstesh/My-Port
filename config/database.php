<?php
	// Setting up the time zone
	date_default_timezone_set('Asia/Karachi');
	// Host Name
	$db_hostname = 'localhost';
	// Database Name
	$db_name = 'tanzame';
	// Database Username
	$db_username = 'root';
	// Database Password
	$db_password = '';
	
	try {

		$conn = new PDO("mysql:host=$db_hostname;dbname=$db_name",$db_username,$db_password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	    echo $e->getMessage();
	}
?>