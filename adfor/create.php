<?php
include_once 'Dbconnect.php';
 #$uid=mysql_query("select user_id from users order by dcreated desc limit 1;");
   #     $row2=mysql_result($uid,0);
     #   $cto=$row2;
$cto=$_GET["uid"];
echo $cto."</br>";
$file = 'ilink.php';
$nfile="nlink.php";
$ilink="ilink";
$nlink="nlink";
$filename=($ilink."".$cto.".php");
$flink=($nlink."".$cto.".php");
echo $filename;
echo $flink;
if (!copy($file, $filename)) {
    echo "failed to copy $file...\n";
}
  else
{
	?>
	
	<?php
	echo "Copied";
}
if (!copy($nfile, $flink)) {
    echo "failed to copy $nfile...\n";
}
  else
{
	?>
	
	<?php
	echo "Copied";
}
function insert_into_file($file_path, $insert_marker, 
		$text, $after = true) {
	$contents = file_get_contents($file_path);
	$new_contents = preg_replace($insert_marker, 
			($after) ? '$0' . $text : $text . '$0', $contents);
	return file_put_contents($file_path, $new_contents);
}

$file_path =$flink;
$insert_marker = "/#Publisher/";
$linkk=mysql_query("select link from selink1 where nfile='$flink' ");
$pubb=mysql_result($linkk,0);
echo $pubb;
$text = "\n\$pub = $pubb ; ";
$num_bytes = insert_into_file($file_path, $insert_marker, $text, true);






?>