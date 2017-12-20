<?php
$connection = mysqli_connect('localhost:3306', 'opulentzeal','hxf4Q81?');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ozeal_7796');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="stylee.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1"></span>
	  <input type="text" name="web" class="form-control" placeholder="Email" required>
	</div>
	<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
	<h3 align="center"><a href="http://www.opulentzeal.com">Home</a></h3>
      </form>
<?php session_start();
if (isset($_POST['web'])){
	$web = $_POST['web'];
	$query="SELECT * FROM users WHERE email='$web'";
	$result   = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count=mysqli_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	
		$rows=mysqli_fetch_array($result);
		$pass  =  $rows['up'];//FETCHING PASS
		$to = $rows['email'];
require 'phpmailer/PHPMailerAutoload.php';

	
$mail=new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.opulentzeal.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@opulentzeal.com';                 // SMTP username
$mail->Password = 'lEuy3~76';                           // SMTP password                          // Enable TLS encryption, `ssl` also accepted
$mail->Port =25;                                    // TCP port to connect to

$mail->setFrom('contact@opulentzeal.com', 'Forget Password');
$mail->addAddress($to);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password of your OpulentZeal account';
$mail->Body    = 'You are requested to send your password back<br>Your Account Password is <b>'.$pass.'</b><br>
If You Find Any Problem Do Message Us.';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Password Has Been Sended To Your Official Email';
}
		
}
		
?>
</body>
</html>