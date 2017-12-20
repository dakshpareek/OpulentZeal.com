<?php
include_once 'Dbconnect.php';
$adid=$_GET['adid'];
$q = mysql_query("select website from ides where adid='$adid'");
$row=mysql_fetch_array($q);
$adv=$row['website'];
$sql=mysql_query("select tr from ides where adid='$adid'");
$value = mysql_result($sql, 0);
$wed=mysql_query("select user_id from ides where  adid='$adid'");
$webb=mysql_result($wed,0);
$webbb=mysql_query("select website from users where user_id='$webb'");
 $wep=mysql_result($webbb,0);

$pub="http://www.zaab.com";
$ip = isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
 
$content = 'http://ip-api.com/json/'.$ip;
$info = @json_decode(file_get_contents($content));

$ipc=mysql_query("select count(ip) as count from alldet where ip='$ip' and DATE(Date) = DATE(NOW())");
$ipval = mysql_result($ipc, 0);


 

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
$br=getBrowser();
$agent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match('/Linux/',$agent)) $os = 'Linux/Android';
elseif(preg_match('/Win/',$agent)) $os = 'Windows';
elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
else $os = 'UnKnown';


date_default_timezone_set($info->timezone);
$date = date('y/m/d', time());
$date1 = date('h:i:s a', time());
if($value!=0 && $ipval<3)
{

if(mysql_query("INSERT INTO alldet(Country,City,Browser,Os,Date,Time,Adv,Pub,ip,site) VALUES('$info->country','$info->city','$br','$os',' $date','$date1','$adv','$pub','$ip','$wep')"))
 {

    $value=$value-1;
$que=mysql_query("update ides set tr='$value' where adid='$adid'");
  ?>
        <script>
			
		location.href="<?php echo $adv ?>";
		</script>
		<script>
	</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error');</script>
        <?php
 }
}
?>


