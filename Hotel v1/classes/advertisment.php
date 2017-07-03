<?php
include_once 'subject.php';
include_once 'DBManager.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of advertisment
 *
 * @author Dell
 */
class advertisment implements subject 
{
    
     public function RegisterObserver() 
    {
        
    }
    public function RemoveObserver() 
    {
        
    }

public function deleteAdv($id)
    {
$DB=new DBManager();
$sqlDel="DELETE FROM advertisment WHERE id='$id'";
$resDel=$DB->deleteDB($sqlDel);

if($resDel == "Deleted") 
      return "<script> alert('Data Deleted Successfully'); </script>";
else return "<script> alert('There is a problem'); </script>";

    }

    
public function updateAdv($id,$desc,$title,$imageFile,$e_Date,$price)
{

        $DB=new DBManager();
        $query="SELECT * FROM advertisment WHERE id='$id'";
       $result=$DB->selectDB($query);

$imageName=$imageFile['name'];

  while ($row=mysqli_fetch_assoc($result)) {
    if($row['describtion'] == "$desc" && 
    $row['title'] == "$title" && 
    $row['img_name'] == "$imageName" && 
    $row['e_date'] == "$e_Date" && 
    $row['price'] == "$price" )
    return "<script> alert('No Data Changed !!..'); </script>";
       }

$image=addslashes($imageFile['tmp_name']);
   $name=addslashes($imageFile['name']);
   $image=file_get_contents($image);
    $image= base64_encode($image);

   $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
   $fileExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));

if( $imageFile['size'] <  10000000 || in_array($fileExt, $allowed)) {
   
$sqlUp="UPDATE advertisment SET describtion='$desc',title='$title',img_name='$name',e_date='$e_Date',image='$image' WHERE id='$id'";
$resUp=$DB->updateDB($sqlUp);

if($resUp=="Updated" ) 
{return "<script> alert('Data Updated Successfully'); </script>";}
else {return "<script> alert('There is a problem'); </script>";}


}
}

        public function Add_ADV($desc,$title,$imageFile,$price,$s_Date,$e_Date)
    {

     $DB=new DBManager();

   $image=addslashes($imageFile['tmp_name']);
   $name=addslashes($imageFile['name']);
   $image=file_get_contents($image);
    $image= base64_encode($image);

   $allowed = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
   $fileExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));

if( $imageFile['size'] <  10000000 || in_array($fileExt, $allowed)) {
   
  $sql="INSERT INTO advertisment(describtion,title,img_name,price,s_date,e_date,image) VALUES ('$desc','$title','$name','$price','$s_Date','$e_Date','$image')";
   $result=$DB->addDB($sql);
   $LastAddID=mysqli_insert_id($DB->getCon());
  
    if($result == "Added")
        return array("<script> alert('Congratulations !.. Advertisment Added'); </script>",$LastAddID);
    else 
        return "<script> alert('Problem !..'); </script>";
    }
}//end of function 
////////////////////////////////////////


public function ShowAllAdv($cust_id){
        $DB=new DBManager();
         $show_query="SELECT * FROM read_advert WHERE cust_id='$cust_id' and read_status=0";
         $show_result=$DB->selectDB($show_query);
         return $show_result;
}

public function ShowAdvData($AdvId,$cust_id)
{
    $DB=new DBManager();
      $show_query="SELECT * FROM advertisment WHERE id='$AdvId'";
         $show_result=$DB->selectDB($show_query);
         $query="UPDATE read_advert SET read_status=1 WHERE adv_id='$AdvId'and cust_id='$cust_id'";
         $result=$DB->updateDB($query);
       return $show_result;
}

    public function ShowTitles($adv_id) 
    {       
      $DB=new DBManager();
$query="SELECT title  FROM advertisment WHERE id=' $adv_id'";
$des= $DB->selectDB($query);
return $des;
}

 public function showData($cust_id){ 
    $DB=new DBManager();
    $sql = "SELECT * FROM read_advert WHERE cust_id='$cust_id' and read_status=0 ";
    $result=$DB->selectDB($sql);
       return $result;
    
} 

    public function NotifyObserver($advID) 
    {   
       $DB=new DBManager();
          $sqlquerys ="SELECT * From obbservers WHERE subscribe=1";
          
    $result=$DB->selectDB($sqlquerys);
    while($row = mysqli_fetch_assoc($result)) 
    {
        $id_cust=$row['cust_id'];
        $query ="INSERT INTO read_advert(adv_id,cust_id,read_status) VALUES('$advID','$id_cust',0)";
        $res=$DB->addDB($query);       
    }   
    }
    public function S_All()
    {
                $DB=new DBManager();

        $query="SELECT * FROM advertisment";
       $result=$DB->selectDB($query);
        return $result; 

    }   

    public function CustomData($id)
    {
       $DB=new DBManager();
        $query="SELECT * FROM advertisment WHERE id='$id'";
       $result=$DB->selectDB($query);
        return $result; 
    }
}
