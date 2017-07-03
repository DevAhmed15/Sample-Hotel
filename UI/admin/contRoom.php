<?php

session_start();
include ('../../classes/admin.php');

$user=$_SESSION['login_user'];
$id = $_SESSION['login_id'];
$name = $_SESSION['login_name'];

if( @$_POST['submit'] )
{
$adults=$_POST['adult'];
$childs=$_POST['child'];
$price=$_POST['price'];
$imageFile=$_FILES['image'];

$adm=new admin();
$res=$adm->roomAdd($adults,$childs,$price,$imageFile);
echo $res;
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
          <li><a href="feedback.php">FeedBacks</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
<div class="room" style="background: url('header-rooms.jpg');">
<br /> 
<h2 style="width:300px;color:#664236;text-align:center;border:3px groove #DB9D62;margin:0 auto;padding:0 auto;">ADD Room</h2>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="roForm" enctype="multipart/form-data">
  <label>No. of adult (MAX is 9)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="adult" type="number" min="1" max="9" required><br />
  <label>No. of Children (MAX is 5)</label>
    <input name="child" type="number" min="0" max="5" required><br />
      <label>Price For DAY   </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="price" type="number" required><span style="font-size:20px;color:#664236;"> $ </span> <br />
    <label> Image for Room </label>
    <input type="file" name="image" required> <br />
    <input type="submit" name="submit"> <br />

</form> 
</div>

<br /> 
<h2 style="width:300px;color:#664236;text-align:center;border:3px groove #DB9D62;margin:0 auto;padding:0 auto;">Edit & Delete Rooms</h2>
  <br />

  <form class="form2" method="post" >
<table class="tab">
  <?php
  $data= new room();
  $result=$data->ShowAllData(); 
$number=mysqli_num_rows($result);
if ($number > 0 )
{
  echo "<tr> <th> ID </th> <th> Adults Capacity </th> <th> Children Capacity </th> <th> Price </th><th> Image </th><th> Edit </th> </tr>";
  
while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
  echo "<td>" . $row['id'] . "</td>" .
 "<td>" . $row['adult_value'] . "</td>" . 
 "<td>" . $row['children_value'] . "</td>" .
 "<td>" . $row['value'] . " $ </td>" .
 "<td>" . '<img height="100" width="200" src="data:image;base64,' .  $row['image'] . ' "> ' . "</td>";

?>
<td><a href="edit.php?id=<?php echo $row['id']?>"><img src="../13.jpg" class="im" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure ?!.')"> <img src="../11.png" class="im" /></a>
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
