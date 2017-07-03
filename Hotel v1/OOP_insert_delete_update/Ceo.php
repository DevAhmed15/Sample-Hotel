<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'dbtuts');






require_once("adminClass.php");
require_once("recepClass.php");
$admin=new adminClass;
$recep=new recepClass;

//$r->setId(1);
//echo $r->getId();
 
 class Ceo
{
	
	

	
 function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB_NAME, $conn);
 }
 
 public function select($table)
 {
  $res=mysql_query("SELECT * FROM $table ");
  return $res;
 }
 
 public function delete($table,$id,$tableIdAdmOrRecep)
 {
  
  //$id=$_GET['delete_id'];  
  $res = mysql_query("DELETE FROM $table WHERE $tableIdAdmOrRecep=".$id);
  return $res;
 }
 //*************************************************************************According to function Overloading ::
 //1-Change number of parameters passed to this method (same method)
 //2-or change data type for parameter that passed to same method
 
 
 
 public function insertAdmin($table,adminClass $admin){
	 $fname=$admin->getFN();
	 $lname=$admin->getLN();
	 $city=$admin->getCountry();
	 $ba=$admin->getBankAccount();
	 $ssn=$admin->getSsn();
	 $g=$admin->getGender();
	 $phone=$admin->getPhone();
	 
	 

  //$id=$_GET['add_id'];
  $res = mysql_query("INSERT INTO  $table(first_name,last_name,user_city,BankAccount,Gender,SSN,phone) 
  VALUES ('$fname','$lname','$city','$ba','$g','$ssn','$phone') ");
  return $res;
 }
 //public function update($table,$id,$fname,$lname,$city)
  public function updateAdmin($table,adminClass $admin)
 {
	 $fname=$admin->getFN();
	 $lname=$admin->getLN();
	 $city=$admin->getCountry();
	 $ba=$admin->getBankAccount();
	 $ssn=$admin->getSsn();
	 $g=$admin->getGender();
	 $phone=$admin->getPhone();
	 
	 

  $id=$_GET['edit_id'];
  
  $res = mysql_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city',BankAccount='$ba',Gender='$g',SSN='$ssn',phone='$phone' WHERE admin_id=".$id);
  return $res;
 }
 
 
 
 public function insertRecep($table,recepClass $recep){
	 $fname=$recep->getFN();
	 $lname=$recep->getLN();
	 $city=$recep->getCountry();
	 $ba=$recep->getBankAccount();
	 $ssn=$recep->getSsn();
	 $g=$recep->getGender();
	 $phone=$recep->getPhone();
	 
	 

  //$id=$_GET['add_id'];
  $res = mysql_query("INSERT INTO  $table(first_name,last_name,user_city,BankAccount,Gender,SSN,phone) 
  VALUES ('$fname','$lname','$city','$ba','$g','$ssn','$phone') ");
  return $res;
 }
 //public function update($table,$id,$fname,$lname,$city)
  public function updateRecep($table,recepClass $recep)
 {
	 $fname=$recep->getFN();
	 $lname=$recep->getLN();
	 $city=$recep->getCountry();
	 $ba=$recep->getBankAccount();
	 $ssn=$recep->getSsn();
	 $g=$recep->getGender();
	 $phone=$recep->getPhone();
	 
	 

  $id=$_GET['edit_id'];
  
  $res = mysql_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city',BankAccount='$ba',Gender='$g',SSN='$ssn',phone='$phone' WHERE recep_id=".$id);
  return $res;
 }
 
 
 
 
 
 
 
 
}

?>