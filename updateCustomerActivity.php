<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='update')
{
  $get_idcustomer=$_GET['idcustomer'];
$sql_load_additionalActivity="SELECT * FROM activity WHERE fk_idcustomer='$get_idcustomer'";
$loaded_additionalActivity = $con->query($sql_load_additionalActivity);
if ($loaded_additionalActivity->num_rows > 0) {
    while($row = $loaded_additionalActivity->fetch_assoc()) {
    $idactivity=$row['idactivity'];
    $found_customerId=$row['fk_idcustomer'];
    $fk_idstage=$row['fk_idstage'];
    $potential_value=$row['potential_value'];
    $notes=$row['notes'];  
  }
}else{

      }  
    }
   if(isset($_POST['submit'])) 
      {  
        $customerID=$_POST['customerID'];
        $new_potentialValue=$_POST['potentialValue'];
        $new_fkIdstage=$_POST['fkIdstage'];
        $new_contactPerson_birthday=$_POST['contactPersonBirthday'];
        $new_contactPerson_title=$_POST['contactPersonTitle'];
        $new_activityNotes=$_POST['activityNotes'];      
      mysqli_query($con,"UPDATE activity SET fk_idstage='$new_fkIdstage', potential_value='$new_potentialValue',notes='$new_activityNotes' WHERE fk_idcustomer='$customerID' AND deleted ='0'")or die(" Update  Query 2 is inncorrect..........");
      header("location: viewCustomerDetails.php?idcustomer=$customerID");
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
             

         
              <!-- Contact person -->
     <div class='col-md-6 d-flex align-items-stretch grid-margin '>
     <div class='row flex-grow'>
       <div class='col-12 '>
         <div class='card'>
           <div class='card-body'>
           <form class="forms-sample" action="updateCustomerActivity.php" method="POST">
           <div class='form-group text-center'>
           <label for='exampleInputEmail3'>Update Customer Activity</label>
           <input type='hidden' class='form-control' name="customerID" value='<?php echo $found_customerId?>'>

            </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Potential Value</label>
            <input type='text' class='form-control' name="potentialValue" value='<?php echo $potential_value?>'>
        
            </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Customer Stage</label>
 
           <select class='form-control' name="fkIdstage" value='<?php echo $fk_idstage?>'>";
             <?php
                $sqlStage = "SELECT * FROM stage WHERE deleted='0'";
                $foundStage = $con->query($sqlStage);
                 while ($row = mysqli_fetch_assoc($foundStage)) {
                 $showStageId = $row['idstage'];
                 $showStage=$row['stage'];
                 if($row['idstage']== $fk_idstage){
                   $previousStage=$row['stage'];
                   echo"<option value='$fk_idstage' selected='selected'>$previousStage</option>
                   ";
                 }else{
                 echo "
                 
                     <option value='$showStageId'>$showStage</option>
                 ";
              }
            }
           ?>
            </select> 
           </div>
           <div class='form-group'>
           <label for='exampleInputEmail3'>Added Notes</label>
            <textarea type='text' class='form-control' name="activityNotes" ><?php echo $notes?></textarea>
           </div>
           <div class='text-center'>
           <button type='submit' class='btn btn-success mr-2 mt-3' name='submit'>Confirm & Update</button>
                       
           </div>
           </form>
         </div>
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