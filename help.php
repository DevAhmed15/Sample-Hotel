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
      <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1>
      <div class="social-icons"> <span>Follow Us:</span><a href="www.facebook.com" class="icon-2"></a>
       <a href="www.twitter.com" class="icon-1"></a>  <a href="help.php" class="icon-3" title="Help"></a></div>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="images/slider-1-small.jpg" alt=""></li>
            <li><img src="images/slider-2-small.jpg" alt=""></li>
            <li><img src="images/slider-3-small.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a>
      </div>
      <nav>
        <ul class="menu">
          <li><a href="index.php">Main</a></li>
          <li><a href="buying.php">Buying</a></li>
          <li><a href="selling.php">Selling</a></li>
          <li><a href="reserv.php">Reservation</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="contacts.php">Contacts</a></li>
        </ul>
      </nav>
    </div>
  </header>

<!--==============================content================================-->
  <section id="content">
    <br /><br />
        <h4> - You Can Register To our Web Site You Can GO TO Register Form and Fill Data Then You Can Follow Rules Then You Can Register if You Want to Register Follow This Link <a href="Register.html">Register Here</a></h4>
        <h3> - You Can Login To Our System By Visiting Login Form & Enter Your Email & Password and system will check your email validation if You Want to Login Follow This Link <a href="Login.html">Login Here</a></h3>
        <h4> - You Can Reserve To our Web Site You Can GO TO Reservation Form and Fill Data as you Want Follow Rules Then You Can Register if You Want to Reserve Follow This Link <a href="Reservation.html">Reserve Here</a></h4>
  </section>
<!--==============================footer=================================-->
<footer>
  <p>© 2016 Real Estate</p>
  <p>Website Template by <a target="_blank" href="http://www.templatemonster.com/">FCIH_Developers</a></p>
</footer>
<script>Cufon.now();</script>
</body>
</html>
