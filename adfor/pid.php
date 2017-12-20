<?php
include_once '../Loginreg/Dbconnect.php';
$q = mysql_query("select user_id from ides order by time desc limit 1");
$row=mysql_result($q,0);
$sta = mysql_query("select status from ides order by time desc limit 1");
$status=mysql_result($sta,0);


$adi = mysql_query("select adid from ides order by time desc limit 1");
$adid=mysql_result($adi,0);
$add="id";
$adid1=($add.$adid);
$add="id0";
$adid2=($add.$adid);
 
$gt=mysql_query("select camp from users where user_id='$row'");
$ftab=mysql_result($gt,0);
$gpid=mysql_query("select pid from `" . $ftab . "` order by time desc limit 1 ");
$ti=mysql_query("select title from  `" . $ftab . "` order by time desc limit 1 ");
$title=mysql_result($ti,0);
$li=mysql_query("select link from  `" . $ftab . "` order by time desc limit 1 ");
$link=mysql_result($li,0);
$fo=mysql_query("select file from  `" . $ftab . "` order by time desc limit 1 ");
$foo=mysql_result($fo,0);



$hr="http://www.opulentzeal.com/Campaign/uploads/$foo";



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
$text="\n<div class='news-content' id='$adid1'><img src='$hr'><p><a href='$nfil?adid=$adid' target='_blank'>'$title'</p></div>\n";
$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);

#inserting Removing Nodes Code
$insert_marker ="/<!-- Removing Elements -->/";

$text="\n <?php \$sql=mysql_query('select tr from ides where adid=$adid '); \$value= mysql_result(\$sql,0); if(\$value==0)
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
mysql_query("update ides set status='$status' where adid='$adid' ");
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
