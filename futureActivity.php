<?php
include('includes/preConnect.php');
session_start();
include('includes/checkSession.php');
  
    $current_userID=$_SESSION['uid'];
 
    
    if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
        $get_idactivity = $_GET['idactivity'];
        $deleted = 1;
    
    /*this is delete query*/
        mysqli_query($con, "UPDATE future_activity SET deleted ='$deleted' WHERE fk_idactivity='$get_idactivity'") or die("Delete  query is incorrect...");
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
                        <h4 class="card-title">Add New Future Activity</h4>
                       
                        <form class="forms-sample" action="" method="POST" id="futureActivity-form" >
                         <div class="row d-flex justify-content-between">
                        <div class='form-group col-md-4'>
                       <label>Select Customer (dropdown)</label><br>
                       <input type="hidden" class="form-control" id="current-iduser" value='<?php echo $_SESSION["uid"]?>'>


                        <select class='form-control' id ='futureActivity-customerSelected'>;
                
                    <?php 
                    
                      $sqlCustomer = "SELECT * FROM customer c,activity a WHERE c.deleted='0' AND c.fk_iduser = '$current_userID' AND c.idcustomer=a.fk_idcustomer";
                       $foundCustomer = $con->query($sqlCustomer);
                         while ($row = mysqli_fetch_assoc($foundCustomer)) {
                           $foundCustomer_id = $row['idcustomer'];
                            $foundCustomer_name=$row['name'];

                            if($row['idcustomer']== $_SESSION['cid']){
                              $getCid=$row['idcustomer'];
                              $selectedCustomer=$row['name'];
                              echo"<option value='$getCid' selected='selected'>$selectedCustomer</option>
                              ";
                            }else{
                             echo "
                                <option value='$foundCustomer_id'>$foundCustomer_name</option>
                                   ";
                         }
                        }      
                              ?>           
                           </select> 
                           
                       </div>
                      
                      </div>
                     <div class="row d-flex justify-content-between">
                                      
                  
                          <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" class="form-control" id="futureActivity-date" placeholder="date">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Location</label>
                            <input type="text" class="form-control" id="futureActivity-location" placeholder="location">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Platform</label>
                            <input type="text" class="form-control" id="futureActivity-platform" placeholder="platform">
                          </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">To Do List</label>
                            <textarea type="text" class="form-control" id="futureActivity-todoList" placeholder="list"></textarea>
                          </div>
                       
                       <div class="text-center">
                          <button type="submit" class="btn btn-success mr-2 " id="submit-futureActivity">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
 
             <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center ">User Future Activity</h4> 
                    <form class="forms-sample table-responsive" method="POST" id="update-futureActivity-form">
                    <table  id="table-futureActivity" class="table table-bordered text-center">
                      <thead>
                        <tr>
                        
                          <th> Customer Name </th>
                          <th> Date </th>
                          <th> Location </th>
                          <th> Platform </th>
                          <th> To do List</th>
                          <th> Action</th>
                         </tr>
                      </thead>
                      <tbody id="userFutureActivity-table">
                      
                      </tbody>
                    </table>
                  </form>
                  </div>
                </div>
              </div>  
            </div>
          </div>

     <!-- message -->
        <div class=" col-md-6 alert alert-success alert-dismissible fade show" id="successMsg">  
            <button type="button" class="close" data-dismiss="alert">×</button>  
            <strong>Succuss!</strong>Data has been saved successfully.  
        </div>  

<!-- message -->
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

<!-- load users -->

<script>
	$.ajax({
		url: "includes/loadFutureActivity.php",
		type: "POST",
		cache: false,
		success: function(data){
			// alert(data);
			$('#userFutureActivity-table').html(data); 
		}
	});


  
</script>


 <script>
      $(document).ready(function () {
        $("#successMsg").hide();
        $('#submit-futureActivity').click(function (e) {
         
          // e.preventDefault();
          var current_iduser= $('#current-iduser').val();
          var futureActivity_customerSelected = $('#futureActivity-customerSelected option:selected').val();
          var futureActivity_date = $('#futureActivity-date').val();
          var futureActivity_location = $('#futureActivity-location').val();
          var futureActivity_platform = $('#futureActivity-platform').val();
          var futureActivity_todoList = $('#futureActivity-todoList').val();
    
       
        if(current_iduser!="" || futureActivity_customerSelected!="" || futureActivity_date!="" || futureActivity_location!="" || futureActivity_platform !="" || futureActivity_todoList!=""){
          $.ajax
            ({
              type: "POST",
              url: "includes/sendFutureActivity.php",
              data: {
                 "current-iduser":current_iduser,
                 "futureActivity-customerSelected": futureActivity_customerSelected, 
                 "futureActivity-date": futureActivity_date,
                 "futureActivity-location": futureActivity_location, 
                 "futureActivity-platform": futureActivity_platform, 
                 "futureActivity-todoList": futureActivity_todoList,
                                           
                 },
                 cache: false,
              success: function (data) {
                 $("#successMsg").show();
				
                setTimeout(function(){
                   window.location.href = 'futureActivity.php';
                     }, 100);
                  
                      
                          $('#futureActivity-form')[0].reset();
              }
            });
        } else{

        }
          
        }); 
        $("#successMsg").hide();
      });
    </script>  


 
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  <script src="assets/js/shared/off-canvas.js"></script> 


 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script>
 $(document).ready(function() {
    $('#table-futureActivity').DataTable( {
        "pagingType": "full_numbers"
      
    } );
} );
 </script>
  </body>
</html>

