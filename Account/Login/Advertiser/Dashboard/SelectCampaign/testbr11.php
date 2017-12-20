<?php
include 'Dbconnect.php';
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
        // including configuration file
?>
 <html>
 <body bgcolor="#E6E6FA">
     <form name="frmdropdown" method="post" action="index.php">
     <center>
           
         
            <strong> Select</strong> 
            <select name="empName" onchange='this.form.submit()'> 
            
               <option value="link"> Select Link </option> 
            <?php
  
                 $dd_res=mysql_query("Select DISTINCT link from `{$userRowT['camp']}` where live=1 ");
                 while($r=mysql_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'>  $r[0] </option>";
                       $var=$r[0];
                 }
 
             ?>
              </select>
     <noscript> <input type="submit" name="find" value="find"/> </noscript>         
    
    
 </center>
</form>
<?php
     if($_POST){
       $select=$_POST['empName'];
       
       $_SESSION['second'] = $select;
      
     }
?>
 <h5 align="center"><a  href="../Statistics/">Statistics</a></h5>
               <h5 align="center">           <a  href="../Browser/">Browser</a></h5>
               <h5 align="center">           <a  href="../Country/">Country</a></h5>
<h5 align="center"> <a href="../OperatingSystem/">Operating System</a></h5>
</body>
</html>