<?php
session_start();
include('includes/preConnect.php');
include('includes/checkSession.php');
$current_userID=$_SESSION['uid'];
if(isset($_POST['submit-report'])) {
$current_iduser=$_POST['current-iduser'];
$report_customerSelected=$_POST['report-customerSelected'];
$report_date=$_POST['report-date'];
$report_location=$_POST['report-location'];
$report_platform=$_POST['report-platform'];
$report_memo=$_POST['report-memo'];
$load_stage="SELECT idstage FROM stage s, activity a WHERE a.fk_iduser='$current_userID' AND a.fk_idcustomer='$report_customerSelected' AND s.idstage =a.fk_idstage AND a.deleted='0'";
$loaded_stage = $con->query($load_stage);
if ($loaded_stage->num_rows > 0) {
  while($row3 = $loaded_stage->fetch_assoc()) {
   $report_customerStage=$row3['idstage'];   
  }
}else {
 $report_customerStage="No stage found";
}
 $file = $_FILES['file']['name'];
 $fileTmp = $_FILES['file']['tmp_name'];
 $deleted='0';
 $set_idreport=rand(100,1000000);
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$final_file = rand(1000,1000000).$file;
$valid_extensions = array('mp3', 'mp4'); // valid extensions
$path = 'recordings/'; // upload directory
$sql_insert_UserActivityReport="INSERT INTO report (idreport,fk_idactivity,fk_idstage,date,location,platform,memo,deleted) VALUES ('$set_idreport',(SELECT idactivity FROM activity WHERE fk_iduser='$current_iduser' AND fk_idcustomer='$report_customerSelected'),'$report_customerStage','$report_date','$report_location','$report_platform','$report_memo','$deleted')";
			if (mysqli_query($con, $sql_insert_UserActivityReport) ) {
				 json_encode(array("statusCode"=>200));
			} 
			else {
				 json_encode(array("statusCode"=>201));
			}
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_file); 
$sql_insert_UserD_Report="INSERT INTO d_report (fk_idreport,media) VALUES ('$set_idreport','$path')";
if (mysqli_query($con, $sql_insert_UserD_Report) ) {
   json_encode(array("statusCode"=>200));
   move_uploaded_file($fileTmp,$path); 
   $_SESSION['success_message'] = "Data has been saved successfully. ";
   header("Location: userReportActivity.php");
   exit();
} 
else {
   json_encode(array("statusCode"=>201));
}
}
}
else 
{
}
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $got_idreport = $_GET['idreport'];
  $deleted = '1';
/*this is delete query*/
  mysqli_query($con, "UPDATE report SET deleted ='$deleted' WHERE idreport='$got_idreport'") or die("Delete  query is incorrect...");
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                       <div class="text-center">
                       <h4 class="card-title">Add New Report</h4>
                       </div>
                       
                        <form class="forms-sample" action="userReportActivity.php" method="POST" id="report-form" enctype='multipart/form-data'>
                         <div class="row  d-flex justify-content-between">
                        <div class='form-group col-md-4'>
                       <label>Select Customer (dropdown)</label><br>
                     <input type="hidden" class="form-control" name="current-iduser" value='<?php echo $_SESSION["uid"]?>'>

                  <select class='form-control' name ='report-customerSelected'>";
                    <?php 
                      $sqlCustomer = "SELECT c.idcustomer,c.name FROM customer c ,activity a WHERE c.idcustomer=a.fk_idcustomer AND a.fk_iduser='$current_userID' AND c.deleted='0'";
                       $foundCustomer = $con->query($sqlCustomer);
                         while ($row = mysqli_fetch_assoc($foundCustomer)) {
                           $foundCustomer_id = $row['idcustomer'];
                            $foundCustomer_name=$row['name'];
                             echo "
                                <option value='$foundCustomer_id'>$foundCustomer_name</option>
                                   ";
                         }                            
                     ?>           
                           </select>                       
                       </div>
              
                      </div>
                     <div class="row d-flex justify-content-between">
                          <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" class="form-control" name="report-date" placeholder="date">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Location</label>
                            <input type="text" class="form-control" name="report-location" placeholder="location">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Platform</label>
                            <input type="text" class="form-control" name="report-platform" placeholder="platform">
                          </div>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputPassword1" >Memo</label>
                            <textarea type="text" class="form-control" name="report-memo" placeholder="memo"></textarea>
                          </div>

                        <div class="form-group">
                           <label for="file">Record Upload</label>
                          <input type="file" class="form-control field" id="file"  name="file" />
                        

                         </div>
                        
                        <div class="text-center">
                          <button type="submit" class="btn btn-success mr-2 " name="submit-report">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
             
              
              <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                <div class="col-md-12 d-flex justify-content-center">
                        <div class=" alert alert-success alert-dismissible fade show" id="successMsg">  
                        <button type="button" class="close" data-dismiss="alert">×</button>  
                         <strong><?php echo $_SESSION['success_message']; ?></strong> 
                          </div> 
                          </div> 
                        <?php
                        unset($_SESSION['success_message']);
                    }
                  
                    ?>
 
             <div class="col-md-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center ">User Report Activity</h4> 
                                    
                    <form class="forms-sample table-responsive" method="POST" id="update-report-form">
                    <table id="table-report" class="table table-bordered text-center" >
                      <thead>
                        <tr>
                        
                          <th> Name </th>
                          <th> Date </th>
                          <th> Location </th>
                          <th> Platform </th>
                          <th> Stage</th>
                          <th  > Memo </th>
                          <th> Media </th>
                          <th> Action </th>
                         
                      
                        </tr>
                      </thead>
                      <tbody id="userReport-table" >
                      
                      </tbody>
                    </table>
                  </form>
                  </div>
                </div>
              </div>  
            </div>
          </div>

  <!-- message -->
       

<!-- message -->
          <!-- content-wrapper ends -->
      
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

<!-- load users -->

<script>
	$.ajax({
		url: "includes/loadUserReportData.php",
		type: "POST",
		cache: false,
		success: function(data){
			// alert(data);
			$('#userReport-table').html(data); 
		}
	});

  
</script>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 <script src="assets/js/shared/off-canvas.js"></script> 
 <!-- MDBootstrap Datatables  -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script>
 $(document).ready(function() {
    $('#table-report').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
 </script>
 
 
  </body>
</html>

