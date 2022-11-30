<?php 
	function clean($str) 
	{
	    $data = htmlspecialchars(strip_tags(trim($str)));
	    return $data;
	}

	function safe_data($str)
	{
	    $data = htmlspecialchars_decode($str);
	    return $data;

	}
 


?>