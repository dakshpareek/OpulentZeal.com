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


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Start Campaign</title>

</head>
<body>
<div id="body">
	<form action="upload.php" method="post" enctype="multipart/form-data">
    <td><input  type="text" name="link" placeholder="Link of Your Content" size="35" required /></td>
	<hr>
   <td><input  type="text" name="title" placeholder="Enter Title You Want to Show" size="35" required /></td>
   <br> <br> 
		<input  type="file" name="file" /><sub ><font color="red">Image Required</font></sub>
    <hr/>
	<button align="center" type="submit" name="btn-upload">Start</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        
        <label>File Uploaded Successfully</label>
       
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
       
        <?php
	}
	?>
</div>
</body>
</html>