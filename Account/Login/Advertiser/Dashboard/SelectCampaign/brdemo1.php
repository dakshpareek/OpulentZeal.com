<?php
session_start();
include_once 'Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");

}
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

 $resT=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRowT=mysql_fetch_array($resT);


include "testbr11.php"; 
$var=$_SESSION['second'];
echo "   Selected $var";
$email=$userRow['email'];
mysql_query("Update alldet set spl='$var'");
mysql_query("Update users set spl='$var' where email='$email'");
mysql_query("Update `{$userRowT['camp']}` SET spl='$var' ");
mysql_query("Update `{$userRowT['uids']}` SET spl='$var' ");
mysql_query("Update `{$userRowT['bids']}` SET spl='$var' ");
mysql_query("Update `{$userRowT['os']}` SET spl='$var' ");
mysql_query("Update `{$userRowT['geo']}` SET spl='$var' ");
mysql_query("Update `{$userRowT['camp']}` SET spl='$var' ");

?>



