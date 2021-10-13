<?php
session_start();
  include("../../include/config.php");

  $get_users = "select * from users where verified = 1";
  $run_users = mysqli_query($connect,$get_users);
  $num_users = mysqli_num_rows($run_users);
  $get_invest = "select * from investment_request";
  $run_invest = mysqli_query($connect,$get_invest);
  $num_invest = mysqli_num_rows($run_invest);
  $get_withdraw = "select * from withdraw_request";
  $run_withdraw = mysqli_query($connect,$get_withdraw);
  $num_withdraw = mysqli_num_rows($run_withdraw);
  $get_total_invest = "SELECT SUM(amount_invest) AS value_sum FROM investment_request WHERE verified = 1";
  $run_total_invest = mysqli_query($connect,$get_total_invest);
  $total_invest = mysqli_fetch_assoc($run_total_invest);
  $get_admin = "select username from admin";
  $run_admin = mysqli_query($connect,$get_admin);
  $row_admin = mysqli_fetch_array($run_admin);
  $username = $row_admin['username'];
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
  }
  
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
          <li class="active ">
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
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
                <i class="tim-icons icon-single-02"></i>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="profile.php" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="profile.php" class="nav-item dropdown-item">Settings</a></li>
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
                            Welcome To Your Dashboard
                        </h3>
                        
                        <div class="card card-nav-tabs text-center">
                        <h4 class="card-header card-header-info">Coingalaxy Id's</h4>
                        <div class="card-body">
                            <h4 class="card-title">Username : <?php echo"$username";?></h4>
                         
                            <a href="admin-profile.php" class="btn btn-primary">Profile</a>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="second">
                            Account Details
                        </h3>
                    </div>
                   
                    <div class="col-lg-6">
                    <div class="card card-nav-tabs text-center">
                      
                      <div class="card-body">
                          <h4 class="card-title"><?php echo"$num_users";?></h4>
                          <h4 class="card-text text-muted">Total Users</h4>
                          <a href="users.php" class="btn btn-primary">Users</a>
                      </div>
                  
                      </div>
                    </div>
                    <!-- end -->
                    <div class="col-lg-6">
                    <div class="card card-nav-tabs text-center">
                      
                      <div class="card-body">
                          <h4 class="card-title"><?php echo"$num_withdraw";?></h4>
                          <h4 class="card-text text-muted">Withdraw Requests</h4>
                          <a href="withdraw-request.php" class="btn btn-primary">Requests</a>
                      </div>
                  
                      </div>
                    </div><!--end-->
                    <div class="col-lg-6">
                    <div class="card card-nav-tabs text-center">
                      
                      <div class="card-body">
                          <h4 class="card-title"><?php echo"$num_invest";?></h4>
                          <h4 class="card-text text-muted">Investment Requests</h4>
                          <a href="invest-request.php" class="btn btn-primary">Requests</a>
                      </div>
                  
                      </div>
                    </div><!--end -->
                    <div class="col-lg-6">
                    <div class="card card-nav-tabs text-center">
                      
                      <div class="card-body">
                          <h4 class="card-title">$<?php echo"$total_invest[value_sum]";?></h4>
                          <h4 class="card-text text-muted">Total Investments</h4>
                          <a href="invest-request.php" class="btn btn-primary">Investments</a>
                      </div>
                  
                      </div>
                    </div><!--end -->
                </div>
                <!--end of row -->
            </div>
            <div class="row">
                   <div class="col-lg-12">
                   <h2>User Wallets</h2>
                   <table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>ID NO</th>
            <th>Wallet Amount(USD)</th>
            <th class="text-right">Add/Remove Funds</th>
       
        </tr>
    </thead>
    <tbody>
    <?php
    $get_user = "select * from users where verified = 1";
    $run_user = mysqli_query($connect,$get_user);
    while($row_user = mysqli_fetch_array($run_user)){
    $first_name = $row_user['first_name'];
    $last_name = $row_user['last_name'];
    $id_no = $row_user['id_no'];
    $get_wallet = "select amount from wallet where id_no = $id_no";
    $run_wallet = mysqli_query($connect, $get_wallet);
    $row_wallet = mysqli_fetch_array($run_wallet);
    $amount = $row_wallet['amount'];
    echo"
    <tr>
    <td class='text-center'></td>
    <td>$first_name $last_name</td>
    <td>$id_no</td>
    <td>$$amount</td>
    <td class='text-right'>
       <form action='update.php' method='POST' id = '$id_no'>
         <input class='form-control' type='number' min='0' placeholder='Add/Remove Funds' name='amount'>
         <input type='hidden' name='id' value='$id_no'>
         <button type='submit' class='btn btn-primary' name='add'>Add</button>
         <button type='submit' class='btn btn-primary' name='remove'>Remove</button>
       </form>
    </td>
</tr>
    ";
  }
    ?>
       
       
    </tbody>
</table>
                   </div>
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