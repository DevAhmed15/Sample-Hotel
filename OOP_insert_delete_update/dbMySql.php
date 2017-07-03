<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'dbtuts');


$table = null;
$id=null;



require_once("Reservation.php");

$r=new Reservation;
$r->setId(1);
//echo $r->getId();
 
class DB_con
{
	
	

	
 function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
  mysql_select_db(DB_NAME, $conn);
 }
 
 public function select()
 {
  $res=mysql_query("SELECT * FROM users");
  return $res;
 }
 
 //public function delete($table,$id)
  public function delete()
 {
  
  $table="users";
  $id=$_GET['delete_id'];  
  $res = mysql_query("DELETE FROM $table WHERE user_id=".$id);
  return $res;
 }
 
 
 public function insert(Reservation $res){
	 $fname=$res->getFN();
	 $lname=$res->getLN();
	 $city=$res->getCountry();
	 $ba=$res->getBankAccount();
	 $ssn=$res->getSsn();
	 $g=$res->getGender();
	 $phone=$res->getPhone();
	 
	 

  $table="users"; 
  //$id=$_GET['add_id'];
  $res = mysql_query("INSERT INTO  $table(first_name,last_name,user_city,BankAccount,Gender,SSN,phone) 
  VALUES ('$fname','$lname','$city','$ba','$g','$ssn','$phone') ");
  return $res;
 }
 //public function update($table,$id,$fname,$lname,$city)
  public function update(Reservation $res)
 {
	 $fname=$res->getFN();
	 $lname=$res->getLN();
	 $city=$res->getCountry();
	 $ba=$res->getBankAccount();
	 $ssn=$res->getSsn();
	 $g=$res->getGender();
	 $phone=$res->getPhone();
	 
	 

  $table="users"; 
  $id=$_GET['edit_id'];
  
  $res = mysql_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city',BankAccount='$ba',Gender='$g',SSN='$ssn',phone='$phone' WHERE user_id=".$id);
  return $res;
 }
 
 
 
 public function insert(Reservation $res){
	 $fname=$res->getFN();
	 $lname=$res->getLN();
	 $city=$res->getCountry();
	 $ba=$res->getBankAccount();
	 $ssn=$res->getSsn();
	 $g=$res->getGender();
	 $phone=$res->getPhone();
	 
	 

  $table="users"; 
  //$id=$_GET['add_id'];
  $res = mysql_query("INSERT INTO  $table(first_name,last_name,user_city,BankAccount,Gender,SSN,phone) 
  VALUES ('$fname','$lname','$city','$ba','$g','$ssn','$phone') ");
  return $res;
 }
 //public function update($table,$id,$fname,$lname,$city)
  public function update(Reservation $res)
 {
	 $fname=$res->getFN();
	 $lname=$res->getLN();
	 $city=$res->getCountry();
	 $ba=$res->getBankAccount();
	 $ssn=$res->getSsn();
	 $g=$res->getGender();
	 $phone=$res->getPhone();
	 
	 

  $table="users"; 
  $id=$_GET['edit_id'];
  
  $res = mysql_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city',BankAccount='$ba',Gender='$g',SSN='$ssn',phone='$phone' WHERE user_id=".$id);
  return $res;
 }
 
 
 
}

?>