<html>
	<body>
<?php 
session_start();
include_once '../Dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: ../../../");

}
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$id=$userRow['user_id'];
$name = $_POST['getplan'];
$res1=mysql_query("SELECT * FROM users WHERE user_id='$id'");
$userRow1=mysql_fetch_array($res1);
$tab=$userRow1['camp'];
$tc=0;
$tm=0;

if($name==pad1)
{
        $tc=40;$tm=206;
	echo '<div align="center"><a href="https://www.instamojo.com/@DASH/l092a0987a73c45c793f8a0e8da1e985e/" rel="im-checkout" data-behaviour="remote" data-style="dark" data-text="Pay: Plan A For 1 Day"></a></div>';  
echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';
}
else if($name==pad3)
{
$tc=40*3;$tm=206*3;
echo  '<a href="https://www.instamojo.com/@DASH/lb16ccaec52334c34b99a754503745147/" rel="im-checkout" data-behaviour="remote" data-style="dark" data-text="Pay: Plan A For 3 Day"></a>';

echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';
}
else if($name==pbd1)
{
$tc=108;$tm=515;
echo '<div align="center"><a href="https://www.instamojo.com/@DASH/l2428dc76457b4f7396164a8e160b02a9/" rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Pay: Plan B For 1 Day"></a></div>';

echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';

}
else if($name==pbd3)
{
$tc=108*3;$tm=515*3;
echo '<a href="https://www.instamojo.com/@DASH/l71ea2da7e5624ec78b4f852aaa7af2ab/" rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Pay: Plan B For 3 Day"></a>';

echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';
}
else if($name==pcd1)
{
$tc=215;$tm=1030;
echo '<div align="center"><a href="https://www.instamojo.com/@DASH/l67941f9862c4401d9d964acd0909e521/" rel="im-checkout" data-behaviour="remote" data-style="flat-dark" data-text="Pay: Plan C For 1 Day"></a></div>';

echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';
}
else if($name==pcd3)
{
$tc=215*3;
$tm=1030*3;
echo '<a href="https://www.instamojo.com/@DASH/lfc447f4e09fc4404bc1a04adc0b709e8/" rel="im-checkout" data-behaviour="remote" data-style="flat-dark" data-text="Pay: Plan C For 3 Day"></a>';

echo '<script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>';
}
$date = date('Y-m-d H:i:s');

echo '<div align="center"><a href="http://www.opulentzeal.com/account/login/advertiser/dashboard">Dashboard </a></div>';
echo '<hr><div align="center"><b align="center">Instructions</b><br/> ';
echo '<h3>1. Enter Your Registered Email Id Only</h3>';
echo '<h3>2. We Will Notify You On Your Email After Receiving Payment</h3>';
echo '<h3>3. It Will Take Upto 1 Hour To Notify You And Then We Start Your Content Promotion</h3>';
echo '<h3><b>4. If You Have Any Query Write Us At contact@opulentzeal.com </b></h3>';
$qu=mysql_query("Update `" . $tab . "` set plan='$name', tc='$tc', tr='$tc',tm='$tm' order by time desc limit 1 ");

$sql=mysql_query("Update ides set tr='$tc' order by id desc limit 1");

	
	?>
	</body>
</html>
