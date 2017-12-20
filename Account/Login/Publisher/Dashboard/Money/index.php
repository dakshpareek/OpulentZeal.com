
<?php
session_start();
include_once '../../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../../");

}
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

 $resT=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRowT=mysql_fetch_array($resT);
             
  $site=$userRow['website']; 
 
	$con = mysqli_connect('localhost:3306','opulentzeal','hxf4Q81?','ozeal_7796') or Die();




?>



<!DOCTYPE html>
<html lang="en">
  <head>
     <!--Load the Ajax API-->
	 <!--Also In Loginreg/googleapi/-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
       <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([

          ['Date', 'Rs'],
            <?php 
	        	$query = "SELECT SUM(Amount) AS count, Adv FROM alldet where Pub='$site' GROUP BY Adv ORDER BY Adv";

	        	$exec = mysqli_query($con,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['Adv']."',".$row['count']."],";
	        	}
	   ?>
         
        ]);

        var options = {
                };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
      chart.draw(data, options);
  }
  </script>


  
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../Advertiser/Dashboard/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../../Advertiser/Dashboard/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../../Advertiser/Dashboard/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../../Advertiser/Dashboard/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../../Advertiser/Dashboard/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../../../Advertiser/Dashboard/assets/css/style.css" rel="stylesheet">
    <link href="../../../Advertiser/Dashboard/assets/css/style-responsive.css" rel="stylesheet">

    <script src="../../../Advertiser/Dashboard/assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
 <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>Publisher</b></a>
            <!--logo end-->
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../../../Logout/?logout">Logout</a></li>
            	</ul>
            </div>
        </header>
   <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="../../../Advertiser/Dashboard/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $userRow['username']; ?></h5>
              	  	
                  <li class="mt">
                        <a class="active" href="../">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Report</span>
                      </a>
                      <ul class="sub">
                     <li><a  href="../Advertiser">Advertiser</a></li>
					  
                          <li><a  href="index.php">Money</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Start</span>
                      </a>
                      <ul class="sub">

                         <li><a  href="../../../Advertiser/Dashboard/Reset/">Account Setting</a></li>
                          <li><a  href="todo_list.html">Reporting</a></li>
                      </ul>
                  </li>
                 
                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Payments</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Payment History</a></li>
                          <li><a  href="responsive_table.html">Pay Me Now</a></li>
                      </ul>
                  </li>
                 
             
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <h3></h3>
              <!-- page start-->
              <div class="tab-pane" id="chartjs">
                  <div class="row mt">
				  <div align="left">
									<h4 align="center">These Advertisers Also Help You To Make Money.(INR)</h4>
									
									 <div id="columnchart" style="width: 900px; height: 500px;"></div>

									</div>
                  														  
                              </div>
                          
                      </div>
                     
                  </div>
				 
                
                  </div>
              </div>
              <!-- page end-->
          </section>          
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              OpulentZeal.com
              <a href="chartjs.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../../Advertiser/Dashboard/assets/js/jquery.js"></script>
    <script src="../../../Advertiser/Dashboard/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../../Advertiser/Dashboard/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../../Advertiser/Dashboard/assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../../Advertiser/Dashboard/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../../../Advertiser/Dashboard/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../../../Advertiser/Dashboard/assets/js/chart-master/Chart.js"></script>
    <script src="../../../Advertiser/Dashboard/assets/js/chartjs-conf.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

 
</html>
