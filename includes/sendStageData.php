<?php
include('preConnect.php');
if(count($_POST)>0){
	if(!empty($_POST)) {
    $stage_name=$_POST['stage-name'];
    $deleted='0';
    $sql_insert_stage="INSERT INTO stage(stage,deleted) VALUES ('$stage_name','$deleted')";
			if (mysqli_query($con, $sql_insert_stage) ) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
}
}
?>