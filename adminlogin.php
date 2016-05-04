<?php 
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role!="Admin")
{
   header('Location: login.php');
}
?>