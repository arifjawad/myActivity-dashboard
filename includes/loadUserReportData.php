<?php
    include('preConnect.php');
    session_start();
    include('checkSession.php');
    
    $current_userID=$_SESSION['uid'];


    $sql_load_reportActivity= "SELECT r.idreport,r.date,r.location,r.platform,r.memo,r.fk_idstage,r.fk_idactivity,r.deleted,a.fk_idcustomer FROM report r,activity a WHERE r.fk_idactivity=a.idactivity AND a.fk_iduser='$current_userID' AND r.deleted='0' ORDER BY r.date DESC ";

	$loaded_reportActivity = $con->query($sql_load_reportActivity);
	if ($loaded_reportActivity->num_rows > 0) {

  	  while($row = $loaded_reportActivity->fetch_assoc()) {
         $idreport=$row['idreport'];
         $report_date=$row['date'];
         $report_location=$row['location'];
         $report_platform=$row['platform'];
         $report_memo=$row['memo'];
         $fk_idcustomer=$row['fk_idcustomer'];
         
         $load_Customer="SELECT * FROM customer WHERE idcustomer='$fk_idcustomer' AND deleted='0'";
         $loaded_Customer = $con->query($load_Customer);
         if ($loaded_Customer->num_rows > 0) {
       
             while($row8 = $loaded_Customer->fetch_assoc()) {
              $idcustomer=$row8['idcustomer'];
                $customer_name=$row8['name'];
             }
            }
         $fk_idstage=$row['fk_idstage'];

         $load_stage="SELECT stage FROM stage WHERE idstage ='$fk_idstage'";
         $loaded_stage = $con->query($load_stage);
         if ($loaded_stage->num_rows > 0) {
           while($row2 = $loaded_stage->fetch_assoc()) {
            $report_stage=$row2['stage'];
              
           }
         }else {
          $report_stage="No stage found";
         }
  $load_report_media="SELECT media FROM d_report WHERE fk_idreport ='$idreport'";
	$loaded_media = $con->query($load_report_media);
	if ($loaded_media->num_rows > 0) {
    while($row3 = $loaded_media->fetch_assoc()) {
       $load_media=$row3['media'];
       
    }
  }else {
    $load_media="No media found";
  }  
    
  

         echo "

                       <tr class='table-bordered'>
                          <td >$customer_name</td>
                          <td >$report_date</td>
                          <td>$report_location</td>
                          <td >$report_platform</td>
                          <td >$report_stage</td>
                          <td>".nl2br($report_memo,false)."</td>
                          <td>
                          <ul class='list-group'>
                          <li class='list-group-item '>
                         <audio controls>
                          <source src='$load_media' type='audio/mpeg'>
                          </audio>
                          </li>
                          </ul></td>
                          <td>                   
                          <a href='updateReportActivity.php?idreport=$idreport&idcustomer=$idcustomer&action=update'
                          class='btn btn-secondary'>
                          <i class='mdi mdi-cloud-download'></i> Update </a>
                          <br>
                          <br> 
                          <a href='userReportActivity.php?idreport=$idreport&action=delete' class='btn btn-danger'>
                          <i class='mdi mdi-alert-outline'></i>Delete</a>
                          </td>
                       </tr>
                        "	;
	
	}
	}
	else {
		echo "0 results Found";
	}




?>

 <!-- <td>                   
                          <a href='updateUser.php?iduser=$iduser&action=update'
                          class='btn btn-secondary'>
                          <i class='mdi mdi-cloud-download'></i> Update </a>
                          </td>
                          <td> 
                          <a href='masterUser.php?iduser=$iduser&action=delete' class='btn btn-danger'>
                          <i class='mdi mdi-alert-outline'></i>Delete</a>
                          </td> 
                          <td style='width:5px'><audio controls>
                          <source src='$load_media' type='audio/mpeg'>
                        </audio></td>
                        -->