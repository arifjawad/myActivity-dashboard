<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
$current_userID=$_SESSION['uid'];
$currentDate = strftime('%Y-%m-%d');
$todaysDate=date("F j, Y");
$sql_load_todaysActivity ="SELECT * FROM future_activity f,activity a,contact_person cp WHERE f.fk_idactivity=a.idactivity AND a.fk_iduser='$current_userID' AND a.fk_idcustomer=cp.fk_idcustomer AND f.date='$currentDate' AND f.deleted='0' ORDER BY f.date LIMIT 5";
$loaded_todaysActivity = $con->query($sql_load_todaysActivity);
if ($loaded_todaysActivity->num_rows > 0) {
  while($row = $loaded_todaysActivity->fetch_assoc()) {
    $idcustomer=$row['fk_idcustomer'];
    $contactPerson=$row['name'];
    $getIdActivity=$row['fk_idactivity'];
    $date=$row['date'];
    $location=$row['location'];
    $platform=$row['platform'];
    $to_do_list=$row['to_do_list'];
  }
}else {
  echo "";
  $idcustomer="Not Found";
    $contactPerson="Not Found";
    $getIdActivity="Not Found";
    $date="Not Found";
    $location="Not Found";
    $platform="Not Found";
    $to_do_list="Not Found";
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
    <link rel="stylesheet" href="css/style.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="assets/js/shared/off-canvas.js"></script> 
  

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
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                   </div>
                </div>
              </div>
            </div>
            <div class="card-columns">
 


  <div class="card background-color-2 text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p class="custom-font text-white">Today</p>
      <footer class="blockquote-footer">
        <h3 class="custom-font text-white">
       <?php echo $todaysDate;?>
</h3>
      </footer>
    </blockquote>
  </div>

  <?php 
  $sql_total_customer = "SELECT * FROM customer Where deleted = '0' AND fk_iduser='$current_userID' ORDER BY name DESC ";
$loaded_total_customer = $con->query($sql_total_customer);
$countCustomer=0;
if ($loaded_total_customer->num_rows > 0) {
while($row = $loaded_total_customer->fetch_assoc()) {
  $countCustomer=$countCustomer+1;

}
}
 ?>
  <div class="card bg-dark text-white text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p class="custom-font text-white">Total Customers</p>
      <footer class="blockquote-footer">
        <h3 class="custom-font text-white">
       <?php echo $countCustomer;?>
</h3>
      </footer>
    </blockquote>
  </div>

  <?php 
  $sql_total_users = "SELECT * FROM user Where deleted = '0' ";
$loaded_total_users = $con->query($sql_total_users);
$countUsers=0;
if ($loaded_total_users->num_rows > 0) {
while($row2 = $loaded_total_users->fetch_assoc()) {
  $countUsers=$countUsers+1;

}
}
 ?>
  <div class="card background-color-3 text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p class="custom-font text-white">Total Users</p>
      <footer class="blockquote-footer">
        <h3 class="custom-font text-white">
       <?php echo $countUsers;?>
</h3>
      </footer>
    </blockquote>
  </div>

</div>



            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  



                  <div class="col-md-6 grid-margin ">
                    <div class="card">
                      <div class="card-body background-color-1">
                        <div class="row">
                          <div class="col-md-12 ">
                           
                        
                      <div class="d-flex  align-items-center pb-2">
                           
                        <div class="dot-indicator bg-danger mr-2"></div>
                              <p class="mb-0">Today's Pending</p>
                          </div>
                            
                          <div class="progress progress-md">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                            <div class="d-flex justify-content-between flex-row pb-2 mt-3 border-bottom">
                          
                              <h4 class="font-weight-semibold text-color mb-0"><i class='fa fa-user'></i> Contact with</h4>
                               <h4> <?php echo $contactPerson ?></h4>
                             
                            </div>
                            <div class="col-md-12 d-flex flex-row justify-content-between mt-3  row pb-2">
                              <h5 class="font-weight-semibold text-color2 mb-0"><i class='fa  fa-tags'></i>  Via <?php echo $platform ?></h5>
                              <h6 class="text-color2"><i class='fa fa-calendar'></i> <?php echo $date?></h6>
                              </div>                         
                      
                              
                        </div>        
                       </div>
                       <div class="d-flex py-2 timeline-item border-bottom">
                             <div class="wrapper">
                              
                              <h5 class="font-weight-semibold text-color2 mb-0"><i class='fa fa-dot-circle-o'></i> At <?php echo $location ?></h5>
                           </div>
                           <small class="text-muted ml-auto "><a href="viewCustomerDetails.php?idcustomer=<?php echo $idcustomer?>">View Details</a></small>
                         </div>
                     
                      </div>
                   
                   
                    </div>
                  </div>

                 
           
             <div class='col-md-6 grid-margin stretch-card'>
                <div class='card'>
                <div class='card-body timeline background-color-1'>
                    <h3 class='card-title mb-3'>Upcoming Activities</h3>
                  <?php 
                  
$sql_load_todaysActivity ="SELECT * FROM future_activity f,activity a,contact_person cp WHERE f.fk_idactivity=a.idactivity AND a.fk_iduser='$current_userID' AND a.fk_idcustomer=cp.fk_idcustomer AND f.date>'$currentDate' AND f.deleted='0' ORDER BY f.date ASC LIMIT 10";
$loaded_todaysActivity = $con->query($sql_load_todaysActivity);
  if ($loaded_todaysActivity->num_rows > 0) {
  while($row = $loaded_todaysActivity->fetch_assoc()) {
    $idcustomer=$row['fk_idcustomer'];
    $contactPerson=$row['name'];
    $getIdActivity=$row['fk_idactivity'];
    $date=$row['date'];
    $location=$row['location'];
    $platform=$row['platform'];
    $to_do_list=$row['to_do_list'];

    $sql_getCustomer ="SELECT name FROM customer WHERE idcustomer='$idcustomer' AND deleted='0'";
    $loaded_Customer = $con->query($sql_getCustomer);
      if ($loaded_Customer->num_rows > 0) {
      while($rowFound = $loaded_Customer->fetch_assoc()) {
        $getCustomerName=$rowFound['name'];


      }
    }

  echo "
              
               
                    <div class='d-flex py-2 timeline-item border-bottom'>
                      <div class='wrapper'>
                      <h5 class='text-dark'>With<br> <br><i class='fa fa-user'></i> Contact person- $contactPerson </h5><br>
                      <h4 class='font-weight-bold text-capitalize text-gray mb-2'><i class='fa fa-check-square-o'></i> Client: $getCustomerName</h4>
                        <h6 class='font-weight-bold text-capitalize text-gray mb-2'><i class='fa fa-calendar'></i>  $date</h6>
                       
                      </div>
                      <span class='ml-auto'> Via $platform</span>
                    </div>
                    
  

        "; }}else {
          echo "No upcoming activities";
        }
        
        
        ?>
            </div>
          </div>
          </div> 
            </div>
            </div>
            </div>
            </div>
          <!-- content-wrapper ends -->
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
   
    <!-- plugins:js -->

 
  </body>
</html>