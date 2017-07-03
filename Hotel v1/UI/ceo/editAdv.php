<?php

include ('../../classes/ceo.php');


  $id=$_GET['id'];

$cont=new advertisment();
$result=$cont->CustomData($id);

  if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'])
{
$desc=$_POST['desc'];
$title=$_POST['title'];
@$image=$_FILES['image'];
$price=$_POST['price'];
$e_Date=$_POST['e_Date'];

$ceo=new ceo();
$resultUp=$ceo->up_ADV($id,$desc,$title,$image,$e_Date,$price);
echo $resultUp;
}

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
      <h1><a href="indexCeo.php"><img src="../../images/logo.jpg" alt=""></a></h1>
   
      <div class="social-icons"> 
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" > 
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
          <li><a href="indexCeo.php">Main</a></li>
          <li><a href="contAdm.php">ADMINS</a></li>
          <li><a href="contRec.php">Receptionist</a></li>
          <li><a href="report.php">REPROTS</a></li>
          <li><a href="adv.php">Advertisment</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
   <form class="form" method="post" >
<div class="edit">
<?php while($row=mysqli_fetch_assoc($result))
{
	?>

<label>Description : </label>
<input class="inp" value="<?php echo $row['describtion'] ?>" name="desc" required/>
<br />
<label>Title : </label>
<input class="inp"  value="<?php echo $row['title'] ?>" name="title" required/>
<br />
<label>Room Image : </label>
 <input type="file" name="image" class="inp" required> <br />

<label>Price : </label>
<input class="inp" value="<?php echo $row['price'] ?>" name="price" required/>
<br />
<label>End Data : </label>
<input class="inp" type="date" name="e_Date" required/>
<br /><br />
<?php } ?>
<input type="submit" name="submit" Value="Save" class="b"><br />
<input type="reset" Value="Reset" class="b"><br /><br /><br />
<a href="indexCeo.php" class="b">Cancel</a>

</div>
</form>
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
