<?php
session_start();

include ('../../classes/reservation.php');

$user=$_SESSION['login_user'];
$id = $_SESSION['login_id'];
$name = $_SESSION['login_name'];
$adultsCap = $_SESSION['Acap'];
$childCap = $_SESSION['Ccap'];

$reserveObj=new reservation();
$result=$reserveObj->ShowAvailable($adultsCap,$childCap);
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
<script src="../../js/Vegur_bold_700.font.js"></script>
<script src="../../js/cufon-replace.js"></script>
<script src="../../js/tms-0.4.x.js"></script>
<script src="../../js/jquery.jqtransform.js"></script>
<script src="../../js/FF-cash.js"></script>
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
      <h1><a href="indexCust.php"><img src="../../images/logo.jpg" alt=""></a></h1>
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
          <li><a href="indexCust.php">Main</a></li>
          <li class="current"><a href="reserve.php">New Reservation</a></li>
          <li><a href="#">Selling</a></li>
          <li><a href="#">Invoices</a></li>
          <li><a href="feedback.php">FeedBack</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->

  <form class="form3" method="post" >
  <h2> *** Check Your Back Account Money Before Reservation, Please </h2> <br /><br /><br />
<table class="tabe">
  <?php

$number=mysqli_num_rows($result);
if ($number > 0 )
{
  echo "<tr> <th> No </th> <th> Price </th> <th> image </th> <th> RESERVEATION </th> </tr>";
  $i=1;
while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
  echo "<td>" . $i . "</td>" . 
 "<td>" . $row['value'] . " $</td>" .
 "<td>" . '<img height="100" width="200" src="data:image;base64,' .  $row['image'] . ' "> ' . "</td>";
$i++;
?>
<td><a href="reserveIT.php?id=<?php echo $row['id']?>" onclick="return confirm('sure ?!.')"> <img src="r.png" class="im" /></a>
</td>
<?php

echo "</tr>";
}
}
  ?>
</table>  
</form>

<!--==============================footer=================================-->
<footer>
  <p>© 2016 Real Estate</p>
  <p>Website Template by <a target="_blank" href="http://www.templatemonster.com/">FCIH_Developers</a></p>


</footer>
<script>Cufon.now();</script>
</body>
</html>
