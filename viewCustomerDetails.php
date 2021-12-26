<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
if( isset($_GET['idcustomer'])) {
 $_SESSION['cid']=$_GET['idcustomer'];  
}
  $userid_online=$_SESSION['uid'];
  $customer_id=$_SESSION['cid'];                  
  $sql_load_customer = "SELECT * FROM customer WHERE idcustomer = '$customer_id' AND fk_iduser = '$userid_online' ";
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
            }
          }                 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>my.Activity || <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> 
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
 
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="index.php">
          <img style="width:92px; height:18px" src="assets/svgs/myActivity.svg" alt="logo" /> </a>
         
          <a class="navbar-brand brand-logo-mini" href="index.php">
          <img style="width:63px; height:13px" src="assets/svgs/myActivity.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
         
         
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="assets/svgs/user.svg" alt="profile image">
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                <img class="img-xs rounded-circle" src="assets/svgs/user.svg" alt="profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION["username"] ?></p>
                  <p class="font-weight-light text-muted mb-0">ID:<span id="userid-online"><?php echo $_SESSION["uid"] ?></span></p>
                </div>
               
                <a class="dropdown-item" href='logout.php'>Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                <img class="img-xs rounded-circle" src="assets/svgs/user.svg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper col-md-4">
                <p class="profile-name" id="username-online"><?php echo $_SESSION["username"]?></p>
                <p class="designation">: online</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="masterCustomer.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Master Customer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="masterUser.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Master User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="masterStage.php">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Master Stage</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="userReportActivity.php">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">User Report Activity</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="futureActivity.php">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Future Activity</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">LOG OUT</span>
              </a>
            </li>
           
          </ul>
        </nav>
      <!-- partial -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <!-- add button -->
         
             
            <div class="row d-flex justify-content-center">
             

         
              <!-- create new customer -->
              <div class="col-md-6 grid-margin stretch-card" id="create-customer">
                <div class="card">
                  <div class="card-body">
                   <div class="text-center">
                   <h4 class="card-title">New Customer</h4>
                   
                   </div>
                    <form class="forms-sample" action="" method="POST" id="customer-form" >
                      <div class="form-group">
                        <label for="exampleInputName1">Company Name (Customer)</label>
                        <input type="text" class="form-control" id="customer-name" value="<?php echo $customer_name ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Address</label>
                        <input type="text" class="form-control" id="customer-address" value="<?php echo $customer_address ?>" disabled>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">City</label>
                        <input type="text" class="form-control" id="customer-city" value="<?php echo $customer_city ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" class="form-control" id="customer-phone" value="<?php echo $customer_phone ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="customer-email" value="<?php echo $customer_email ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Facebook</label>
                        <input type="text" class="form-control" id="customer-fb" value="<?php echo $customer_fb ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Instagram</label>
                        <input type="text" class="form-control" id="customer-instagram" value="<?php echo $customer_instagram ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Other socmed</label>
                        <input type="text" class="form-control" id="customer-other" value="<?php echo $customer_other ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Notes</label>
                        <textarea type="text" class="form-control" id="customer-notes" disabled><?php echo $customer_notes ?></textarea>
                      </div>

                    <div class="text-center">
                    <a href='updateCustomer.php?idcustomer=<?php echo $customer_id;?>&iduser=<?php echo $userid_online;?>&action=update'
                          class='btn btn-secondary'>
                          <i class='mdi mdi-cloud-download'></i> Update </a>
                          <div class="row d-flex justify-content-center mb-3">
                      <a href="customerAdditionalDetails.php?cid=<?php echo $customer_id ?>" type="submit" class="btn btn-success mr-2 mt-3" id="">Add another person</a>
                     </div>
                     </div>
                      
                    </form>
                  </div>
                </div>
              </div>
              <!-- Contact person -->

              <?php   $sql_load_contactPerson = "SELECT * FROM contact_person WHERE fk_idcustomer = '$customer_id' ";
                $loaded_contactPerson = $con->query($sql_load_contactPerson);
                if ($loaded_contactPerson->num_rows > 0) {
                    while($row = $loaded_contactPerson->fetch_assoc()) {
                      $contactPerson_id=$row['idcontact'];
                      $contactPerson_name=$row['name'];
                      
                      $contactPerson_hp=$row['hp'];
                      $contactPerson_email=$row['email'];
                      $contactPerson_birthday=$row['birthday'];
                      $contactPerson_title=$row['title'];
                      $contactPerson_notes=$row['notes'];

                      echo "
                      <div class='col-md-6 grid-margin stretch-card' id='customer-display'>
                      <div class='card'>
                        <div class='card-body'>
                        <div class='text-center'>
                         <h4 class='card-title'>Contact Person</h4>
                          <p class='card-description'>Contact person For customer</p>
                          </div>
                          <form class='forms-sample' id='add-form' action='' method='POST'>
                            <div class='form-group'>
                              <label for='exampleInputName1'>Name</label>
                              <input type='text' class='form-control' id='contactPerson-name' value='$contactPerson_name' disabled>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputEmail3'>HP</label>
                              <input type='text' class='form-control' id='contactPerson-hp' value='$contactPerson_hp' disabled>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputEmail3'>Email address</label>
                              <input type='email' class='form-control' id='contactPerson-email' value='$contactPerson_email' disabled>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputName1'>Birthday</label>
                              <input type='date' class='form-control' id='contactPerson-birthday' value='$contactPerson_birthday' disabled>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputName1'>Title</label>
                              <input type='text' class='form-control' id='contactPerson-title' value='$contactPerson_title' disabled>
                            </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail3'>Notes</label>
                              <textarea type='text' class='form-control' id='contactPerson-notes' disabled>$contactPerson_notes</textarea>
                            </div>
                            <div class='text-center'>
                            <a href='updateContactPerson.php?idcontact=$contactPerson_id&idcustomer=$customer_id&action=update'
                                  class='btn btn-secondary'>
                                  <i class='mdi mdi-cloud-download'></i> Update </a>
                             </div>                  
                          </form>
                        </div>
                      </div>
                    </div>
                      
           
                      
                      
                      ";
                    }
                  } ?>
           
       

       <!-- additional activity -->

<?php


$sql_load_additionalActivity="SELECT * FROM activity WHERE fk_idcustomer='$customer_id'";

$loaded_additionalActivity = $con->query($sql_load_additionalActivity);
if ($loaded_additionalActivity->num_rows > 0) {

  while($row = $loaded_additionalActivity->fetch_assoc()) {
     $idactivity=$row['idactivity'];
     $fk_idstage=$row['fk_idstage'];
     $potential_value=$row['potential_value'];
     $notes=$row['notes'];
   
  }
  $getStage = "SELECT * FROM stage WHERE idstage='$fk_idstage' AND deleted='0'";
  $gotStage = $con->query($getStage);
while ($row5 = mysqli_fetch_assoc($gotStage)) {
$stageName=$row5['stage'];
}    
           
     echo "

     <div class='col-md-6 d-flex align-items-stretch grid-margin '>
     <div class='row flex-grow'>
       <div class='col-12 '>
         <div class='card'>
           <div class='card-body'>
 
           <div class='form-group text-center'>
           <label for='exampleInputEmail3'>Customer additional Details(Activity) </label>
            </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Potential Value</label>
            <input type='text' class='form-control' id='' value='$potential_value' disabled>
           </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Customer Stage</label>
            <input type='text' class='form-control' value='$stageName' disabled>
            <input type='hidden' class='form-control' value='$fk_idstage' disabled>
            </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Added Notes</label>
            <textarea type='text' class='form-control' disabled>$notes</textarea>
           </div>
           <div class='text-center'>
           <a href='updateCustomerActivity.php?idcustomer=$customer_id&action=update'
                 class='btn btn-secondary'>
                 <i class='mdi mdi-cloud-download'></i> Update </a>
            
                 <div class='row d-flex justify-content-center mb-3'>
                 <a href='futureActivity.php' type='submit' class='btn btn-success mr-2 mt-3'>Add future activity</a>
              </div>
           </div>  
       
           </div>
         </div>
       </div>
       </div>
       </div>
                    "	;

}  

else {
   echo "
   <div class='col-md-6 grid-margin stretch-card'>
                  <div class='card'>
                    <div class='card-body'>
                      <form class='forms-sample' action='' method='POST'>
                        <div class='form-group text-center'>
                           <label for='exampleInputEmail3'>Provide Customer additional Details </label>
                           <input type='hidden' class='form-control' id='customer-id' value='$customer_id' disabled>
                           <input type='hidden' class='form-control' id='current-userId' value='$userid_online' disabled>
                        </div>
  
                        <div class='form-group'>
                          <label for='exampleInputEmail3'>Potential Value</label>
                           <input type='text' class='form-control' id='customer-PotentialValue' placeholder='0'>
                          </div>
  
                        <div class='form-group'>
                         <label>Set Stage level (dropdown)</label><br>
                         <select class='form-control' id ='customer-stage'>";
  
                         $sqlStage = "SELECT * FROM stage WHERE deleted='0'";
                         $foundStage = $con->query($sqlStage);
      while ($row = mysqli_fetch_assoc($foundStage)) {
         $showStageId = $row['idstage'];
         $showStage=$row['stage'];
      echo "
       <option value='$showStageId'>$showStage</option>
       ";
      }
  
  
                      echo "
  
                            </select> 
  
                         </div>
  
                         <div class='form-group'>
                          <label for='exampleInputEmail3'>Add Notes</label>
                           <textarea type='text' class='form-control' id='customer-activityNotes'></textarea>
                          </div>
  
                        <div class='text-center'>
                        <button type='submit' class='btn btn-success mr-2 mt-3' id='submit-activity'>Confirm & Submit</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
   
   
   
   ";
}

?>
                                                 
                  <!-- message -->
        <div class="col-md-6">
        <div class="row alert alert-success alert-dismissible fade show" id="successMsg">  
            <button type="button" class="close" data-dismiss="alert">×</button>  
            <strong>Succuss!</strong> Customer Data has been saved successfully.  
        </div>  
        </div> 

<!-- message -->
            </div>
          </div>
      
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix text-center">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © myActivity || 2021</span>
         </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
 
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script>
      $(document).ready(function () {
        $('#submit-activity').click(function (e) {
          e.preventDefault();
          var customer_id=$('#customer-id').val();
          var current_userId=$('#current-userId').val();
          var customer_activityNotes =$('#customer-activityNotes').val();
          var customer_stage =$('#customer-stage option:selected').val();

          var customer_PotentialValue = $('#customer-PotentialValue').val();

         
        
          $.ajax
            ({
              type: "POST",
              url: "includes/sendActivityData.php",
              data: {
                 "current-userId":current_userId,
                 "current-customerId": customer_id,
                 "customer-PotentialValue": customer_PotentialValue, 
                 "customer-stage": customer_stage,
                 "customer-activityNotes": customer_activityNotes, 
           
                 },
                 cache: false,
              success: function (data) {
                $("#successMsg").show();
                setTimeout(function(){
                   window.location.href = 'viewCustomerDetails.php';
                     }, 500);
               
               
              }
            });
        });
      });$("#successMsg").hide();

    </script>  
    

 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 <script src="assets/js/shared/off-canvas.js"></script> 

  </body>
</html>