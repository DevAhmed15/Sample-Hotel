<?php
require_once 'Ceo.php';
$CEO = new Ceo();


require_once 'recepClass.php';
$recep = new recepClass();




$table_name = "recep";

if(isset($_POST['AddBtn']))
{
 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $city = $_POST['city_name'];
 $ssn = $_POST['ssn'];
 $phone = $_POST['phone'];
 $ba = $_POST['bankAccount'];
 $g = $_POST['gender'];
 
  $recep->setFN($fname);
  $recep->setLN($lname);
  $recep->setCountry($city);
  $recep->setSsn($ssn);
  $recep->setBankAccount($ba);
  $recep->setPhone($phone);
  $recep->setGender($g);
 
 //$id=$_GET['add_id'];
 //$res=$con->update($table,$id,$fname,$lname,$city);
  $res=$CEO->insertRecep($table_name,$recep);

 if($res)
 {
	 
  ?>
  <script>
  alert('Record Added...');
        window.location='recep.php'
        </script>
  <?php
 }
 else
 {
	 die('Invalid query: ' . mysql_error());
  ?>
  <script>
  alert('error Adding  record...');
        window.location='recep.php'
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
