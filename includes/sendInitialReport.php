<?php
session_start();
include('preConnect.php');
include('checkSession.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
$contact_date=$_POST['contact-date'];
$contact_location=$_POST['contact-location'];
$contact_platform=$_POST['contact-platform'];
$contact_memo=$_POST['contact-memo'];
$idactivity=$_POST['idactivity'];
$fk_idstage=$_POST['fk_idstage'];
$customer_id=$_POST['customer-id'];
$current_userId=$_POST['current-userId'];
$deleted='0';
$sql_insert_report="INSERT INTO report(fk_idactivity,fk_idstage,date,location,platform,memo,deleted) VALUES ('$idactivity','$fk_idstage','$contact_date','$contact_location','$contact_platform','$contact_memo','$deleted')";
			if (mysqli_query($con, $sql_insert_report) ) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
}
}
?>