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
      <div class="social-icons"> <span>Follow Us:</span><a href="www.facebook.com" class="icon-2"></a> 
      <a href="www.twitter.com" class="icon-1"></a> <a href="help.php" class="icon-3" title="Help"></a></div>
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
          <li class="current"><a href="index.php">Main</a></li>
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
    <div class="container_12">
      <div class="grid_8">
        <h2 class="top-1 p3">Welcome message!</h2>
        <p class="p2">Real Estate is one of free website templates created by TemplateMonster.com team. This website template is optimized for 1280X1024 screen resolution. It is also XHTML &amp; CSS valid.</p>
        <p class="line-1">Download the basic package of this Real Estate Template (without PSD source) that is available for anyone without registration. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the free template ZIP package to be delivered to.</p>
        <h2 class="p4">Buyers. Sellers. Proprietors. Agents.</h2>
        <div class="wrap block-1">
          <div> <img src="images/page1-img1.jpg" alt="" class="img-border">
            <h3>Selling</h3>
            <p>Nam liber tempor cum soluta no eleifend option congue nihil imperdiet doming iquod mazim placerat.</p>
            <a href="#" class="button">More</a> </div>
          <div> <img src="images/page1-img2.jpg" alt="" class="img-border">
            <h3>Investing</h3>
            <p>Nam liber tempor cum soluta no eleifend option congue nihil imperdiet doming iquod mazim placerat.</p>
            <a href="#" class="button">More</a> </div>
          <div class="last"> <img src="images/page1-img3.jpg" alt="" class="img-border">
            <h3>Renting</h3>
            <p>Nam liber tempor cum soluta no eleifend option congue nihil imperdiet doming iquod mazim placerat.</p>
            <a href="#" class="button">More</a> </div>
        </div>
      </div>
      <div class="grid_4">
        <div class="left-1">
          <h2 class="top-1 p3">Find your home</h2>
          <form id="form-1" class="form-1 bot-1" action="#">
            <div class="select-1">
              <label>Home type</label>
              <select name="select" >
                <option>Homes for sale</option>
              </select>
            </div>
            <div>
              <label>Location</label>
              <input type="text" value="Address, City, Zip" onBlur="if(this.value=='') this.value='Address, City, Zip'" onFocus="if(this.value =='Address, City, Zip' ) this.value=''">
            </div>
            <div class="select-2">
              <label>Beds</label>
              <select name="select" >
                <option>&nbsp;</option>
              </select>
            </div>
            <div class="select-2 last">
              <label>Baths</label>
              <select name="select" >
                <option>&nbsp;</option>
              </select>
            </div>
            <a class="button">Search</a>
            <div class="clear"></div>
          </form>
          <h2 class="p3">Find our office</h2>
          <img src="images/page1-img4.png" alt="">
          <div class="lists">
            <ul class="list-1">
              <li><a href="#">Asia</a></li>
              <li><a href="#">Australia</a></li>
              <li><a href="#">Africa</a></li>
            </ul>
            <ul class="list-1 last">
              <li><a href="#">North America</a></li>
              <li><a href="#">Europe</a></li>
              <li><a href="#">Latin America</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2016 Real Estate</p>
  <p>Website Template by <a target="_blank" href="http://www.templatemonster.com/">FCIH_Developers</a></p>

</footer>
<script>Cufon.now();</script>
</body>
</html>
