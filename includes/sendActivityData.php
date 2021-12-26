<?php
session_start();
include('preConnect.php');
include('checkSession.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
    $current_userId=$_POST['current-userId'];
	$customer_Id=$_POST['current-customerId'];
	$added_PotentialValue=$_POST['customer-PotentialValue'];
	$added_CustomerStage=$_POST['customer-stage'];
	$added_activityNotes=$_POST['customer-activityNotes'];
	$deleted='0';
	$sql_insert_additionalActivity="INSERT INTO activity (fk_iduser,fk_idcustomer,fk_idstage,potential_value,notes,deleted) VALUES ((SELECT iduser FROM user WHERE iduser='$current_userId'),(SELECT idcustomer FROM customer WHERE idcustomer='$customer_Id'),(SELECT idstage FROM stage WHERE idstage='$added_CustomerStage'),'$added_PotentialValue','$added_activityNotes','$deleted')";
			if (mysqli_query($con, $sql_insert_additionalActivity) ) {
				 json_encode(array("statusCode"=>200));
			} 
			else {
				 json_encode(array("statusCode"=>201));
			}
}
}
?>