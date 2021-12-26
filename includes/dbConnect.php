<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'customer_management_dashboard';
$con;
try{
	$con = mysqli_connect($server, $username, $password, $db_name) or  die ('Unable to connect. Check your connection parameters.');
    }catch(Exception $e){
	     echo $e->getMessage();
    }