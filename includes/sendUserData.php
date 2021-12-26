<?php
include('preConnect.php');
if(count($_POST)>0){
if(!empty($_POST)) {
$username=$_POST['user-name'];
$password=$_POST['user-password'];
$deleted='0';
$sql_insert_user="INSERT INTO user(name,password,deleted) VALUES ('$username','$password','$deleted')";
			if (mysqli_query($con, $sql_insert_user) ) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
}
}
?>