<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: ../LoginPage.html");
}
include_once 'Dbconnect.php';

$ip = isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
 
$content = 'http://ip-api.com/json/'.$ip;
$info = @json_decode(file_get_contents($content));
date_default_timezone_set($info->timezone);
$date = date('y/m/d h:i:s a', time());
$cn=$info->country;


if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));
 $up = mysql_real_escape_string($_POST['pass']);
 $phone = mysql_real_escape_string($_POST['phone']);
 $Country = mysql_real_escape_string($_POST['Country']);
 $website = mysql_real_escape_string($_POST['website']);
 
$chk=mysql_query("select * from users where website='$website' ");
if(mysql_num_rows($chk)) {
?>
  <script>alert('An Account With This Website is Already Registered..!!');
</script>
<?php

    
 }
else
{

 if(mysql_query("INSERT INTO users(username,email,password,Phone,Country,website,up,dcreated) VALUES('$uname','$email','$upass','$phone',' $cn','$website','$up','$date')"))
 {
        $uid=mysql_query("select user_id from users where email='$email' ");
        $row2=mysql_fetch_array($uid);
        $cto=$row2[0];
               $tb="campid";
        $res=($tb."".$cto);
               if(mysql_query("CREATE TABLE `" . $res . "` LIKE campid1"))
        {
               $kyu=mysql_query("update users set camp='$res' where email='$email'");

}
    
        
        ?>
        <script>alert('Thanks You Are Registered. ');
	location.href = '../LoginPage.html';</script>
	
		</script>
		<script>
	</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error While Registering !');</script>
        <?php
 }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Up</title>
<link rel="stylesheet" href="style.css" type="text/css" />

	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body >
<h2 align="center">Register For Free Then Play Both As Advertiser and Publisher</h2> 
<center>
<div id="login-form">
<form method="post" action="">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="text" name="website" placeholder="Website" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Strong Password" required /></td>
</tr>
<tr>
<td><input type="number" name="phone" placeholder="Phone" required /></td>
</tr>
<tr>
</tr>
</td>
</tr>
</td>
</tr>
<tr>
<td>
<a href="http://www.opulentzeal.com/Termsncond.html" target="_blank">I Accepted Terms & Conditions</a>
</td>
</tr>	
	<tr>
		<td>
			<div class="g-recaptcha" data-sitekey="6Lc-NQsUAAAAADD8DwJzSk7bh0Trd7dDOjHN4u7B"></div>
		</td>
	</tr>
	
<tr>

<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="../LoginPage.html">Sign In Here</a></td>
<td><a href="http://www.opulentzeal.com">Home</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
