<?php
include_once ('reservation.php');

class person 
{

protected $BankAccount;
protected $id;
protected $ssn;
protected $phone;
protected $name;
protected $email;
protected $country;
protected $gender;
protected $password;

//setters
public function setBankAcc($str) { $this->BankAccount=$str; }

public function setId($str) { $this->id=$str; }

public function setSSN($str) { $this->ssn=$str; }

public function setPhone($str) { $this->phone=$str; }

public function setName($str) { $this->name=$str; }

public function setEmail($str) { $this->email=$str; }

public function setCountry($str) { $this->country=$str; }

public function setGender($str) { $this->gender=$str; }

public function setPassword($str) { $this->password=$str; }

//end setters 

// getters
public function getBankAcc() { return $this->BankAccount; }

public function getId() { return $this->id; }

public function getSSN() { return $this->ssn; }

public function getPhone() { return $this->phone; }

public function getName() { return $this->name; }

public function getEmail() { return $this->email; }

public function getCountry() { return $this->country; }

public function getGender() { return $this->gender; }

public function getPassword() { return $this->password; }

// end getters
   public function CheckSalary($salary)
  {
    $DB = new DBManager();
    
$sql2 = "SELECT * from salary WHERE sal_value='$salary' ";
$resSelSalary=$DB->selectDB($sql2);
  

if(mysqli_num_rows($resSelSalary) > 0 )
{
  while ($row = mysqli_fetch_assoc($resSelSalary))
     $S_ID = $row['id'];
return $S_ID;
 }
 else 
 {
 $query = "INSERT INTO salary(sal_value) VALUES ('$salary')";
$resAdd=$DB->addDB($query);
$lastSalID=mysqli_insert_id($DB->getCon());

if($resAdd == "Added")
{
  return $lastSalID;
}
else 
 return "Not Added";
 }
  }

    public function CheckAddress($add)
  {
    $DB = new DBManager();
    
    $sql = "SELECT * from address WHERE value='$add' ";
        $resSelAddress=$DB->selectDB($sql);

if(mysqli_num_rows($resSelAddress) > 0)
{
while ($row = mysqli_fetch_assoc($resSelAddress)){
  $AddID = $row['id'];
  return $AddID;
}
}
else {
  $query = "INSERT INTO address (value) VALUES ('$add')";
$resAdd=$DB->addDB($query);
$lastAddID=mysqli_insert_id($DB->getCon());

   if($resAdd == "Added")
    return $lastAddID;
   else 
     return "Not Added";
  }
 }

  /////////////////////////////////////////////////////

public function login($mail,$pass)
{
	
$DB=new DBManager();

$sql = "SELECT * from customer WHERE Email = '$mail' ";
$resSel=$DB->selectDB($sql);

if(mysqli_num_rows($resSel) > 0)
{
  $_SESSION['login_user']=$mail;
  while ($row = mysqli_fetch_assoc($resSel))
   {
    $_SESSION['login_id']=$row['cust_id'];
       $_SESSION['login_name']=$row['fullname'];
    if($row['user_type_id'] == 1)
    {

    	$this->setId($row['cust_id']);
    }
    if ($pass == $row['Password'])
    {
     switch ($row['user_type_id']) {
       case '1':
          Header("location:UI/cust/indexCust.php");
         break;
       case '2':
          Header("location:UI/admin/indexAdm.php");
         break;
       case '3':
          Header("location:UI/ceo/indexCeo.php");
         break;
      case '4':
          Header("location:UI/rec/indexRec.php");
         break;
     } // end switch
     } // end if
     else { return "<script> alert('PassWord is Wrong ..'); </script>"; }
   } // end while
}

else { return "<script> alert('Validate From Your Email ..'); </script>"; }
} //////// end of function /////////////////////////////


public function register($name,$add,$quest,$Ans,$ssn,$mail,$pass)
{
$DB=new DBManager();
$sql = "SELECT Email from customer WHERE Email = '$mail' ";
$resSel=$DB->selectDB($sql);

function validateStr($a){
  $validateArr=array(33,34,35,36,37,38,39,40,41,42,43,44,45,47,58,59,60,61,62,63,91,92,93,94,95,96);
for ($i=0; $i < strlen($a); $i++) {
  $ord=ord($a[$i]);
   for ($j=0; $j < count($validateArr); $j++)
 if($validateArr[$j] == $ord )
  return "not";
}
}

if( validateStr($name) == "not" || validateStr($mail) == "not" || validateStr($add) == "not" || validateStr($Ans) == "not"){
return "<script> alert('PROBLEM !! Special Characters Found '); </script>";
}

else if(mysqli_num_rows($resSel) > 0)
{ 
return "<script> alert('This Mail Registered Before'); </script>";
}
else {

$sql = "SELECT * from address WHERE value = '$add' ";
$resSel=$DB->selectDB($sql);

if(mysqli_num_rows($resSel) > 0)
{
  while ($row = mysqli_fetch_assoc($resSel))
   {
  $id= $row['id'];
$query="INSERT INTO customer(fullname,Email,Password,question_num,Answer,add_id,ssn,user_type_id) VALUES ('$name','$mail','$pass','$quest','$Ans','$id','$ssn',1) ";
$resAdd= $DB->addDB($query);
$lastID=mysqli_insert_id($DB->getCon());

$query2="INSERT INTO obbservers(cust_id,subscribe) VALUES ('$lastID',1) ";
$resAdd2= $DB->addDB($query2);
if($resAdd == "Added" && $resAdd2 == "Added")
{ return "Congratulations !! You Registered";}
else { return "Not added"; }
}
}
else{ 
$query = "INSERT INTO address (value) VALUES ('$add')";
$resAdd=$DB->addDB($query);
$lastID=mysqli_insert_id($DB->getCon());

$query="INSERT INTO customer(fullname,Email,Password,question_num,Answer,add_id,ssn,user_type_id) VALUES ('$name','$mail','$pass','$quest','$Ans','$lastID','$ssn',1) ";
$resAdd= $DB->addDB($query);

$lastCusID=mysqli_insert_id($DB->getCon());

$query2="INSERT INTO obbservers(cust_id,subscribe) VALUES ('$lastCusID',1) ";
$resAdd2= $DB->addDB($query2);
if($resAdd == "Added" && $resAdd2 == "Added")
 { return "Congratulations !! You Registered"; }
else {return "Not added"; } 

}
}
}// end of function ///////////

  public function editData($id)
  {
    $DB=new DBManager();

    $query="SELECT * FROM customer join address WHERE customer.add_id = address.id AND cust_id='$id'";
     $result=$DB->selectDB($query);
    return $result;     
  }
  // end of function 
  ////////////////
public function editProfile($id,$name,$add,$ssn,$mail,$pass)
{
$DB=new DBManager();

    $query1="SELECT * FROM customer join address WHERE customer.add_id = address.id AND cust_id='$id'";
     $result1=$DB->selectDB($query1);

  while ($row=mysqli_fetch_assoc($result1)) {
  if($row['fullname'] == "$name" && 
  $row['Email'] == "$mail" && 
  $row['Password'] == "$pass" && 
  $row['ssn'] == "$ssn" && $row['value'] == "$add") 
  return "<script> alert('No Data Changed !!..'); </script>";
     }
$resAddID=$this->CheckAddress($add);

$sqlUp1="UPDATE customer SET fullname='$name',Email='$mail',Password='$pass',add_id='$resAddID',ssn='$ssn' WHERE cust_id='$id'";
$resUp1=$DB->updateDB($sqlUp1);

if($resUp1=="Updated") 
{return "<script> alert('Data Updated Successfully'); </script>";}
else {return "<script> alert('There is a problem'); </script>";}
}// end of function //////////

public function ForgetPass($mail,$que,$ans)
{
$DB=new DBManager();
$query="SELECT * from customer WHERE Email='$mail'";
$result=$DB->selectDB($query);

$query2="SELECT * from customer WHERE Email='$mail' AND question_num='$que' AND Answer='$ans'";
$result2=$DB->selectDB($query2);

if(mysqli_num_rows($result) > 0)
{
 
 if(mysqli_num_rows($result2) > 0)
header("Location:reset.php");

}

else return "<script>alert('This Mail Not Found');</script>";
}// end of function
//////////////////////////


public function UpPass($mail,$pass)
{

$DB=new DBManager();
$query="UPDATE customer SET Password='$pass' WHERE Email='$mail'";
$result=$DB->selectDB($query);
if($result == "Updated")
return "<script>alert('Password Updated Successfully');</script>";
else
  return "<script>alert('Problem');</script>";
}

public function search($sea)
{
$DB=new DBManager();
 $query1 = "SELECT * FROM customer join address WHERE customer.add_id = address.id AND (cust_id='$sea' OR fullname='$sea' OR Email='$sea' OR ssn='$sea' OR  value='$sea')";
$result=$DB->selectDB($query1);
if(mysqli_num_rows($result) > 0)
{
Header("location:../SearchResult.php");
}
else 
{
	return "<script>alert('There is No Result For This Search !!'); </script>";
    return "<script>alert('Try Again'); </script>";
}
}


public function ShowAllPersons()
{
		$DB=new DBManager();

		$query=" SELECT * FROM customer join address WHERE customer.add_id = address.id ";
		$result=$DB->selectDB($query);
		return $result;
}

}

?>