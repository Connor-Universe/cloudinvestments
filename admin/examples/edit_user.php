<?php
session_start();
 include("../../include/config.php");
 $user_id = $_GET['id'];
 $get_user = "select * from users where id = $user_id";
 $run_user_id = mysqli_query($connect,$get_user);
 if(!isset($_SESSION['username']))
 {
     // not logged in
     header("location:../../admin.php");
     echo"<script>alert('This page is for admins only !')</script>";
     exit();
 }elseif(isset($_GET['logout'])){
     session_destroy();
     unset($_SESSION['username']);
     header("location:../../admin.php");
     echo"<script>alert('Your are logging out!')</script>";
 }elseif(!isset($_GET['id'])){
     header("location:users.php");
 }

  $row_user = mysqli_fetch_array($run_user_id);
    $first_name = $row_user['first_name'];    
    $last_name = $row_user['last_name'];
    $email = $row_user['email'];
    $wallet = $row_user['wallet'];
    $username = $row_user['username'];
    $country = $row_user['country'];
    $password = $row_user['password_user'];
    $ip = $row_user['ip'];
    $id = $row_user['id'];
    $status = $row_user['Status'];

  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Admin Page
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
             
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Admin Page
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active">
            <a href="./users.php">
              <i class="tim-icons icon-atom"></i>
              <p>User List</p>
            </a>
          </li>
          <li>
            <a href="./invest-request.php">
              <i class="tim-icons icon-pin"></i>
              <p>Investment Requests</p>
            </a>
          </li>
          <li>
            <a href="./withdraw-request.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Withdraw Request</p>
            </a>
          </li>
          <li>
            <a href="./add_bonus.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Add bonus</p>
            </a>
          </li>
          <li>
          <a href="./add_penalty.php">
          <i class="tim-icons icon-single-02"></i>
          <p>Add Penalty</p>
          </a>
          </li>
          <li>
            <a href="./site-info.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Site Info</p>
            </a>
          </li>
          <li >
            <a href="./edit-investment.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Edit Investments</p>
            </a>
          </li>
          <li >
            <a href="./transaction.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Transaction History</p>
            </a>
          </li>
          <li >
            <a href="./blacklist.php">
              <i class="tim-icons icon-single-02"></i>
              <p>blacklisted users</p>
            </a>
          </li>
          <li>
            <a href="./admin-profile.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li>
            <a href="./customer-support.php">
              <i class="tim-icons icon-align-center"></i>
              <p>Customer Support</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">Admin Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
             
            
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                <li class="nav-link"><a href="site-info.php" class="nav-item dropdown-item">Site Info </a></li>
                  <li class="nav-link"><a href="admin-profile.php" class="nav-item dropdown-item">profile</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="?logout=true" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End Navbar -->
      
    <div class="content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="first">
                          <?php
                          echo"Edit $first_name $last_name's Details";
                          ?>
                        </h3>
                        
                       
                    </div>

                </div>
                <!-- end of row -->
                <div class="row">
                 <div class="col-lg-12">
                   <h3> Edit First Name</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id="first">First Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$first_name";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit First Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter First Name" name = "first">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "first1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>

                 <div class="col-lg-12">
                   <h3> Edit Last Name</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id="last">Last Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$last_name";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit Last Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Last Name" name = "last">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "last1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                 <div class="col-lg-12">
                   <h3> Edit Email</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo"$email";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id='email'>Edit Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Enter Email" name="email">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "email1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                 <div class="col-lg-12">
                   <h3> Edit Password</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Password</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$password";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id='password'>Edit Password</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Password" name = "password">
                                <input type="hidden" value="<?php echo"$id";?>" name = "id">
                                <button class="btn btn-primary" name = "password1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                 <div class="col-lg-12">
                   <h3> Edit Country</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id='country'>Perfect Money Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$country";?>" disabled>
            
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit Perfect Money Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter perfect money Address" name="country">
                       <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "country1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>               
                 <div class="col-lg-12">
                   <h3> Edit Ip</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Ip Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$ip";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id = "ip">Edit Ip Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Ip Address" name="ip">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "ip1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>    
                 <div class="col-lg-12">
                   <h3> Edit Wallet Address</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id ="wallet">Wallet Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$wallet";?>" disabled>
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit Wallet Address</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Wallet" name= "wallet">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "wallet1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                 <div class="col-lg-12">
                   <h3> Edit Username</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id="username">Username</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$username";?>" disabled>
                 
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit Username</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Username" name = "username">
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "username1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                 <div class="col-lg-12">
                   <h3> Edit User Status</h3>
                   <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4" id="username">Status</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="<?php echo"$status";?>" disabled>
                 
                                </div>
                            </div>              
                            </form>
                            <form action="edit_user_function.php" method="POST" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Edit Status</label>
                                <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="suspend">Suspended</option>
                                <option value="block">blocked</option>
                                </select>
                                <input type="hidden" value="<?php echo"$id";?>" name="id">
                                <button class="btn btn-primary" name = "status1">Change</button>
                                </div>
                            </div> 
                            </form>
                 </div>
                  <!--end -->
                </div>
                <!--end of row -->
            </div>
        </div>
    </div>
    <!-- end of content section -->
      <footer class="footer">
        <div class="container-fluid">
    
          <div class="copyright">
          Crystal Exchange Plc is a registered brand name of Exinity Limited, regulated by the Financial Services Commission of Mauritius with license number C113012295.  ©
            <script>
              document.write(new Date().getFullYear())
            </script>
          </div>
        </div>
      </footer>
    </div>
  </div>
   <?php include('../include/side.php');?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>