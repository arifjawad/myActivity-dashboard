<?php
    include('preConnect.php');
	$sql_load_user = "SELECT * FROM user Where deleted = '0'";
	$loaded_user = $con->query($sql_load_user);
	if ($loaded_user->num_rows > 0) {
		while($row = $loaded_user->fetch_assoc()) {
            $iduser=$row['iduser'];
           echo "
                      <tr class='table-bordered'>
                          <td name='iduser'>".$row['iduser']."</td>
                          <td name='user-name'>".$row['name']."</td>
                          <td>Password</td>
                          <td>                   
                          <a href='updateUser.php?iduser=$iduser&action=update'
                          class='btn btn-secondary'>
                          <i class='mdi mdi-cloud-download'></i> Update </a>
                          </td>
                          <td> 
                          <a href='masterUser.php?iduser=$iduser&action=delete' class='btn btn-danger'>
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