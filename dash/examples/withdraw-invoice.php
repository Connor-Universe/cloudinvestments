
 
<?php

session_start();
 include("../../include/config.php");
if(!isset($_SESSION['reference_id']) AND !isset($_SESSION['token'])){
    header("location:../../users/login.php");
}elseif(isset($_SESSION['reference_id']) AND !isset($_SESSION['token'])){
    header("location:../../users/login.php");
}else{
$get_invoice = "select * from withdraw_request where reference_no ='$_SESSION[reference_no]'";
$run_invoice = mysqli_query($connect, $get_invoice);
$row_invoice = mysqli_fetch_array($run_invoice);
$first_name = $row_invoice['first_name'];
$last_name = $row_invoice['last_name'];
$wallet = $row_invoice['wallet'];
$amount = $row_invoice['amount'];
$btc = $row_invoice['btc'];
$reference = $_SESSION['reference_no'];
$id_no = $_SESSION['id_no'];
}
if(!isset($_SESSION['token']))
{
    // not logged in
    header("location:../../indexc30b.php");
    echo"<script>alert('you need to login first! !')</script>";
    exit();
}elseif(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['token']);
    header("location:../../indexc30b.php");
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
    Crystalsexchange Plc
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
  <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '5224af45cb38d0f906ba872b8ede16d796f8f4bc';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</head>

<body class="white-content">
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
            Crystalsexchange
          </a>
        </div>
        <ul class="nav">
          <li >
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li >
            <a href="./invest.php">
              <i class="tim-icons icon-atom"></i>
              <p>Investment Plans</p>
            </a>
          </li>
          <li>
            <a href="../include/wallet_process.php">
              <i class="tim-icons icon-pin"></i>
              <p>Wallet</p>
            </a>
          </li>
          <li>
            <a href="./withdraw.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Withdraw Funds</p>
            </a>
          </li>
          <li>
            <a href="./profile.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="./refer.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Referal List</p>
            </a>
          </li>
          <li>
            <a href="./company.php">
              <i class="tim-icons icon-align-center"></i>
              <p>Performance</p>
            </a>
          </li>
          <li>
            <a href="./rates.php">
              <i class="tim-icons icon-world"></i>
              <p>bitcoin Rates</p>
            </a>
          </li>
          <li>
          <a href="./contact.php">
              <i class="tim-icons icon-world"></i>
              <p>Contact Us</p>
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
            <a class="navbar-brand" href="javascript:void(0)">User Dashboard</a>
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
      <div class="wallet">
          <div class="container" id="invoice">
              <div class="row">
                  <div class="col-lg-12">
                      <h3>Withdraw Invoice</h3>
                  <div class="card card-nav-tabs text-center">
                        <h4 class="card-header card-header-info">Receiving</h4>
                        <div class="card-body">
                     <h3>Amount(in dollars): <?php echo"$$amount";?></h3>
                     <h3>Amount(in btc): <?php echo"$btc";?>btc</h3>
                     <h3>Receiving bitcoin address: <?php echo"$wallet";?></h3>
                     <h3>Reference No: <?php echo"$reference";?></h3>
                     <h3>Name: <?php echo"$first_name $last_name";?></h3>
  </div>
</div>
                      
                  </div>
                  <div class="col-lg-12">

                
                  <div class="card card-nav-tabs text-center">
                            <div class="card-header card-header-primary">
                               <h3>  Crystalsexchange Plc Withdraw Invoice(PLEASE READ)</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title text-primary">Disclaimer</h4>
                                <p class="card-text">Your Withdraw request will be reviewed and once your Request has been approved your bitcoin will be sent to your wallet and an email containing your invoice will be sent to you</p>
                                <p class="card-text">If you have any questions don't hesitate to contact our support team via the chatbox below or through our <a href="contact.php" class="text-primary">"Contact Page"</a></p>
                                <p class="card-text">DO NOT LET ANYONE SEE YOUR INVOICE!</p>
                                <a href="withdraw-invoice.php#invoice" class="btn btn-primary">Go Up</a>
                            </div>
                          
                            </div>
               </div>
                          
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- end of content section -->
      <footer class="footer">
        <div class="container-fluid">
    
          <div class="copyright">
          Crystalsexchange Plc is a registered brand name of Exinity Limited, regulated by the Financial Services Commission of Mauritius with license number C113012295.  ©
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
