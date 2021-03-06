<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

        <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
        <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3>Update Your Account Details</h3>

          





          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	                       <form class="form-horizontal style-form" action="resetting.php" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control">
                              </div>
                          </div>
                            
                             <input type="submit" name="f1" class="btn btn-theme"/>
<br><br>                  </form>
 <form class="form-horizontal style-form" action="resettinge.php" method="post">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input type="text" name="emaill" class="form-control">
                                  <span class="help-block"></span>
                              </div>
                          </div>
                            
                             <input type="submit" name="email" class="btn btn-theme"/>
<br>
<br></form> <form class="form-horizontal style-form" action="resettingp.php" method="post">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input type="password" name="password" class="form-control round-form">
                              </div>
                          </div>
                              
                             <input type="submit" name="pass" class="btn btn-theme"/>
<br>
<br></form>
                                                                      </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
                    	
          	<!-- INPUT MESSAGES -->
			   <form class="form-horizontal style-form" action="bankupdate.php" method="post">
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb">Update Your Bank Account Details </h4>
                          <form class="form-horizontal tasi-form" method="get">
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Account No.</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="acc" >
                                  </div>
                              </div>
                              <div class="form-group has-warning">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">IFSC Code</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="ifsc">
                                  </div>
                              </div>
					
 <button type="submit" class="btn btn-theme">Update</button>


                          </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          						<hr>
					
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          		
          	<!-- CUSTOM TOGGLES -->                          </div>
          			</div>
          		</div>
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
                            <a href="form_component.html#" class="go-top">
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
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="../assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="../assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="../assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
