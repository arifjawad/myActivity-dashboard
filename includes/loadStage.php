<?php
    include('preConnect.php');
	$sql_load_stage = "SELECT * FROM stage WHERE deleted='0'";
	$loaded_stage = $con->query($sql_load_stage);
	if ($loaded_stage->num_rows > 0) {
		while($row = $loaded_stage->fetch_assoc()) {
            $idstage=$row['idstage'];
                     echo "
                       <tr class='table-bordered'>
                          <td >".$row['idstage']."</td>
                          <td>".$row['stage']."</td>         
                          <td>
                              <a href='updateStage.php?idstage=$idstage&action=update'
                              class='btn btn-secondary'>
                              <i class='mdi mdi-cloud-download'></i> Update </a>
                          </td>
                          <td> 
                          <a href='masterStage.php?idstage=$idstage&action=delete' class='btn btn-danger'>
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