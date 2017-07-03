<?php
session_start();
include ('../classes/person.php');


$id = $_SESSION['login_id'];

$cont=new person();
$result=$cont->editData($id); 

if(@$_POST['submit'])
{
 $name=$_POST['fname'];
$add=strtolower($_POST['add']);
$ssn=$_POST['ssn'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];

$resultUp=$cont->editProfile($id,$name,$add,$ssn,$mail,$pass);
echo $resultUp;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>RealEstate</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/jqtransform.css">
<script src="../js/jquery-1.7.min.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/cufon-yui.js"></script>
<script src="../js/vegur_400.font.js"></script>
<script src="../js/Vegur_bold_700.font.js"></script>
<script src="../js/cufon-replace.js"></script>
<script src="../js/tms-0.4.x.js"></script>
<script src="../js/jquery.jqtransform.js"></script>
<script src="../js/FF-cash.js"></script>
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
      <h1><a href="index.php"><img src="../images/logo.jpg" alt=""></a></h1>
   
      <div class="social-icons"> 
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" > 
        <input type="text" name="search" placeholder="Search Persons OR Reservations" id="sea" />
        </form>
         <span>Follow Us:</span>
         <a href="www.facebook.com" class="icon-2"></a> 
         <a href="www.twitter.com" class="icon-1"></a> 
         <a href="help.html" class="icon-3" title="Help"></a><br>
<a href="../logout.php" id="log" />logout</a>
      </div>
         <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="../images/slider-1.jpg" alt=""></li>
            <li><img src="../images/slider-2.jpg" alt=""></li>
            <li><img src="../images/slider-3.jpg" alt=""></li>
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
<label>Full Name : </label>
<input class="inp" value="<?php echo $row['fullname'] ?>" name="fname" required/>
<br />
<label>Email : </label>
<input class="inp"  value="<?php echo $row['Email'] ?>" name="mail" required/>
<br />
<label>Password : </label>
<input class="inp" value="<?php echo $row['Password'] ?>" name="pass" required/>
<br />
<label>ssn : </label>
<input class="inp" value="<?php echo $row['ssn'] ?>" name="ssn" required/>
<br />
<label>address : </label>
<input class="inp" value="<?php echo $row['value'] ?>" name="add" required/>
<br />

<?php } ?>
<br />
<input type="submit" name="submit" Value="Save" class="b"><br />
<input type="reset" Value="Reset" class="b"><br /><br /><br />

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
