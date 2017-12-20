<?php
session_start();
include_once '../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../../");

}

$ip = isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
 
$content = 'http://ip-api.com/json/'.$ip;
$info = @json_decode(file_get_contents($content));
date_default_timezone_set($info->timezone);
$date = date('y/m/d h:i:s a', time());


 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
 $resT=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRowT=mysql_fetch_array($resT);

if(isset($_POST['btn-upload']))
{    
     $link = mysql_real_escape_string($_POST['link']);
     $title = mysql_real_escape_string($_POST['title']);
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	function addScheme($url, $scheme = 'http://')
{
  return parse_url($url, PHP_URL_SCHEME) === null ?
    $scheme . $url : $url;
}

$link=addScheme($link);
	
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$get=mysql_query("select adid from ides order by id desc limit 1 ");
    $gett=mysql_result($get,0);
    $gid=$gett+1;
	
	$final_file=str_replace(' ','-',$new_file_name);
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
                
		
		$sql="INSERT INTO `{$userRowT['camp']}`(file,link,title,user_id,time,adid) VALUES('$final_file','$link','$title','{$userRowT['user_id']}','$date','$gid')";
		mysql_query($sql);
		$emm=$userRowT['email'];
		
		
                $sq=mysql_query("insert into ides(user_id,website,time,adid,email) values ('{$userRowT['user_id']}','$link','$date','$gid','$emm')");



		?>
		<script>
        window.location.href=' list.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('You Have To Select Image.');
          window.location.href=' index.php';
        </script>
		<?php
	}
}
?>
