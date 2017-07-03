<?php

include 'classes/reservation.php';

if(@$_POST['submit'])
{
  
  $adultsCap=$_POST['adultCap'];
  $childCap=$_POST['childCap'];
  $dateBegin=explode("-",$_POST['start_date']);
  $dateEnd=explode("-",$_POST['end_date']);

$reserve=new reservation();
$resReserve=$reserve->Checks($adultsCap,$childCap,$dateBegin,$dateEnd);

if($resReserve != "reserve")
 echo $resReserve;
 else 
 {
 $_SESSION['Acap']=$adultsCap;
 $_SESSION['Ccap']=$childCap;
  $_SESSION['DateBegin']=$_POST['start_date'];
  $_SESSION['DateEnd']=$_POST['end_date'];

   header('Location:register.php');
 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>RealEstate</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/jqtransform.css">
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/cufon-yui.js"></script>
<script src="js/vegur_400.font.js"></script>
<script src="js/Vegur_bold_700.font.js"></script>
<script src="js/cufon-replace.js"></script>
<script src="js/tms-0.4.x.js"></script>
<script src="js/jquery.jqtransform.js"></script>
<script src="js/FF-cash.js"></script>
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
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <div>
      <h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
      <div class="social-icons"> <span>Follow Us:</span><a href="www.facebook.com" class="icon-2"></a> <a href="www.twitter.com" class="icon-1"></a> <a href="help.html" class="icon-3" title="Help"></a></div>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="images/slider-1.jpg" alt=""></li>
            <li><img src="images/slider-2.jpg" alt=""></li>
            <li><img src="images/slider-3.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
      <nav>
        <ul class="menu">
          <li><a href="index.php">Main</a></li>
          <li><a href="buying.php">Buying</a></li>
          <li><a href="selling.php">Selling</a></li>
          <li class="current"><a href="reserv.php">Reservation</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="contacts.php">Contacts</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
  <div class="cont">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form">
 <br />
 <h3> *** Max Period For Reservation is ONE Year ***</h3>
 <br /><br /><h3 style="margin-left:50px;">Check Your Choises GOOD , Please</h3><br /><br /><br /><br />
        <label for="start_date">Start Date:  </label>
        <input type="date" name="start_date"  class="R" min="<?php date("Y-m-d"); ?>" required/><br /><br />

        <label for="end_date">End Date:  </label>
        <input type="date" name="end_date"  class="R" min="<?php date("Y-m-d"); ?>" required/> <br /><br />

        <label for="adultCap">No of Adults:  ( MAX is 9 )  -  ( MIN is 1)    </label>
        <input type="number" name="adultCap" class="R" min="1" max="9" required/><br /><br />
        
        <label for="childCap">No of Children:   ( MAX is 5 )  -  ( MIN is 0)   </label>
        <input type="number" name="childCap" class="R" min="0" max="5" required/><br /><br />
        
        <input type="submit" value="Check Availability !!" name="submit" class="bb"/>

</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2016 Real Estate</p>
  <p>Website Template by <a target="_blank" href="http://www.templatemonster.com/">FCIH_Developers</a></p>
</footer>
<script>Cufon.now();</script>
</body>
</html>
