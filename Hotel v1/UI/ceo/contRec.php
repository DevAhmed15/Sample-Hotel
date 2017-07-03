<?php
session_start();
include ('../../classes/ceo.php');


$user=$_SESSION['login_user'];
$id = $_SESSION['login_id'];
$name = $_SESSION['login_name'];

if( @$_POST['sub'] )
{
$name=$_POST['name'];
$add=strtolower($_POST['add']);
$ssn=$_POST['ssn'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$salary=$_POST['sal'];

$ceo = new ceo();
$result=$ceo->AddWorker($name,$add,$ssn,$mail,$pass,$salary,4);
echo $result;
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
      <h1><a href="index.php"><img src="../../images/logo.jpg" alt=""></a></h1>
   
      <div class="social-icons"> 
         <input type="text" name="search" placeholder="Search Persons OR Reservations" id="sea" />
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
          <li class="current"><a href="contRec.php">Receptionist</a></li>
          <li><a href="report.php">REPROTS</a></li>
          <li><a href="adv.php">Advertisment</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
<div class="addAdm">
<br /> 
<h2 style="width:300px;color:#fff;text-align:center;border:3px solid #000;margin:0 auto;padding:0 auto;">ADD RECEPTIONIST</h2>
  <br /> <form class="form2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
  
  <input type="text" name="name" placeholder="Full Name.." class="m" required> <br />  
   <input type="text" name="add" placeholder="Address.." class="m" required> <br />
    <input type="number" name="ssn" placeholder="SSN.." class="m" required> <br />
   <input type="text" name="mail" placeholder="Email.." class="m" required> <br />
  <input type="password" name="pass" placeholder="Password .." class="m" required><br />
  <input type="number" name="sal" placeholder="Salary .." class="m" required><br />

  <input type="submit" value="Add" name="sub" class="b">
  <input type="reset" value="Cancel"  class="s">
  
  </form>
</div>
<div class="controlAdm">
<br /> 
<h2 style="width:300px;color:#fff;text-align:center;border:3px solid #000;margin:0 auto;padding:0 auto;">Edit & Delete RECEPTIONIST</h2>
  <br /> <form class="form2" action="" method="post" >
<table class="tab">
  <?php
  $DB= new ceo();
  $result=$DB->ShowAllData(4);
$number=mysqli_num_rows($result);
if ($number > 0 )
{
  echo "<tr> <th> ID </th> <th> Name </th> <th> Email </th> <th> SSN </th> <th> Address </th><th> Salary </th><th> Edit </th> </tr>";
  
while ($row = mysqli_Fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['cust_id'] . "</td>" .
 "<td>" . $row['fullname'] . "</td>" . 
 "<td>" . $row['Email'] . "</td>" .
 "<td>" . $row['ssn'] . "</td>" .
 "<td>" . $row['value'] . "</td>" .
 "<td>" . $row['sal_value'] ." $ ". "</td>";

?>
<td><a href="edit.php?id=<?php echo $row['cust_id']?>"><img src="../13.jpg" class="im" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="delete.php?id=<?php echo $row['cust_id']?>" onclick="return confirm('Are you sure ?!.')"> <img src="../11.png" class="im" /></a>
</td>
<?php
echo "</tr>";
}
}
  ?>
</table>  
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
