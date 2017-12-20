
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
<li id='id028'>'feg'</li>



      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="news-preview">

      <div class="news-content top-content">
        <img src="http://cdn.impressivewebs.com/news1.jpg">
        <p><a >Visit OpulentZeal.com</a></p>

        <p>Best Content Recommendation Platform</p>
      </div><!-- .news-content -->
    <!--New Div Here -->
<div class='news-content' id='id28'><img src='../Account/Login/Advertiser/Dashboard/StartCampaign/uploads/45424-f.png'><p><a href='nlink14.php?adid=28' target='_blank'>'feg'</a></p></div>



    </div><!-- .news-preview -->

  </div><!-- .news-holder -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/vertical.news.slider.min.js"></script>
</body>
</html>

<?php
include_once 'Dbconnect.php';
?>
<!-- Removing Elements -->
 <?php $sql=mysql_query('select tr from ides where adid=28 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id028');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id28');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 