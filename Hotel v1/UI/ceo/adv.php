<?php

session_start();
include ('../../classes/ceo.php');

$user=$_SESSION['login_user'];
$id = $_SESSION['login_id'];
$name = $_SESSION['login_name'];

    
  if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['submit'])
{
$desc=$_POST['desc'];
$title=$_POST['title'];
$image=$_FILES['image'];
$price=$_POST['price'];
$s_Date=$_POST['s_Date'];
$e_Date=$_POST['e_Date'];

$ceo=new ceo();

$result=$ceo->Add_ADV($desc,$title,$image,$price,$s_Date,$e_Date);
echo $result[0];
$lID=$result[1];

$Obv= new advertisment();
$res=$Obv->NotifyObserver($lID);
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

<style>
  .form .lab{
    margin-left: 100px;
 }
 .form input{
  margin-right: 300px;
 }
</style>
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <div>
      <h1><a href="indexCeo.php"><img src="../../images/logo.jpg" alt=""></a></h1>
   
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
          <li><a href="contRec.php">Receptionist</a></li>
          <li><a href="report.php">REPROTS</a></li>
          <li class="current"><a href="adv.php">Advertisment</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->

<h2 style="width:300px;color:#fff;text-align:center;border:3px solid #000;margin:0 auto;padding:0 auto;">ADD ADVERTISMENT</h2>
  <br /> <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
  
  <label class="lab">Description</label>
  <textarea style="margin-left:200px;margin-top:10px;" name="desc" rows="5" cols="40" required> 
   </textarea><br />  
   <label class="lab">Title</label>
   <input type="text" name="title" class="m" required> <br />
    
    
    <label class="lab">Room Image</label>
    <input type="file" name="image" class="m" required> <br />
    
    <label class="lab">Start Date</label>
    <input type="date" name="s_Date" class="m" required> <br />
   
   <label class="lab">End Data</label>
   <input type="date" name="e_Date" class="m" required> <br />
  

   <label class="lab">Price</label>
   <input type="number" name="price" class="m" required> <br />

  <input style="margin-left:400px;" type="submit" value="ADD" name="submit" class="s">
  
  </form>

<h2 style="width:300px;color:#fff;text-align:center;border:3px solid #000;margin:0 auto;padding:0 auto;">Edit & Delete ADVERTISMENT</h2>
  <br />

   <form class="form2" method="post" >
<table class="tab">
  <?php
  $obj=new advertisment();
  $result=$obj->S_All(); 
$number=mysqli_num_rows($result);
if ($number > 0 )
{
  echo "<tr> <th> ID </th> <th> Description </th> <th> Title </th> <th> Start Date </th> <th> End Date </th><th> price </th><th> image </th><th> Edit </th> </tr>";
  
while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
  echo "<td>" . $row['id'] . "</td>" .
 "<td>" . $row['describtion'] . "</td>" . 
 "<td>" . $row['title'] . "</td>" .
 "<td>" . $row['s_date'] . "</td>" .
 "<td>" . $row['e_date'] . "</td>" .
 "<td>" . $row['price'] . " $</td>" .
 "<td>" . '<img height="100" width="200" src="data:image;base64,' .  $row['image'] . ' "> ' . "</td>";


?>
<td><a href="editAdv.php?id=<?php echo $row['id']?>"><img src="../13.jpg" class="im" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="deleteAdv.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure ?!.')"> <img src="../11.png" class="im" /></a>
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
