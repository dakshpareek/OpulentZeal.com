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
			$u=$_POST['emaill'];
			
			if(mysql_query("update users set email='$u' where website='$site'"))
						{
								?>
							<script> alert("Email Updated");
							location.href="../../../../LoginPage.html";
							</script>
							<?php
						} 
					else
						{
						echo "Bad";
						}

				


?>


