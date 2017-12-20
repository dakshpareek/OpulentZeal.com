
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
      <li class="selected">Ads By Opulentzeal.com</li>
      <li id="id01">How Books Can Change Your Life?</li>
      <li >Kindle or Hardcopy</li>
      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="news-preview">

      <div class="news-content top-content">
        <img src="http://cdn.impressivewebs.com/news1.jpg">
        <p><a >Visit OpulentZeal.com</a></p>

        <p>Best Content Recommendation Platform</p>
      </div><!-- .news-content -->

      <div class="news-content" id="id1">
        <img src="http://cdn.impressivewebs.com/news2.jpg">
        <p><a href="pubid1.php?adid=1" target="_blank">New leash laws in effect for floppy-eared dogs</a></p>

        <p>Ears on dogs can be a tricky thing. Find out more about this amazing story and why these dogs are a nuisance.</p>
      </div><!-- .news-content -->

      <div class="news-content">
        <img src="http://cdn.impressivewebs.com/news3.jpg">
        <p><a href="#">Insider: Can palm trees be saved?</a></p>

        <p>Ah, the palm tree. It feeds us, it shades us, it does whatever we ask. We should think about it more deeply.</p>
      </div><!-- .news-content -->



    </div><!-- .news-preview -->

  </div><!-- .news-holder -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/vertical.news.slider.min.js"></script>
</body>
</html>

<?php
include_once '../Loginreg/Dbconnect.php';
$sql=mysql_query("select tr from ides where adid='1'");
$value= mysql_result($sql,0);
if($value==0)
{
?>
<script>
var elem = document.getElementById('id01');
elem.parentNode.removeChild(elem);
var elem = document.getElementById('id1');
elem.parentNode.removeChild(elem);

</script>
<!--<script type="text/javascript">document.getElementById('id1').style.display = 'none';</script> 
<script type="text/javascript">document.getElementById('id01').style.display = 'none';</script> -->

<?php
}
?>

