<?php


include ('../../classes/advertisment.php');

session_start();

$id = $_SESSION['login_id'];
$name =$_SESSION['login_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>RealEstate</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="../../css/jqtransform.css">
<script src="../../js/jquery-1.7.min.js"></script>
<script src="../../js/jquery.easing.1.3.js"></script>
<script src="../../js/cufon-yui.js"></script>
<script src="../../js/vegur_400.font.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


<script src="../../js/Vegur_bold_700.font.js"></script>
<script src="../../js/cufon-replace.js"></script>
<script src="../../js/tms-0.4.x.js"></script>
<script src="../../js/jquery.jqtransform.js"></script>
<script src="../../js/FF-cash.js"></script>

</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <script>
$(document)
    .ready(function () {
    $('.form-1')
        .jqTransform();
    $('.slider')
        ._TMS({
        show: 0,
        pauseOnHover: true,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 1000,
        preset: 'fade',
        pagination: true,
        pagNums: false,
        slideshow: 7000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});

function addmsg(type, $msg)
{
 
$('#notification_count').html($msg);
 
}
 
function waitForMsg()
{
 
$.ajax({
type: "GET",
url: "unreadcount.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
10000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});

$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});


</script>
 

<style>
#notification_count
{
padding: 0px 10px 10px 10px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
border-radius: 9px;
font-size: 10px;
}
#panel, #flip {
    padding: 5px;
    text-align: right;
}

#panel {
    padding: 10px;
    display: none;
}
</style>
 

  <header>
    <div>
      <h1><a href="index.php"><img src="../../images/logo.jpg" alt=""></a></h1>


<div id="flip">
    <span id="notification_count"></span>
    <a href="#" id="notificationLink" onclick = "return getNotification()">
      <img style="" src="../../images/notification.png">
      </a>
      </div>
          <div id="panel">
<?php
$advObj=new advertisment();
$result=$advObj->ShowAllAdv($id);
if(mysqli_num_rows($result) > 0) 
{      
while($row=mysqli_fetch_assoc($result))
{
$adv_id=$row['adv_id'];
$des=$advObj->ShowTitles($adv_id);
if (mysqli_num_rows($des) > 0) 
    {
     // output data of each row
     
     while($row = mysqli_fetch_assoc($des) )
      {
     $title=$row['title'];
      
     }
 echo "<a href='show_advert.php?id=$adv_id'>"."$title"."</a>" ."<br>";
    }
  }}
        ?>
        </div>
      <div class="social-icons">     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" > 
        <input type="text" name="search" placeholder="Search Persons OR Reservations" id="sea" />
        </form>
            <span>Follow Us:</span>
         <a href="www.facebook.com" class="icon-2"></a> 
         <a href="www.twitter.com" class="icon-1"></a> 
         <a href="help.html" class="icon-3" title="Help"></a><br>
<a href="../logout.php" id="log" />logout</a>         <a href="../editProf.php" id="log" />Edit Profile</a>
</div>
<div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="../../images/slider-1.jpg" alt=""></li>
            <li><img src="../../images/slider-2.jpg" alt=""></li>
            <li><img src="../../images/slider-3.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
      <nav>
        <ul class="menu">
          <li class="current"><a href="indexCust.php">Main</a></li>
          <li><a href="reserve.php">New Reservation</a></li>
          <li><a href="#">Selling</a></li>
          <li><a href="#">Invoices</a></li>
          <li><a href="feedback.php">FeedBack</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
<div class="cont">
<br /><h2 style="border:5px groove #fff; text-align:center; width:900px; margin-left:200px;"> WelCome <?php echo $name?></h2><br /> 
<img src="../2.jpg" style="width:1200px;">

</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2016 Real Estate</p>
  <p>Website Template by <a target="_blank" href="http://www.templatemonster.com/">FCIH_Developers</a></p>

<audio controls="controls">
 <source src="../song.mp3" type="audio/mp3">
</audio>

</footer>
<script>Cufon.now();</script>

</body>
</html>
