<?php
session_start();
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
  <link rel="stylesheet" href="../assets/css/rates.css">
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
          <li >
            <a href="../include/wallet_process.php">
              <i class="tim-icons icon-pin"></i>
              <p>Wallet</p>
            </a>
          </li>
          <li >
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
          <li >
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
          <li class="active ">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Crypto Exchange Rates</h3>
            </div>
            <container class="container" id="rates">
    <cards class="cards">
        <bitcoin style="width: 30%" class="btc">
            <card class="asset-info">
                <div class="title">
                    <img src="https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/btc.svg" width="15%"> 
                    <h3>Bitcoin</h3>
                </div>
                <div class="details">
                    <h4 class="asset-price" id="btcPrice"></h4>
                </div>
            </card>
            <canvas id="btcChart"></canvas>
        </bitcoin>

        <cosmos style="width: 30%" class="cosmos">
            <card class="asset-info">
                <div class="title">
                    <img src="https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/atm.svg" width="15%"> 
                    <h3>Cosmos</h3>
                </div>
                <div class="details">
                    <h4 class="asset-price" id="atomPrice"></h4>
                </div>
            </card>
            <canvas id="cosmosChart"></canvas>
        </cosmos>

        <ethereum style="width: 30%" class="ethereum">
            <card class="asset-info">
                <div class="title">
                    <img src="https://s3.us-east-2.amazonaws.com/nomics-api/static/images/currencies/eth.svg" width="10%"> 
                    <h3>Ethereum</h3>
                </div>
                <div class="details">
                    <h4 class="asset-price" id="ethPrice"></h4>
                </div>
            </card>
            <canvas id="ethereumChart"></canvas>
        </ethereum>
    </cards>
  </container>
                  </div>
    </div>
      <div class="container">
           <div class="row">
               <div class="col-lg-12">
               <div class="card card-nav-tabs text-center">
                            <div class="card-header card-header-primary">
                               <h3>  Crystalsexchange Plc Exchange Rates</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title text-primary">Disclaimer</h4>
                                <p class="card-text">At Crystalsexchange Plc, We track the current crypto rates for you , so you don't have to!</p>
                                <p class="card-text">If you have any questions don't hesitate to contact our support team via the chatbox below or through our <a href="contact.php" class="text-primary">"Contact Page"</a></p>
                                <p class="card-text">REGULARLY CHECK THE EXCHANGE RATES TO SEE WHICH INVESTMENT PLAN IS GREAT FOR YOU !</p>
                                <a href="rates.php#rates" class="btn btn-primary">Go Up</a>
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
  <script>
    const btcData = async () => {
  const response = await fetch('https://min-api.cryptocompare.com/data/v2/histominute?fsym=BTC&tsym=USD&limit=119&api_key=0646cc7b8a4d4b54926c74e0b20253b57fd4ee406df79b3d57d5439874960146');
  const json = await response.json();
  const data = json.Data.Data
  const times = data.map(obj => obj.time)
  const prices = data.map(obj => obj.high)
  return {
    times,
    prices
  }
}


const cosmosData = async () => {
  const response = await fetch('https://min-api.cryptocompare.com/data/v2/histominute?fsym=ATOM&tsym=USD&limit=119&api_key=0646cc7b8a4d4b54926c74e0b20253b57fd4ee406df79b3d57d5439874960146');
  const json = await response.json();
  const data = json.Data.Data
  const times = data.map(obj => obj.time)
  const prices = data.map(obj => obj.high)
  return {
    times,
    prices
  }
}


const ethereumData = async () => {
  const response = await fetch('https://min-api.cryptocompare.com/data/v2/histominute?fsym=ETH&tsym=USD&limit=119&api_key=0646cc7b8a4d4b54926c74e0b20253b57fd4ee406df79b3d57d5439874960146');
  const json = await response.json();
  const data = json.Data.Data
  const times = data.map(obj => obj.time)
  const prices = data.map(obj => obj.high)
  return {
    times,
    prices
  }
}


/// Error handling ///
function checkStatus(response) {
  if (response.ok) {
    return Promise.resolve(response);
  } else {
    return Promise.reject(new Error(response.statusText));
  }
}



/// Charts ///
let createBtcChart
let createCosmosChart
let createethereumChart

async function printBtcChart() {
  let { times, prices } = await btcData()

  let btcChart = document.getElementById('btcChart').getContext('2d');

  let gradient = btcChart.createLinearGradient(0, 0, 0, 400);

  gradient.addColorStop(0, 'rgba(247,147,26,.5)');
  gradient.addColorStop(.425, 'rgba(255,193,119,0)');

  Chart.defaults.global.defaultFontFamily = 'Red Hat Text';
  Chart.defaults.global.defaultFontSize = 12;

  createBtcChart = new Chart(btcChart, {
    type: 'line',
    data: {
      labels: times,
      datasets: [{
        label: '$',
        data: prices,
        backgroundColor: gradient,
        borderColor: 'rgba(247,147,26,1)',
        borderJoinStyle: 'round',
        borderCapStyle: 'round',
        borderWidth: 3,
        pointRadius: 0,
        pointHitRadius: 10,
        lineTension: .2,
      }]
    },

    options: {
      title: {
        display: false,
        text: 'Heckin Chart!',
        fontSize: 35
      },

      legend: {
        display: false
      },

      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },

      scales: {
        xAxes: [{
          display: false,
          gridLines: {}
        }],
        yAxes: [{
          display: false,
          gridLines: {}
        }]
      },

      tooltips: {
        callbacks: {
          //This removes the tooltip title
          title: function() {}
       },
        //this removes legend color
        displayColors: false,
        yPadding: 10,
        xPadding: 10,
        position: 'nearest',
        caretSize: 10,
        backgroundColor: 'rgba(255,255,255,.9)',
        bodyFontSize: 15,
        bodyFontColor: '#303030' 
      }
    }
  });
}



async function printCosmosChart() {
  let { times, prices } = await cosmosData()

  let cosmosChart = document.getElementById('cosmosChart').getContext('2d');

  let gradient = cosmosChart.createLinearGradient(0, 0, 0, 400);

  gradient.addColorStop(0, 'rgba(27,30,54,.5)');
  gradient.addColorStop(.425, 'rgba(46,49,72,0)');

  Chart.defaults.global.defaultFontFamily = 'Red Hat Text';
  Chart.defaults.global.defaultFontSize = 12;

  createCosmosChart = new Chart(cosmosChart, {
    type: 'line',
    data: {
      labels: times,
      datasets: [{
        label: "",
        data: prices,
        backgroundColor: gradient,
        borderColor: 'rgba(46,49,72,1)',
        borderJoinStyle: 'round',
        borderCapStyle: 'round',
        borderWidth: 3,
        pointRadius: 0,
        pointHitRadius: 10,
        lineTension: .2,
      }]
    },

    options: {
      title: {
        display: false,
        text: 'Heckin Chart!',
        fontSize: 35
      },

      legend: {
        display: false
      },

      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },

      scales: {
        xAxes: [{
          display: false,
          gridLines: {}
        }],
        yAxes: [{
          display: false,
          gridLines: {}
        }]
      },

      tooltips: {
        callbacks: {
          //This removes the tooltip title
          title: function() {}
       },
        //this removes legend color
        displayColors: false,
        yPadding: 10,
        xPadding: 10,
        position: 'nearest',
        caretSize: 10,
        backgroundColor: 'rgba(255,255,255,.9)',
        bodyFontSize: 15,
        bodyFontColor: '#303030' 
      }
    }
  });
}


async function printEthereumChart() {
  let { times, prices } = await ethereumData()

  let ethereumChart = document.getElementById('ethereumChart').getContext('2d');

  let gradient = ethereumChart.createLinearGradient(0, 0, 0, 400);

  gradient.addColorStop(0, 'rgba(78,56,216,.5)');
  gradient.addColorStop(.425, 'rgba(118,106,192,0)');

  Chart.defaults.global.defaultFontFamily = 'Red Hat Text';
  Chart.defaults.global.defaultFontSize = 12;

  createEthereumChart = new Chart(ethereumChart, {
    type: 'line',
    data: {
      labels: times,
      datasets: [{
        label: '$',
        data: prices,
        backgroundColor: gradient,
        borderColor: 'rgba(118,106,192,1)',
        borderJoinStyle: 'round',
        borderCapStyle: 'round',
        borderWidth: 3,
        pointRadius: 0,
        pointHitRadius: 10,
        lineTension: .2,
      }]
    },

    options: {
      title: {
        display: false,
        text: 'Heckin Chart!',
        fontSize: 35
      },

      legend: {
        display: false
      },

      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 0,
          bottom: 0
        }
      },

      scales: {
        xAxes: [{
          display: false,
          gridLines: {}
        }],
        yAxes: [{
          display: false,
          gridLines: {}
        }]
      },

      tooltips: {
        callbacks: {
          //This removes the tooltip title
          title: function() {}
       },
        //this removes legend color
        displayColors: false,
        yPadding: 10,
        xPadding: 10,
        position: 'nearest',
        caretSize: 10,
        backgroundColor: 'rgba(255,255,255,.9)',
        bodyFontSize: 15,
        bodyFontColor: '#303030' 
      }
    }
  });
}


/// Update current price ///
async function updateEthereumPrice() {
  let { times, prices } = await ethereumData()
  let currentPrice = prices[prices.length-1].toFixed(2);

  document.getElementById("ethPrice").innerHTML = "$" + currentPrice;
}

async function updateCosmosPrice() {
  let { times, prices } = await cosmosData()
  let currentPrice = prices[prices.length-1].toFixed(2);

  document.getElementById("atomPrice").innerHTML = "$" + currentPrice;
}

async function updateBitcoinPrice() {
  let { times, prices } = await btcData()
  let currentPrice = prices[prices.length-1].toFixed(2);

  document.getElementById("btcPrice").innerHTML = "$" + currentPrice;
}

updateEthereumPrice()
updateCosmosPrice()
updateBitcoinPrice()

printBtcChart()
printCosmosChart()
printEthereumChart()

  </script>
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