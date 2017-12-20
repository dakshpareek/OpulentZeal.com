<?php
include_once '../Loginreg/Dbconnect.php';
$adid=$_GET['adid'];
$q = mysql_query("select website from ides where adid='$adid'");
$row=mysql_fetch_array($q);
$adv=$row['website'];
$sql=mysql_query("select tr from ides where adid='$adid'");
$value = mysql_result($sql, 0);
 
$pub="http://www.zaab.com";
$ip = isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
 
$content = 'http://ip-api.com/json/'.$ip;
$info = @json_decode(file_get_contents($content));

$ipc=mysql_query("select count(ip) as count from alldet where ip='$ip' and DATE(Date) = DATE(NOW())");
$ipval = mysql_result($ipc, 0);


 
if($info->status == 'success'){
	
  echo "Country-> $info->country</br> City-> $info->city </br>";
}else {
  echo "ERROR : couldn't localize visitor's ip address";
}

function getBrowser(){

$agent = $_SERVER['HTTP_USER_AGENT'];
$name = 'NA';


if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {
    $name = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $agent)) {
    $name = 'Mozilla Firefox';
} elseif (preg_match('/Chrome/i', $agent)) {
    $name = 'Google Chrome';
} elseif (preg_match('/Safari/i', $agent)) {
    $name = 'Apple Safari';
} elseif (preg_match('/Opera/i', $agent)) {
    $name = 'Opera';
} elseif (preg_match('/Netscape/i', $agent)) {
    $name = 'Netscape';
}


return $name;
}
echo "Browser->".getBrowser()."</br>";
$br=getBrowser();
$agent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match('/Linux/',$agent)) $os = 'Linux';
elseif(preg_match('/Win/',$agent)) $os = 'Windows';
elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
else $os = 'UnKnown';

echo "Operating System->".$os;

date_default_timezone_set($info->timezone);
$date = date('y/m/d', time());
$date1 = date('h:i:s a', time());
echo "</br>Date:->".$date;
echo "</br>Time:->".$date1;
if($value!=0 && $ipval<3)
{
if(mysql_query("INSERT INTO alldet(Country,City,Browser,Os,Date,Time,Adv,Pub,ip) VALUES('$info->country','$info->city','$br','$os',' $date','$date1','$adv','$pub','$ip')"))
 {
    $value=$value-1;
$que=mysql_query("update ides set tr='$value' where adid='$adid'");
  ?>
        <script>alert('Inserted');
		
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
?>

