
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
<li id='id010'>'This is Title of My Ad'</li>
<li id='id09'>'Lii'</li>



      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="news-preview">

      <div class="news-content top-content">
        <img src="http://cdn.impressivewebs.com/news1.jpg">
        <p><a >Visit OpulentZeal.com</a></p>

        <p>Best Content Recommendation Platform</p>
      </div><!-- .news-content -->
    <!--New Div Here -->
<div class='news-content' id='id10'><img src='http://www.opulentzeal.com/Campaign/uploads/21722-motivation-for-success-picture-quote.jpg'><p><a href='nlink1.php?adid=10' target='_blank'>'This is Title of My Ad'</p></div>


<div class='news-content' id='id9'><img src='http://www.opulentzeal.com/Campaign/uploads/10051-1.png'><p><a href='nlink1.php?adid=9' target='_blank'>'Lii'</p></div>


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
 <?php $sql=mysql_query('select tr from ides where adid=10 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id010');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id10');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>
 <?php $sql=mysql_query('select tr from ides where adid=9 '); $value= mysql_result($sql,0); if($value==0)
{
?>
<script>
var elem = document.getElementById('id09');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id9');
elem.parentNode.removeChild(elem);
</script>
<?php
}
?>


