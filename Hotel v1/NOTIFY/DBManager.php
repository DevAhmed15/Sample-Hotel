<?php 



class DBManager
{
private $servername;
private $username;
private $pass;
private $db;
private $connect;


public function __construct()
{
   $this->servername="localhost";
   $this->username="root";
   $this->pass="";
   $this->db="notify";

   $this->connect= mysqli_connect($this->servername,$this->username,$this->pass,$this->db);
  if(!$this->connect)
   {
	die("Connection Failed : " . mysqli_connect_error());
  }
}

public function getCon()
{
	return $this->connect;
}

// add in DB
public function addDB($query)
{
  if(mysqli_query($this->connect,$query))
{
	return "Added";
}
else{ return "There is a Problem"; } 

}

//delete from DB
public function deleteDB($query)
 {

   if(mysqli_query($this->connect,$query))
 {
	return "Deleted";
 }
   else{ return "There is a Problem"; } 

 }

//update DB
 public function updateDB($query)
 {

 if(mysqli_query($this->connect,$query))
 {
	return "Updated";
 }
 else{ return "There is a Problem";} 
}
 
 //select from DB
public function selectDB($query)
{
$result=mysqli_query($this->connect,$query);

return $result;

}

public function __destruct()
{
	mysqli_close($this->connect);
}
}

?>