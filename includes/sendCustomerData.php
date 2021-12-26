<?php
session_start();
include('preConnect.php');
include('checkSession.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
$customer_id=rand(1000,1000000000);
$_SESSION['cid']=$customer_id;
$userid_online=$_POST['current-iduser'];
$customer_name=$_POST['customer-name'];
$customer_address=$_POST['customer-address'];
$customer_city=$_POST['customer-city'];
$customer_phone=$_POST['customer-phone'];
$customer_email=$_POST['customer-email'];
$customer_fb=$_POST['customer-fb'];
$customer_instagram=$_POST['customer-instagram'];
$customer_other=$_POST['customer-other'];
$customer_notes=$_POST['customer-notes'];
$deleted='0';
$sql_insert_customer="INSERT INTO customer (idcustomer,fk_iduser,name, address, city, phone, email,facebook,instagram,other_socmed,notes,deleted) VALUES ('$customer_id',(SELECT iduser FROM user WHERE iduser='$userid_online' AND deleted='0'),'$customer_name','$customer_address','$customer_city','$customer_phone','$customer_email','$customer_fb','$customer_instagram','$customer_other','$customer_notes','$deleted')";
			if (mysqli_query($con, $sql_insert_customer) ) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
    }
}
?>