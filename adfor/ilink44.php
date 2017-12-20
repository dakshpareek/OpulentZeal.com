
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title></title>
<style>
.news-demo {
  background: #fff;
  height:100%;
  width:100%;
}

.news-demo h1 {
  text-align: center;
  font-family: Arial, sans-serif;
  color: #777;
}

.news-demo .p {
  text-align: center;
  font-family: Arial, sans-serif;
  font-size: 22%;
}

.news-demo .p ~ p {
  margin-top: 0;
}

.news-demo .p a {
  text-decoration: underline;
}

.news-demo .p a:hover {
  color: red;
}
</style>
<link rel="stylesheet" href="css/vertical.news.slider.css?v=1.0">
</head>
<body class="news-demo">
<sup>Recommended By <a href="http://www.opulentzeal.com">OpulentZeal</a></sup>
  <div class="news-holder cf">

    <ul class="news-headlines">
      <li class='selected'>Ads By Opulentzeal.com</li>
<li id='id027'>'rew'</li>
<li id='id019'>'waert'</li>
<li id='id016'>'qwrqwrqwt'</li>
<li id='id015'>'Loll'</li>
<li id='id013'>'Google Ads'</li>
<li id='id014'>'Facebook Ads'</li>
<li id='id013'>'Google Ads'</li>



      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="news-preview">

      <div class="news-content top-content">
        <img src="http://cdn.impressivewebs.com/news1.jpg">
        <p><a >Visit OpulentZeal.com</a></p>

        <p>Best Content Recommendation Platform</p>
      </div><!-- .news-content -->
    <!--New Div Here -->
<div class='news-content' id='id27'><img src='../Account/Login/Advertiser/Dashboard/StartCampaign/Campaign/uploads/19898-g.png'><p><a href='nlink44.php?adid=27' target='_blank'>'rew'</a></p></div>

<div class='news-content' id='id19'><img src='http://www.opulentzeal.com/Campaign/uploads/41300-p4.png'><p><a href='nlink44.php?adid=19' target='_blank'>'waert'</a></p></div>

<div class='news-content' id='id16'><img src='http://www.opulentzeal.com/Campaign/uploads/83568-vgjhvgjgv.png'><p><a href='nlink44.php?adid=16' target='_blank'>'qwrqwrqwt'</a></p></div>

<div class='news-content' id='id15'><img src='http://www.opulentzeal.com/Campaign/uploads/42125-img-20170410-wa0001.jpg'><p><a href='nlink44.php?adid=15' target='_blank'>'Loll'</a></p></div>

<div class='news-content' id='id13'><img src='http://www.opulentzeal.com/Campaign/uploads/79613-g.png'><p><a href='nlink44.php?adid=13' target='_blank'>'Google Ads'</a></p></div>

<div class='news-content' id='id14'><img src='http://www.opulentzeal.com/Campaign/uploads/11136-f.png'><p><a href='nlink44.php?adid=14' target='_blank'>'Facebook Ads'</a></p></div>

<div class='news-content' id='id13'><img src='http://www.opulentzeal.com/Campaign/uploads/79613-g.png'><p><a href='nlink44.php?adid=13' target='_blank'>'Google Ads'</a></p></div>



    </div><!-- .news-preview -->

  </div><!-- .news-holder -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/vertical.news.slider.min.js"></script>
</body>
</html>

<?php
include_once '../Loginreg/Dbconnect.php';
?>
<!-- Removing Elements -->
 <?php $sql=mysql_query('select tr from ides where adid=27 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id027');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id27');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=19 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id019');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id19');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=16 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id016');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id16');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=15 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id015');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id15');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=13 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id013');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id13');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=14 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id014');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id14');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=13 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id013');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id13');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 