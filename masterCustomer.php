<?php
session_start();
include('includes/preConnect.php');
$current_userID=$_SESSION['uid'];
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$get_Idcustomer=$_GET['idcustomer'];
$deleted=1;
mysqli_query($con,"UPDATE customer SET deleted ='$deleted' WHERE idcustomer='$get_Idcustomer'")or die("Delete customer query is incorrect...");
mysqli_query($con,"UPDATE contact_person SET deleted ='$deleted' WHERE fk_idcustomer='$get_Idcustomer'")or die("Delete contact person query is incorrect...");
mysqli_query($con,"UPDATE activity SET deleted ='$deleted' WHERE fk_idcustomer='$get_Idcustomer'")or die("Delete activity query is incorrect...");
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
    <!-- MDBootstrap Datatables  -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
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
              
          
             <div class="col-md-12">
              <div class="row d-flex justify-content-end mb-3">
                 <a href="addCustomer.php?" type="submit" class="btn btn-success mr-2 mt-3" id="">Add New Customer</a>
              </div>
            </div><br>
         
         <div class='col-lg-12 stretch-card'>
<div class='card'>
<div class='card-body'>
<h4 class='card-title text-center '>Current customers</h4> 
<form class='forms-sample table-responsive' method='POST' id='update-user-form' >
<table class='table table-bordered text-center' id='table-customer'>
 <thead>
   <tr>
     <th> # </th>
     <th> Name </th>
     <th> Address </th>
     <th> City </th>
     <th> Phone </th>
     <th> Email</th>
   
     <th> View</th>
     <th> Delete </th>
   </tr>
 </thead>
         <?php
         
         
$sql_load_customer = "SELECT * FROM customer Where fk_iduser='$current_userID' AND deleted = '0' ORDER BY name DESC ";
$loaded_customer = $con->query($sql_load_customer);
$count=0;
if ($loaded_customer->num_rows > 0) {
while($row = $loaded_customer->fetch_assoc()) {
 $count=$count+1;
 $found_idcustomer=$row['idcustomer'];
 $customer_name=$row['name'];
         
 $customer_address=$row['address'];
 $customer_city=$row['city'];
 $customer_phone=$row['phone'];
 $customer_email=$row['email'];



echo "
             




                   <tbody id='user-table'>
                   
                  <tr class='table-bordered'>
                  <td>$count</td>
                  <td>$customer_name</td>
                  <td>$customer_address</td>
                  <td>$customer_city</td>
                  <td>$customer_phone</td>
                  <td>$customer_email</td>
                
                  <td>      
                           
                  <a href='viewCustomerDetails.php?idcustomer=$found_idcustomer'
                  class='btn btn-secondary'>
                  <i class='mdi mdi-cloud-download'></i> View </a>
                  </td>
                  <td> 
                  <a href='masterCustomer.php?idcustomer=$found_idcustomer&action=delete' class='btn btn-danger'>
                  <i class='mdi mdi-alert-outline'></i>Delete</a>
                  </td>
                </tr>
                   </tbody>
             
        
                     
                   "	;

}
}
else {
echo "0 results Found";
}

         
         ?>
             </table>
               </form>
                </div>
             </div>
           </div> 
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


    
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script src="assets/js/shared/off-canvas.js"></script> 

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
 $(document).ready(function() {
    $('#table-customer').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
 </script>
 
  </body>
</html>