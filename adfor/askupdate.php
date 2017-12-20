<?php
include_once 'Dbconnect.php';
#$q = mysql_query("select user_id from ides order by time desc limit 1");
#$row=mysql_result($q,0);
$row=$_GET["adid"];
echo "This is adid:".$row;

$sta = mysql_query("select status from ides where adid='$row'");
$status=mysql_result($sta,0);
echo "Status of adid".$status;


$udi = mysql_query("select user_id from ides where adid='$row'");
$uid=mysql_result($udi,0);
echo "This is user_id".$uid;

$camp=mysql_query("select camp from users where user_id='$uid'");
$campid=mysql_result($camp,0);


$add="id";
$adid1=($add.$row);
$add="id0";
$adid2=($add.$row);
 
$gt=mysql_query("select camp from users where user_id='$uid'");
$ftab=mysql_result($gt,0);
$gpid=mysql_query("select pid from `" . $ftab . "` where adid='$row' ");
$ti=mysql_query("select title from  `" . $ftab . "` where adid='$row' ");
$title=mysql_result($ti,0);
$li=mysql_query("select link from  `" . $ftab . "` where adid='$row' ");
$link=mysql_result($li,0);
$fo=mysql_query("select file from  `" . $ftab . "` where adid='$row' ");
$foo=mysql_result($fo,0);



$hr="../Account/Login/Advertiser/Dashboard/StartCampaign/uploads/$foo";


$data=mysql_result($gpid,0);
$spl=explode(",",$data);


if($status==0)
{
foreach ($spl as $key => $value) 
{

$f=mysql_query("select file from selink1 where pid='$value'");
$fil=mysql_result($f,0);
$nf=mysql_query("select nfile from selink1 where pid='$value'");
$nfil=mysql_result($nf,0);

#inserting li element
$file_path =$fil;
$insert_marker = "/<li class='selected'>Ads By Opulentzeal.com<\/li>/";

$text = "\n<li id='$adid2'>'$title'</li>";
$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);

#inserting div element
$insert_marker = "/<!--New Div Here -->/";
$text="\n<div class='news-content' id='$adid1'><img src='$hr'><p><a href='$nfil?adid=$row' target='_blank'>'$title'</a></p></div>\n";
$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);

#inserting Removing Nodes Code
$insert_marker ="/<!-- Removing Elements -->/";

$text="\n <?php \$sql=mysql_query('select tr from ides where adid=$row '); \$value= mysql_result(\$sql,0); if(\$value==0)
{
?>
<script>
var elem = document.getElementById('$adid2');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('$adid1');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>";
$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);
}
#end of for-each loop
$status=1;
mysql_query("update ides set status='$status' where adid='$row' ");
mysql_query("update `" . $campid . "` set live=1 where adid='$row' ");
}
#end of if

function insert_into_file($file_path, $insert_marker, 
		$text, $after = true) {
	$contents = file_get_contents($file_path);
	$new_contents = preg_replace($insert_marker, 
			($after) ? '$0' . $text : $text . '$0', $contents);
	return file_put_contents($file_path, $new_contents);

}
?>

