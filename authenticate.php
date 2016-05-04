<?php 
require 'database-config.php'; //Databse Connection
session_start(); //Start the session

if(isset($_POST['username']))
{
	$username = $_POST['username'];
}
if(isset($_POST['password'])) 
{
	$password = $_POST['password'];
}
	
// Check whether the entered username/password pair exist in the Database
$q = 'SELECT * FROM addin WHERE username=:username AND password=:password';
$query = $dbh->prepare($q);
$query->execute(array(':username' => $username, ':password' => $password));

if($query->rowCount() == 0)
{
	header('Location: login.php');
}
else 
{	//fetch the result as associative array
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	//Store the fetched details into $_SESSION
	$_SESSION['sess_user_id'] = $row['id'];
	$_SESSION['sess_username'] = $row['username'];
    $_SESSION['sess_userrole'] = $row['role'];
	
	if( $_SESSION['sess_userrole'] == "Admin")
		{
			header('Location: adminhome.php');
		}
	else
		{
			header('Location: userhome.php');
		} 
}
?>




