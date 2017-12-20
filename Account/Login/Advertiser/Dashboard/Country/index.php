<?php
session_start();
include_once '../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../../");

}
 
 $resT=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRowT=mysql_fetch_array($resT);
$email=$userRowT['email'];
$spdate=$userRowT['spdate'];
$spl=$userRowT['spl'];
$site=$userRowT['website'];
  
 	$con = mysqli_connect('localhost:3306','opulentzeal','hxf4Q81?','ozeal_7796') or Die();


?>




<!DOCTYPE html>
<html lang="en">
  <head>
     <!--Load the Ajax API-->
	 <!--Also In Loginreg/googleapi/-->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([

          ['Country', 'Visits'],
           <?php 
	        	$query = "SELECT count(id) AS count, Country FROM alldet Where Adv='$spl' AND Date='$spdate' GROUP BY Country";

	        	$exec = mysqli_query($con,$query);
	        	while($row = mysqli_fetch_array($exec)){

	        		echo "['".$row['Country']."',".$row['count']."],";
	        	}
	   ?>
        ]);

        var options = {
        	
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart'));

        chart.draw(data, options);
      }
    </script>     

    

    <title>Country</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../assets/js/chart-master/Chart.js"></script>
    
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
            <a href="opulentzeal.com" class="logo"><b>Advertiser</b></a>
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
              
              	  <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $userRowT['username']  ?></h5>
              	  	
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
                    <li><a  href="../SelectCampaign/">Select Campaign</a></li>
                        <li><a  href="../Statistics/">Statistics</a></li>
                          <li><a  href="../Browser/">Browser</a></li>
                          <li><a  href="../Country/">Country</a></li>
                           <li><a  href="../OperatingSystem/">Operating System</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Start</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="../StartCampaign/">Start Campaign</a></li>
						    <li><a  href="../Reset/">Account Setting</a></li>
                          <li><a  href="#">Tax Information</a></li>
                          <li><a  href="#">Reporting</a></li>
                      </ul>
                  </li>
                 
                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Payments</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Payment History</a></li>
                          <li><a  href="#">Pay Me Now</a></li>
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
		  <form name="frmdropdown" method="post" >
     <center>
           
         
            <strong> Select Date</strong> 
            <select name="empName" onchange='this.form.submit()'> 
           
               <option value=""> Select Date </option> 
            <?php
  
                 $dd_res=mysql_query("Select DISTINCT date from alldet where site='$site' ");
                 while($r=mysql_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'>  $r[0] </option>";
                       $var=$r[0];
                 }
 
             ?>
              </select>
   <noscript>  <input type="submit" name="find" value="find"/> </noscript>
    
 </center>
</form>
<?php
     if($_POST){
       $select=$_POST['empName'];
       
       $_SESSION['first'] = $select;
      mysql_query("Update users SET spdate='$select' where email='$email'");
	  echo "<script> location.href = 'index.php'; </script>";
     }
?>
          <h3></h3>
              <!-- page start-->
          
                  <div class="row mt">
                     <h4 align="center">These Are The Countries From Where Your Visitors Are Coming.</h4>
								   <div id="geochart" ></div>
								  
                             
                          
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
              © OpulentZeal
              <a href="chartjs.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../assets/js/chart-master/Chart.js"></script>
    <script src="../assets/js/chartjs-conf.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

 
</html>
