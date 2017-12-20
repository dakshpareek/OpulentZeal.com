	<?php

            session_start();
            include_once 'Dbconnect.php';
    
            if(!isset($_SESSION['user']))
            {
            header("Location: ../../");
            }
            $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
            $userRow=mysql_fetch_array($res);
            $site=$userRow['website']; 
			$acc=$_POST['acc'];
			$ifsc=$_POST['ifsc'];
	
			
			if(mysql_query("update users set acc='$acc',ifsc='$ifsc' where website='$site'"))
						{
								?>
							<script> alert("Details Updated");
							location.href="../../../../LoginPage.html";
							</script>
							<?php
						} 
					else
						{
						echo "Bad";
						}

			


?>


