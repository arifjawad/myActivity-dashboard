<?php
session_start();
include('preConnect.php');
	$userid_online=$_SESSION['uid'];
    $customer_id= $_SESSION['cid'];
        $sql_load_customer = "SELECT * FROM customer WHERE idcustomer = '$customer_id' AND fk_iduser = '$user_id_online' ";
        $loaded_customer = $con->query($sql_load_customer);
        if ($loaded_customer->num_rows > 0) {
            while($row = $loaded_customer->fetch_assoc()) {
                $customer_name=$row['name'];            
                $customer_address=$row['address'];
                $customer_city=$row['city'];
                $customer_phone=$row['phone'];
                $customer_email=$row['email'];
                $customer_fb=$row['facebook'];
                $customer_instagram=$row['instagram'];
                $customer_other=$row['other_socmed'];
                $customer_notes=$row['notes'];
    echo "   
   
    <div class='card'>
      <div class='card-body'>
        <h4 class='card-title'>Contact Person</h4>
        <p class='card-description'>Contact person of the new customer</p>
        

          <div class='form-group'>
            <label for='exampleInputName1'>Name</label>
            <input type='text' class='form-control' id='contactPerson-name' placeholder='Name'>
          </div>
          <div class='form-group'>
            <label for='exampleInputEmail3'>HP</label>
            <input type='text' class='form-control' id='contactPerson-hp' placeholder='text'>
          </div>
          <div class='form-group'>
            <label for='exampleInputEmail3'>Email address</label>
            <input type='email' class='form-control' id='contactPerson-email' placeholder='Email'>
          </div>
          <div class='form-group'>
            <label for='exampleInputName1'>Birthday</label>
            <input type='date' class='form-control' id='contactPerson-birthday' placeholder='date'>
          </div>
          <div class='form-group'>
            <label for='exampleInputName1'>Title</label>
            <input type='text' class='form-control' id='contactPerson-title' placeholder='title'>
          </div>
           
         <div class='form-group'>
            <label for='exampleInputEmail3'>Notes</label>
            <input type='text' class='form-control' id='contactPerson-notes' placeholder='Notes'>
          </div>
        
         <div class='text-center mt-5'>
         <button type='submit' class='btn btn-success mr-2'  id='submit-customer'>Submit Details</button>
          <button class='btn btn-light'>Cancel</button>
        
         </div>
        </form>
      </div>
    </div>
  </div> 

  <div class='col-md-12 grid-margin stretch-card text-center'>
        <div class='card'>
          <div class='card-body'>
            <h4 class='card-title text-center'>Company Name: ".$row['name']."</h4>
            <p class='card-description text-center'>Details</p>
            <form class='forms-sample'>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <div class='form-check'>
                      <label class='form-check-label'>Address</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>City</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>Phone</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>Email</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>Facebook</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>Instagram</label>
                    </div>
                   
                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['address']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['city']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['phone']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['email']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['facebook']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['instagram']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['other_socmed']."</label>
                    </div>
                    <div class='form-check'>
                      <label class='form-check-label'>".$row['notes']."</label>
                    </div>

             

                  </div>
                </div>
              </div>
          
          </div>
        </div>
   
            "	;
        
        }
        }
        else {
            echo "0 results Found";
        }


?>

