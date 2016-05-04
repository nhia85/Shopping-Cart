<?php
	//Database configs
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "password01";
	$db_database = "project";
	//End configs
	
	$db = new PDO('mysql:host='.$db_host.';
									dbname='.$db_database,
									$db_user, $db_pass);
	$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>
