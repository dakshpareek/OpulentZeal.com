	<?php

            session_start();
            include_once 'Dbconnect.php';
    
            if(!isset($_SESSION['user']))
            {
            header("Location: index1.php");
            }
            $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
            $userRow=mysql_fetch_array($res);
            $site=$userRow['website']; 
            echo $site;
			$upass = md5(mysql_real_escape_string($_POST['password']));
			$up = mysql_real_escape_string($_POST['password']);
			
			if(mysql_query("update users set password='$upass',up='$up' where website='$site'"))
						{
								?>
							<script> alert("Password Updated");
							location.href="../../../../LoginPage.html";
							</script>
							<?php
						} 
					else
						{
						echo "Bad";
						}

				


?>


