<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
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
            <div class="row  d-flex justify-content-center">
                                

             <div class="col-md-9 grid-margin stretch-card" id="customer-display">
                <div class="card">
                  <div class="card-body">
                  <div class="text-center">
                  <h4 class="card-title">Contact Person</h4>
                    <p class="card-description">Contact person For customer</p>
                    <input type="hidden" class="form-control" id="customer-id" value="<?php echo $_SESSION["cid"]?>" placeholder="Name">
                    <input type="hidden" class="form-control" id="userID-online" value="<?php echo $_SESSION["uid"]?>" placeholder="Name">
                  
                  </div>
                    <form class="forms-sample" id="add-form" action="" method="POST">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="contactPerson-name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">HP</label>
                        <input type="text" class="form-control" id="contactPerson-hp" placeholder="text">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="contactPerson-email" placeholder="Email">
                      </div>
                      <div class="form-group">
                      <div class="col-md-4">
                        <label for="exampleInputName1">Birthday</label>
                        <input type="date" class="form-control" id="contactPerson-birthday" placeholder="date">
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="contactPerson-title" placeholder="title">
                      </div>
                     <div class="form-group">
                        <label for="exampleInputEmail3">Notes</label>
                        <textarea type="text" class="form-control" id="contactPerson-notes" placeholder="Notes"></textarea>
                      </div>
  
                      <div class="text-center">
                      <button type="submit" class="btn btn-success mr-2 mt-3" id="submit-additionalDetails">Confirm & Submit</button>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>

           
      <!-- message -->
        <div class=" alert alert-success alert-dismissible fade show" id="successMsg">  
            <button type="button" class="close" data-dismiss="alert">×</button>  
            <strong>Succuss!</strong> Customer Data has been saved successfully.  
        </div>  

<!-- message -->
            </div>
          </div>
        
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
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
    <!-- plugins:js -->
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script>
      $(document).ready(function () {
        $('#submit-additionalDetails').click(function (e) {
          e.preventDefault();
          var customer_id =$('#customer-id').val();
          var userID_online=$('#userID-online').val();
          var contactPerson_name = $('#contactPerson-name').val();
          var contactPerson_hp = $('#contactPerson-hp').val();
          var contactPerson_birthday=$('#contactPerson-birthday').val();
          var contactPerson_email = $('#contactPerson-email').val();
          var contactPerson_title = $('#contactPerson-title').val();
          var contactPerson_notes = $('#contactPerson-notes').val();
      
        
          $.ajax
            ({
              type: "POST",
              url: "includes/sendAdditionalData.php",
              data: {
                 "customer-id": customer_id,
                "userID-online":userID_online,
                 "contactPerson-name": contactPerson_name, 
                 "contactPerson-hp": contactPerson_hp,
                 "contactPerson-birthday":contactPerson_birthday,
                 "contactPerson-email": contactPerson_email, 
                 "contactPerson-title": contactPerson_title, 
                 "contactPerson-notes": contactPerson_notes,
            
                 },
                 cache: false,
              success: function (data) {
                $("#successMsg").show();
                setTimeout(function(){
                   window.location.href = 'viewCustomerDetails.php';
                     }, 500);
                $('#add-form')[0].reset();
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

