<?php
// define database related variables
	$host = 'localhost';
	$user = 'root';
	$pass = 'password01';
$database = 'project';

// try to conncet to database
$dbh = new PDO('mysql:host='.$host.';
					dbname='.$database, $user, $pass);

if(!$dbh)
{
   echo "unable to connect to database";
}
/* End config */

?>

