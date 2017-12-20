<?php  
session_start();
include_once 'Dbconnect.php';
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$site=$userRow['website']; 
$setSql= "select date,time,browser,os,country,pub from alldet where site='$site' "; 
$setRec = mysql_query($setSql);  
$columnHeader = '';  
$columnHeader = "Date" . "\t" . "Time" . "\t". "Browser" . "\t". "Os" . "\t". "Country" . "\t". "Publisher" . "\t";  
  
$setData = '';  
  
while ($rec = mysql_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  