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
			$u=$_POST['user'];
			if($_POST['f1'])
			{
			if(mysql_query("update users set username='$u' where website='$site'"))
						{
								?>
							<script> alert("User Name Updated");
							location.href="../../../../LoginPage.html";
							</script>
							<?php
						} 
					else
						{
						echo "Bad";
						}

			}	


?>


