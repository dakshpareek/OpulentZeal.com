<?php
session_start();
include_once 'Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$site=$userRow['website']; 
$tc=mysql_query("SELECT count(id) FROM alldet WHERE site='$site' ");
$row = mysql_fetch_array($tc);
$resu = $row[0];

$ct=mysql_query("SELECT count(id) as count FROM alldet WHERE DATE(Date) = DATE(NOW()) AND site='$site' GROUP BY Pub");
$row2=mysql_fetch_array($ct);
$cto=$row2[0];

$mc=mysql_query("select sum(tm) from `" . $userRow['camp'] . "`  where live=1 ");
$new=mysql_fetch_array($mc);
$mc=$new[0];

$mt=mysql_query("SELECT sum(tm) FROM `" . $userRow['camp'] . "`  WHERE  live='1' And DATE(time) = DATE(NOW()) ");
$ro=mysql_fetch_array($mt);
$mto=$ro[0];


if($cto==null)
{
$cto=0;
}
if($mto==null)
{
$mto=0;
}
if($mc==null)
{
$mc=0;
}
if($resu==null)
{
$resu=0;
}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
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
           <a href="#" class="logo"><b>Advertiser</b></a>
             
            <!--logo end-->
          
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
              
                    <li><a class="logout" href="../../../Logout/?logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $userRow['username'];  ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.php">
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
                      <li><a  href="SelectCampaign/">Select Campaign</a></li>
                        <li><a  href="Statistics/">Statistics</a></li>
                          <li><a  href="Browser/">Browser</a></li>
                          <li><a  href="Country/">Country</a></li>
                           <li><a  href="OperatingSystem/">Operating System</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Start</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="StartCampaign/">Start Campaign</a></li>
						    <li><a  href="Reset/">Account Setting</a></li>
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

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h3 align="center"><span class="li_tv"></span><b>     Website: <?php echo $userRow['website']; ?></b></h3>
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_eye"></span>
					  			<h3>Total Clicks</h3><h4><?php echo $resu; ?></h4>
                  			</div>
					  			<p><?php echo $resu; ?> Total Visitors You Got in Total Campaigns.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_banknote"></span>
					  			<h3>Total Money</h3><h4>Rs.<?php echo $mc; ?></h4>
                  			</div>
					  			<p>Rs.<?php echo $mc; ?> You Spent Till Now On All Campaigns.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_eye"></span>
					  			<h3>Clicks Today</h3><h4><?php echo $cto; ?></h4>
                  			</div>
					  			<p>You have Got <?php echo $cto; ?> Clicks Today.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_banknote"></span>
					  			<h3>Money Today</h3><h4>Rs.<?php echo $mto; ?></h4>
                  			</div>
					  			<p>You Have Spent Rs.<?php echo $mto; ?> Today.</p>
                  		</div>
                  		
                  	
                  	</div><!-- /row mt -->	
                 
                      
                    
					  <h3 align="center"><a href="export.php">Export Data in Excel File</a></h3>
		
                  <?php  ?>
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
            <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3 align="center">What To Do Now ?</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <ul>
							<li><b>1. To Start Promoting Your Article or Content Just Go To Start Panel and Select Start Campaign.</b></li><br>
							<li><b>2. This Page (Dashboard) Will Help You To Simply Give You Statistics of Your Acccount.</b></li><br>
							<li><b>3. To Anayze You Content In More Deep You Just Need To Select Report Panel And From There</b></li><br>
							<li><b>   You Need To Choose Select Campaign Option And There You Need To Select Your Ad Content Link.</b></li><br>
							<li><b>4. After Selecting Your Ad Link Now You Can Analyze Your Progress Like From Which Publisher How Many</b></li><br>
							<li><b>Viewers Are Comming,You Can Check Their Browsers,Operating System and Important Thing You Can Also</b></li><br>
							<li><b>Analyze From Which Country Your Interested Visitors Are Comming... Amazing Stuff ?? </b></li><br>
							<li><b>If You Find Any Problem or You Want To Give Any Suggestions Write Us at Contact@OpulentZeal.com</b></li><br>
					</ul>
                                         </div><!-- /content-panel -->
<!-- Content Here -->


               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
         
                 
                      

                       
                       
                      
       

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              © OpulentZeal
              <a href="dashboardlatest.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
 

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome <?php echo $userRow['username']; ?> to our Dashboard!',
            // (string | mandatory) the text inside the notification
            text: 'Here You Can Manage Everything Related To Your Purpose and Can See important Notifications From Us. Go To <a href="# target="_blank" style="color:#ffd777">Home</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86539969-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
