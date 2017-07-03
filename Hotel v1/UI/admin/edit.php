<?php

include ('../../classes/admin.php');

  $id=$_GET['id'];

$room=new room();
$result=$room->ShowRoomData($id); 
$adm=new admin();

if( @$_POST['submit'] )
{
  $adults=$_POST['adult'];
$childs=$_POST['child'];
$price=$_POST['price'];
$imageFile=$_FILES['image'];

  if(isset($imageFile))
  {
$resultUp=$adm->roomUpdate($id,$adults,$childs,$price,$imageFile);
echo $resultUp;
}
else 
{
echo "<script> alert('INSERT FILE'); </script>";
}
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
      <h1><a href="indexAdm.php"><img src="../../images/logo.jpg" alt=""></a></h1>
   
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
          <li><a href="indexAdm.php">Main</a></li>
          <li class="current"><a href="contRoom.php">Rooms</a></li>
          <li><a href="#">Selling</a></li>
          <li><a href="#">Renting</a></li>
          <li><a href="complain.php">Complimants</a></li>
          <li><a href="feedback.php">Feed Backs</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
   <form class="form" method="post" enctype="multipart/form-data">
<div class="edit">
<?php while($row=mysqli_fetch_assoc($result))
{
	?>
<label>Adults Capacity : </label>
<input class="inp" value="<?php echo $row['adult_value'] ?>" name="adult" required/>
<br />
<label>Children Capacity : </label>
<input class="inp"  value="<?php echo $row['children_value'] ?>" name="child" required/>
<br />
<label>Price : </label>
<input class="inp" value="<?php echo $row['value'] ?>" name="price" required/>
<br />
<label>Current IMG name : </label>
<input class="inp" value="<?php echo $row['name'] ?>" disabled/>
<br /><br /><br />
<label>New ROOM Image : </label>
<input class="inp" type="file" name="image" required/>

<?php } ?>
<br />
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
