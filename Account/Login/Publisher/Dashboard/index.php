<?php
session_start();
include_once '../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
  $site=$userRow['website']; 
$tc=mysql_query("SELECT count(id) as count from alldet where Pub='$site' GROUP BY Pub");
$row = mysql_fetch_array($tc);
$resu = $row[0];

$ct=mysql_query("SELECT count(id) as count FROM alldet WHERE DATE(Date) = DATE(NOW()) AND Pub='$site' GROUP BY Pub");
$row2=mysql_fetch_array($ct);
$cto=$row2[0];
$mto=(4*$cto*85)/100;

$tm=mysql_query("SELECT sum(Amount) from alldet where Pub='$site' GROUP BY Pub");
$row1=mysql_fetch_array($tm);
$tom=$row1[0];
$tom=($tom*85)/100;


if($cto==null)
{
$cto=0;
}
if($mto==null)
{
$mto=0;
}
if($tom==null)
{
$mc=0;
}
if($resu==null)
{
$resu=0;
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">


    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../../Advertiser/Dashboard/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../Advertiser/Dashboard/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../Advertiser/Dashboard/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../Advertiser/Dashboard/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../Advertiser/Dashboard/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="../../Advertiser/Dashboard/assets/css/style.css" rel="stylesheet">
    <link href="../../Advertiser/Dashboard/assets/css/style-responsive.css" rel="stylesheet">

    <script src="../../Advertiser/Dashboard/assets/js/chart-master/Chart.js"></script>
    
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
              
              	  <p class="centered"><a href="profile.html"><img src="../../Advertiser/Dashboard/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
                      
                          
                          <li><a  href="Advertiser/">Advertiser</a></li>
                          <li><a  href="Money/">Money</a></li>
                         
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Start</span>
                      </a>
                      <ul class="sub">
                         
                          <li><a  href="../../Advertiser/Dashboard/Reset/">Account Setting</a></li>
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

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h3 align="center"><span class=" li_tv"></span><b>     Website:<?php echo $userRow['website']; ?></b></h3>
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_eye"></span>
					  			<h3>Total Clicks</h3><h4><?php echo $resu; ?></h4>
                  			</div>
					  			<p><?php echo $resu; ?> Total Clicks You Given To Advertisers. </p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_banknote"></span>
					  			<h3>Total Money</h3><h4>Rs <?php echo $tom; ?></h4>
                  			</div>
					  			<p>Rs <?php echo $tom; ?> Total Money You Made By Advertisers.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_eye"></span>
					  			<h3>Clicks Today</h3><h4><?php echo $cto; ?></h4>
                  			</div>
					  			<p>You have Got <?php echo $cto; ?>Clicks You Given Today.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_banknote"></span>
					  			<h3>Money Today</h3><h4>Rs <?php echo $mto; ?></h4>
                  			</div>
					  			<p>You Have Spent Rs <?php echo $mto; ?>Money You Earned Today.</p>
                  		</div>
                  		                  	
                  	</div><!-- /row mt -->	
           <?php
			$veri=$userRow['confirm'];
			if($veri==1)
			{
			?>
			<span class="li_like"></span><h3 align="center">Your Website Is Verified So Now You Can Place Below Code On Your Website</h3>
					  
			<?php
			}
			else if($veri==0)
			{
			?>
			<span class="li_search"></span><h3 align="center">Your Website Is Not Verified Yet It May Take Few Hours.</h3>		  
			<?php
			}
			else
			{
			?>
			 <span class="li_lock"></span><h3 align="center">Sorry Your Website Is Not Verified.<a href="#">Check Why?</a></h3>		  
			<?php
			}

					  
					  ?>
                      
                    
					
                 
                 
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
            <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3 align="center">Display Ads By Just Inserting This Code Block On Your Website</h3>
		  		<div class="row mt">
			  	<?php	if($veri==1)
			{
			
			$filecode=mysql_query("select file from selink1 where link='$site' ");
				$fileee=mysql_fetch_array($filecode);
				$filee=$fileee[0];
		
			?>
		&lt iframe scrolling="no" id="extFrame" height="400px" src="http://www.opulentzeal.com/adfor/<?php echo $filee ?>" target="_blank"> &lt /iframe &gt
					  
			<?php
			}
                ?>     
                    
                         
                           
							
							<h4><?php echo $userRow['adid'];?></h4>
                             
                             
                                
                               
                              
                             
                           
                             
                              
                          
                         
                  
              	
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
         
                 
                      

                       
                       
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
            OpulentZeal.com
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../Advertiser/Dashboard/assets/js/jquery.js"></script>
    <script src="../../Advertiser/Dashboard/assets/js/jquery-1.8.3.min.js"></script>
    <script src="../../Advertiser/Dashboard/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../Advertiser/Dashboard/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../Advertiser/Dashboard/assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../Advertiser/Dashboard/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../Advertiser/Dashboard/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../../Advertiser/Dashboard/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../../Advertiser/Dashboard/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../Advertiser/Dashboard/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../../Advertiser/Dashboard/assets/js/sparkline-chart.js"></script>    
	<script src="../../Advertiser/Dashboard/assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome <?php echo $userRow['username']; ?> to our Dashboard!',
            // (string | mandatory) the text inside the notification
            text: 'Here You Can Manage Everything Related To Your Purpose and Can See important Notifications From Us. Go To <a href="# target="_blank" style="color:#ffd777">Home</a>.',
            // (string | optional) the image to display on the left
            image: '../../Advertiser/Dashboard/assets/img/ui-sam.jpg',
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
