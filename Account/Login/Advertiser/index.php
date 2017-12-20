<?php
session_start();
include_once 'Dbconnect.php';

if(isset($_SESSION['user'])!="" AND $_SESSION['ct']==1 )
{
 header("Location: Dashboard/");
}

if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
    $_SESSION['user'] = $row['user_id'];	
    header("Location: Dashboard/");
 }
 else
 {
  ?>
        <script>alert('You Entered Wrong Details');</script>
        <?php
 }
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login as Advertiser</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<h3><b>Advertiser Enter Datails To Access Your DashBoard</b></h3>
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
	<td><a href="../../Forgot"  name="btn-login">Forgot Password</a></td>
</tr>
<tr>
<td><a href="http://www.opulentzeal.com" name="btn-login">Home Page</a></td>
</tr>
<tr>
<td><a href="../../Signup" name="btn-login">Sign Up Here</a></td>

</tr>
</table>
</form>
	
</div>
</center>
</body>
</html>
