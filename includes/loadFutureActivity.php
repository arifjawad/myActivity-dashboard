<?php
	session_start();
    include('preConnect.php');
    include('checkSession.php');
    $current_iduser=$_SESSION['uid'];
	$sql_load_futureActivity = "SELECT * FROM future_activity f,activity a WHERE f.fk_idactivity=a.idactivity AND a.fk_iduser='$current_iduser' AND f.deleted='0'";
	$loaded_futureActivity = $con->query($sql_load_futureActivity);
	if ($loaded_futureActivity->num_rows > 0) {
       		while($row = $loaded_futureActivity->fetch_assoc()) {
            $fk_idactivity=$row['fk_idactivity'];
            $fk_idcustomer=$row['fk_idcustomer'];
            $sql_getCustomer_name=$con->query("SELECT name FROM customer WHERE idcustomer='$fk_idcustomer'");
            if ($sql_getCustomer_name->num_rows > 0) {
                while($row2 = $sql_getCustomer_name->fetch_assoc()) { 
                $customer_name=$row2['name'];
                }
            }
                 
echo "
                       <tr class='table-bordered'>
                          <td>$customer_name</td>
                          <td>".$row['date']."</td>
                          <td>".$row['location']."</td>
                          <td>".$row['platform']."</td>
                          <td>".nl2br($row['to_do_list'],false)."</td>
                          <td>                   
                          <a href='updateFutureActivity.php?idactivity=$fk_idactivity&idcustomer=$fk_idcustomer&action=update'
                          class='btn btn-secondary'>
                          <i class='mdi mdi-cloud-download'></i> Update </a>
                          <br>
                          <br> 
                          <a href='futureActivity.php?idactivity=$fk_idactivity&action=delete' class='btn btn-danger'>
                          <i class='mdi mdi-alert-outline'></i>Delete</a>
                          </td>                       
                       
                        </tr>
                        "	;
	
	}
	}
	else {
		echo "0 results Found";
	}


	mysqli_close($con);
?>
