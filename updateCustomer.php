<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
if(isset($_POST['submit'])) 
{
  $idCustomer=$_POST['get_customerId'];
  $new_customer_name=$_POST['customerName'];  
  $new_customer_address=$_POST['customerAddress'];
  $new_customer_city=$_POST['customerCity'];
  $new_customer_phone=$_POST['customerPhone'];
  $new_customer_email=$_POST['customerEmail'];
  $new_customer_fb=$_POST['customerFb'];
  $new_customer_instagram=$_POST['customerInstagram'];
  $new_customer_other=$_POST['customerOther'];
  $new_customer_notes=$_POST['customerNotes'];
mysqli_query($con,"UPDATE customer SET name='$new_customer_name',address='$new_customer_address',city='$new_customer_city', phone='$new_customer_phone',email='$new_customer_email',facebook='$new_customer_fb',instagram='$new_customer_instagram',other_socmed='$new_customer_other',notes='$new_customer_notes' WHERE idcustomer='$idCustomer' AND deleted ='0'")or die(" Update  Query 2 is inncorrect..........");
header("location: viewCustomerDetails.php?idcustomer=$idCustomer");
mysqli_close($con);
}             
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='update')
  {
        $get_idcustomer=$_GET['idcustomer'];
        $userid_online=$_GET['iduser'];
        $sql_load_customer = "SELECT * FROM customer WHERE idcustomer ='$get_idcustomer' AND fk_iduser = '$userid_online' ";
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
                   <h4 class="card-title">Update Customer</h4>
                   
                   </div>
                    <form class="forms-sample" action="updateCustomer.php" method="POST"  >
                      <div class="form-group">
                        <label for="exampleInputName1">Company Name (Customer)</label>
                        <input type="text" class="form-control" name="customerName" value="<?php echo $customer_name;?>">
                        <input type="hidden" class="form-control" name="get_customerId" value="<?php echo $get_idcustomer;?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Address</label>
                        <input type="text" class="form-control" name="customerAddress" value="<?php echo $customer_address;?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">City</label>
                        <input type="text" class="form-control" name="customerCity" value="<?php echo $customer_city;?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" class="form-control" name="customerPhone" value="<?php echo $customer_phone;?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="customerEmail" value="<?php echo $customer_email;?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Facebook</label>
                        <input type="text" class="form-control" name="customerFb" value="<?php echo $customer_fb?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Instagram</label>
                        <input type="text" class="form-control" name="customerInstagram" value="<?php echo $customer_instagram?>" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Other socmed</label>
                        <input type="text" class="form-control" name="customerOther" value="<?php echo $customer_other?>" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Notes</label>
                        <textarea type="text" class="form-control" name="customerNotes" ><?php echo $customer_notes?></textarea>
                      </div>

                      <div class="text-center">
                       <button type="submit" class="btn btn-success mr-2" name="submit">Update</button>
                    </div>
                      
                    </form>
                  </div>
                </div>
              </div>
                                                 
     


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

  
 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 <script src="assets/js/shared/off-canvas.js"></script> 

  </body>
</html>