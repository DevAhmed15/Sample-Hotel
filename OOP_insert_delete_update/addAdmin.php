<?php
require_once 'Ceo.php';
$CEO = new Ceo();

require_once 'adminClass.php';
$admin = new adminClass();


$tableName = "admin";

if(isset($_POST['AddBtn']))
{
 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $city = $_POST['city_name'];
 $ssn = $_POST['ssn'];
 $phone = $_POST['phone'];
 $ba = $_POST['bankAccount'];
 $g = $_POST['gender'];
 
  $admin->setFN($fname);
  $admin->setLN($lname);
  $admin->setCountry($city);
  $admin->setSsn($ssn);
  $admin->setBankAccount($ba);
  $admin->setPhone($phone);
  $admin->setGender($g);
 
 //$id=$_GET['add_id'];
 //$res=$con->update($table,$id,$fname,$lname,$city);
  $res=$CEO->insertAdmin($tableName,$admin);

 if($res)
 {
	 
  ?>
  <script>
  alert('Record Added...');
        window.location='admin.php'
        </script>
  <?php
 }
 else
 {
	 die('Invalid query: ' . mysql_error());
  ?>
  <script>
  alert('error Adding  record...');
        window.location='admin.php'
        </script>
		
  <?php
 }
}
// data update code ends here.

?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>

</body>
</html>
