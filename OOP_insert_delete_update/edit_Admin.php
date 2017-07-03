<?php
include_once 'Ceo.php';
$con = new Ceo();


require_once 'adminClass.php';
$admin = new adminClass();


$table_name="admin";
// data insert code starts here.
if(isset($_GET['edit_id']))
{
 $sql=mysql_query("SELECT * FROM $table_name WHERE admin_id=".$_GET['edit_id']);
 $result=mysql_fetch_array($sql);
}
// data update code starts here.
if(isset($_POST['btn-update']))
{
 $fname = $_POST['first_name'];
 $lname = $_POST['last_name'];
 $city = $_POST['city_name'];
 $ssn = $_POST['ssn'];
 $phone = $_POST['phone'];
 $ba = $_POST['bankAccount'];
 $g = $_POST['Gender'];
 
  $admin->setFN($fname);
  $admin->setLN($lname);
  $admin->setCountry($city);
  $admin->setSsn($ssn);
  $admin->setBankAccount($ba);
  $admin->setPhone($phone);
  $admin->setGender($g);
 
 $id=$_GET['edit_id'];
 //$res=$con->update($table,$id,$fname,$lname,$city);
  $res=$con->updateAdmin($table_name,$admin);
 if($res)
 {
  ?>
  <script>
  alert('Record updated...');
        window.location='admin.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error updating record...');
        window.location='adminphp'
        </script>
  <?php
 }
}
// data update code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Data Update and Delete Using OOP - By Ahmed Mohammed</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>PHP Data Insert and Select Data Using OOP - By Cleartuts</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $result['first_name']; ?>"  /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" value="<?php echo $result['last_name']; ?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="City" value="<?php echo $result['user_city']; ?>" /></td>
    </tr>
	<tr>
    <td><input type="text" name="phone" placeholder="phone number" value="<?php echo $result['phone']; ?>" /></td>
    </tr>
	<tr>
    <td><input type="text" name="ssn" placeholder="ssn" value="<?php echo $result['SSN']; ?>" /></td>
    </tr>
	
	
	
	<tr>
    <td><input type="text" name="Gender" placeholder=" Gender" value="<?php echo $result['Gender']; ?>" /></td>
    </tr>
	
	<tr>
    <td><input type="text" name="bankAccount" placeholder="Bank account " value="<?php echo $result['BankAccount']; ?>" /></td>
    </tr>
	
	
    <tr>
	
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE Admin  </strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>