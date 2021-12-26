<?php
session_start();
include('preConnect.php');
include('checkSession.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
$customerID=$_POST['customer-id'];
$userID=$_POST['userID-online'];
$contactPerson_name=$_POST['contactPerson-name'];
$contactPerson_hp=$_POST['contactPerson-hp'];
$contactPerson_email=$_POST['contactPerson-email'];
$contactPerson_birthday=$_POST['contactPerson-birthday'];
$contactPerson_title=$_POST['contactPerson-title'];
$contactPerson_notes=$_POST['contactPerson-notes'];
$deleted='0';
$sql_insert_additionalDetails="INSERT INTO contact_person (fk_idcustomer,name,hp, email,birthday,title,notes,deleted) VALUES ((SELECT idcustomer FROM customer WHERE customer.idcustomer='$customerID' AND deleted='0'),'$contactPerson_name','$contactPerson_hp','$contactPerson_email','$contactPerson_birthday','$contactPerson_title','$contactPerson_notes','$deleted')";
			if (mysqli_query($con, $sql_insert_additionalDetails) ) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
}
}
?>