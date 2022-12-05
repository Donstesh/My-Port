<?php
	// Setting up the time zone
	date_default_timezone_set('Africa/Nairobi');
	// Host Name
	$db_hostname = 'localhost';
	// Database Name
	$db_name = 'stephens_stesh';
	// Database Username
	$db_username = 'stephens_stesh';
	// Database Password
	$db_password = 'rtnizWRO_ZnX';
	
	try {

		$conn = new PDO("mysql:host=$db_hostname;dbname=$db_name",$db_username,$db_password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	    echo $e->getMessage();
	}
?>