
<?php
session_start();
include('preConnect.php');
include('checkSession.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
$current_iduser=$_POST['current-iduser'];
$futureActivity_customerSelected=$_POST['futureActivity-customerSelected'];
$futureActivity_date=$_POST['futureActivity-date'];
$futureActivity_location=$_POST['futureActivity-location'];
$futureActivity_platform=$_POST['futureActivity-platform'];
$futureActivity_todoList=$_POST['futureActivity-todoList'];
$deleted='0';
$sql_insert_futureActivity="INSERT INTO future_activity (fk_idactivity,date,location,platform,to_do_list,deleted) VALUES ((SELECT idactivity FROM activity WHERE fk_iduser='$current_iduser' AND fk_idcustomer='$futureActivity_customerSelected'),'$futureActivity_date','$futureActivity_location','$futureActivity_platform','$futureActivity_todoList','$deleted')";
			if (mysqli_query($con, $sql_insert_futureActivity) ) {
				 json_encode(array("statusCode"=>200));
			} 
			else {
				 json_encode(array("statusCode"=>201));
			}
}
}
?>