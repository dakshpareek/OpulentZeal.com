<?php
session_start();
include_once '../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../../");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
 $resT=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRowT=mysql_fetch_array($resT);
$result = mysql_query("SELECT * FROM selink1 ");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">


    <title>Dashboard</title>

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
           <a href="#" class="logo"><b>Welcome </b></a>
             
            <!--logo end-->
          
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
              
                    <li><a class="logout" href="logout.php?logout">Logout</a></li>
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
              
              	  <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $userRow['username'];  ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="dashboardlatest.php">
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
                      <li><a  href="campoff.php">Select Campaign</a></li>
                          <li><a  href="new11.php">Statics</a></li>
                          <li><a  href="browser.php">Browser</a></li>
                          <li><a  href="geodemo1.php">Country</a></li>
                           <li><a  href="os.php">Operating System</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Start</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#>Start Campaign</a></li>
                          <li><a  href="#>gallery.html">Tax Information</a></li>
                          <li><a  href="">"todo_list.html">Reporting</a></li>
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
      <form action="" method="post">
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	
                  	<h2>Select Publisher To Get Real and ONLY Interested Visitors For Your Content. </h2>	
                  	<p>We Provides Some Type Based Variety of Website(Publisher's)So You Can Select What Will Best Suitable For You.</p>	
                    
                  	 
                  		
                  	
      
                  
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
               <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4>Select Publishers And We Will Display Your Content On Theirs. (For This Campaign)</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i>Publisher</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Content Type</th>
                                  <th><i class="fa fa-bookmark"></i>Ranking</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th>PID</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                            <?php  while( $row = mysql_fetch_assoc( $result ) ){
                                echo
                              "<tr>
                                  <td><a href=".$row['link']." > {$row['pub']}</a></td>
                                  <td>{$row['ctype']}</td>
                                  <td>{$row['rank']}</td>
                                  <td>{$row['stat']}</td>
                                  <td>
                                     {$row['pid']}
                                  </td>
                                  <td><input type=\"checkbox\" name=\" techno[]\" value=\"".$row['pid']."\" /></td>
                                  
                              </tr>
                              <tr>\n";
                              }
                              ?>
                                  
                              </tbody>
                          </table>
                      
                          <input type="submit" name="sub"/>
                          </form>
                           <?php  
if(isset($_POST['sub']))  
{  
$host="localhost:3306";//host name  
$username="opulentzeal"; //database username  
$word="hxf4Q81?";//database word  
$db_name="ozeal_7796";//database name  
$tbl_name=`{$userRowT['camp']}`; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  
$checkbox1=$_POST['techno'];  
$chk="";  

foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"UPDATE `{$userRowT['camp']}` SET pid='$chk' order by time desc limit 1");  

$in_ch1=mysqli_query($con,"UPDATE mstr_camp SET pid='$chk' order by time desc limit 1");  


if($in_ch==1 && $in_ch1==1)  
   {  
    
    ?>
      <script> alert("Success");
      window.location.href=' plan.html';
      </script>;  
   <?php
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?> 
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 @ Dashboard
              <a href="list.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
 

  

  </body>
</html>
