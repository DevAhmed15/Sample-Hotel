<?php
include_once('person.php');
include_once('DBManager.php');
include_once('advertisment.php');


class CEO extends person
{


public function AddWorker($name,$add,$ssn,$mail,$pass,$InComeSalary,$u_type)
	{
$DB = new DBManager();
$sqlEm = "SELECT Email from customer WHERE Email = '$mail' ";
$resSelEm=$DB->selectDB($sqlEm);

$sqlSn = "SELECT ssn from customer WHERE ssn = '$ssn' ";
$resSelSn=$DB->selectDB($sqlSn);

// validate to mail
if(mysqli_num_rows($resSelEm) > 0)
{ 
return "<script> alert('This Mail Registered Before'); </script>";
}
else if(mysqli_num_rows($resSelSn) > 0)
{ 
return "<script> alert('This SSN Registered Before'); </script>";
return "<script> alert('Change SSN , Please'); </script>";
}
else {

$resAddID=$this->CheckAddress($add);
$resSalID=$this->CheckSalary($InComeSalary);

if($resAddID != "Not Added" && $resSalID != "Not Added" )
{
$query="INSERT INTO customer(fullname,Email,Password,add_id,ssn,user_type_id) VALUES ('$name','$mail','$pass','$resAddID','$ssn','$u_type') ";
$resAdd= $DB->addDB($query);
$last_id=mysqli_insert_id($DB->getCon());

$query2="INSERT INTO workers(worker_id,uu_t_id,sal_id) VALUES ('$last_id','$u_type','$resSalID') ";
$resAdd2= $DB->addDB($query2);

  if($resAdd == "Added" && $resAdd2 == "Added")
  {
    if($u_type==2)
		return "<script> alert('Congratulation!! You Added New Admin .. '); </script>";
    	return "<script> alert('Congratulation!! You Added New Receptionist .. '); </script>";
   }
else {return "<script> alert('Not added'); </script>"; } 

}
else { return "<script> alert('There Is Problem !.'); </script>"; }
}
} // end of fn
////////////////////////////////////////////////////////////////////


public function ShowAllData($u_type)
	{
		$DB=new DBManager();

		$query="SELECT * FROM customer 
		                 INNER JOIN address ON customer.add_id = address.id 
                         INNER JOIN workers ON customer.cust_id = workers.worker_id
                         INNER JOIN salary ON workers.sal_id = salary.id
		                 AND user_type_id='$u_type'";
	   $result=$DB->selectDB($query);
		return $result;	
	}


public function editSal($id)
	{
		$DB=new DBManager();
		$query="SELECT * FROM workers join salary WHERE workers.sal_id = salary.id AND worker_id='$id'";
	   $result=$DB->selectDB($query);
		return $result;	
	}

public function updateWorker($id,$name,$add,$ssn,$mail,$pass,$salary)
	{
		$DB=new DBManager();
		$query1="SELECT * FROM customer join address WHERE customer.add_id = address.id AND cust_id='$id'";
	   $result1=$DB->selectDB($query1);

	   	$query2="SELECT * FROM workers join salary WHERE workers.sal_id = salary.id AND worker_id='$id'";
	   $result2=$DB->selectDB($query2);

  while ($row=mysqli_fetch_assoc($result1)) {
    while ($row2=mysqli_fetch_assoc($result2)) {
if($row2['sal_value'] == "$salary" && 
	$row['fullname'] == "$name" && 
	$row['Email'] == "$mail" && 
	$row['Password'] == "$pass" && 
	$row['ssn'] == "$ssn" && $row['value'] == "$add") 
  return "<script> alert('No Data Changed !!..'); </script>";
      }
	   }
$resAddID=$this->CheckAddress($add);
$resSalID=$this->CheckSalary($salary);

$sqlUp1="UPDATE customer SET fullname='$name',Email='$mail',Password='$pass',add_id='$resAddID',ssn='$ssn' WHERE cust_id='$id'";
$resUp1=$DB->updateDB($sqlUp1);

$sqlUp2="UPDATE workers SET sal_id='$resSalID' WHERE worker_id='$id'";
$resUp2=$DB->updateDB($sqlUp2);

if($resUp1=="Updated" && $resUp2=="Updated") 
{return "<script> alert('Data Updated Successfully'); </script>";}
else {return "<script> alert('There is a problem'); </script>";}


}// end of function

	
public function delete($id)
	{
$DB=new DBManager();
$sqlDel1="DELETE FROM customer WHERE cust_id='$id'";
$resDel1=$DB->deleteDB($sqlDel1);

$sqlDel2="DELETE FROM workers WHERE worker_id='$id'";
$resDel2=$DB->deleteDB($sqlDel2);

if($resDel1 == "Deleted" && $resDel2 == "Deleted") 
      return "<script> alert('Data Deleted Successfully'); </script>";
else return "<script> alert('There is a problem'); </script>";

	}

public function Add_ADV($desc,$title,$imageFile,$price,$s_Date,$e_Date)
{
$adv=new advertisment();
$res=$adv->Add_ADV($desc,$title,$imageFile,$price,$s_Date,$e_Date);
return $res;
}

public function del_ADV($id)
{
$adv=new advertisment();
$res=$adv->deleteAdv($id);
return $res;
}// end of function 
//////////////////////////////////
	
	public function up_ADV($id,$desc,$title,$image,$e_Date,$price)
{
$adv=new advertisment();
$res=$adv->updateAdv($id,$desc,$title,$image,$e_Date,$price);
return $res;
}

} //end of class
////////////////

?>