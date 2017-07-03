<?php
include_once('DBManager.php');


class room
{
private $DateBegin;
private $DateEnd;
private $period;
private $childCap;
private $adultCap;
private $statue;
private $price;



 public function CheckPrice($price)
  {
    $DB = new DBManager();
    
    $sql = "SELECT * from price WHERE value='$price' ";
    $resSel=$DB->selectDB($sql);

if(mysqli_num_rows($resSel) > 0)
{
while ($row = mysqli_fetch_assoc($resSel)){
  $PriID = $row['price_id'];
  return $PriID;
}
}
else {
  $query = "INSERT INTO price (value) VALUES ('$price')";
$resAdd=$DB->addDB($query);
$lastPriID=mysqli_insert_id($DB->getCon());

   if($resAdd == "Added")
    return $lastPriID;
   else 
     return "Not Added";
  }
 }
 ////////////////

public function addRoom($adults,$childs,$price,$imageFile)
  {
    $DB=new DBManager();
    $newName=$imageFile['name'];
     $que="SELECT name FROM room WHERE name = '$newName'";
     $resu=$DB->selectDB($que);
     if(mysqli_num_rows($resu) == 0)
     {
$priceID=$this->CheckPrice($price);

   $image=addslashes($imageFile['tmp_name']);
   $name=addslashes($imageFile['name']);
   $image=file_get_contents($image);
    $image= base64_encode($image);

   $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
   $fileExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));

if( $priceID == "Not Added")
	return "<script> alert('There's Problem'); </script>";
else if( $imageFile['size'] <  10000000 || in_array($fileExt, $allowed)) {
   
  $sql="INSERT INTO room(name,adult_value,children_value,price_id,status,image) VALUES ('$name','$adults','$childs','$priceID','0','$image')";
   $result=$DB->addDB($sql);
   if($result == "Added")
        return "<script> alert('Congratulations !.. Room Added'); </script>";
    else 
        return "<script> alert('Problem !..'); </script>";
}

else return "<script> alert('There is problem'); </script>";
}
else
{
  return "<script> alert('This Room Inserted Before'); </script>";
}

} // end of function

public function ShowAllData()
{
 $DB= new DBManager();

 $query="SELECT * FROM room INNER JOIN price ON room.price_id = price.price_id";
	   $result=$DB->selectDB($query);
		return $result;
}// end of function

public function ShowRoomData($id)
{
 $DB= new DBManager();

 $query="SELECT * FROM room INNER JOIN price ON room.price_id = price.price_id WHERE id='$id' ";
	   $result=$DB->selectDB($query);
		return $result;
}// end of function
///////////////////////

public function updateRoom($id,$adults,$childs,$price,$imageFile)
{
$DB=new DBManager();

$newName=$imageFile['name'];

$result=$this->ShowAllData();

  while ($row=mysqli_fetch_assoc($result)) {
if(	$row['name'] == "$newName" && 
	$row['adult_value'] == "$adults" && 
	$row['children_value'] == "$childs" && 
	$row['value'] == "$price"  ) 
  return "<script> alert('No Data Changed !!..'); </script>";
      }

$priceID=$this->CheckPrice($price);

 if(getimagesize($imageFile["tmp_name"]) != FALSE)
   {
$image=addslashes($imageFile['tmp_name']);
   $name=addslashes($imageFile['name']);
   $image=file_get_contents($image);
    $image= base64_encode($image);
   $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
   $fileExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));

if( $imageFile['size'] <  10000000 || in_array($fileExt, $allowed)) {

$sqlUp="UPDATE room SET name='$name',adult_value='$adults',children_value='$childs',price_id='$priceID',image='$image' WHERE id='$id'";
$resUp=$DB->updateDB($sqlUp);

if($resUp=="Updated") 
       return "<script> alert('Data Updated Successfully'); </script>";
else return "<script> alert('There is a problem'); </script>";

}
}
else 
{
   return "<script> alert('File is not IMAGE '); </script>";

}


}// end of function


	public function deleteRoom($id)
	{
$DB=new DBManager();
$sqlDel="DELETE FROM room WHERE id='$id'";
$resDel=$DB->deleteDB($sqlDel);

if($resDel == "Deleted") 
     return "<script> alert('ROOM Deleted Successfully'); </script>";
else return "<script> alert('There is a problem'); </script>";

} // end of function

}



?>