<?php
include 'DBManager.php';
include 'subject.php';
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

    public function NotifyObserver($result) 
    {   
       $dbn=new DBManager();
          $sqlquerys ="SELECT id From customer WHERE subscribe=1";
          
    $re=$dbn->selectDB($sqlquerys);
         if ($re->num_rows > 0) 
    {
    // output data of each row
    while($row = $re->fetch_assoc()) 
    {
        
        $id_cust=$row['id'];
        $query ="INSERT INTO read_advert(id_advert,id_customer,read_status) VALUES('$result','$id_cust',0)";
        $ren=$dbn->addDB($query);       
    }   
   
    }
    return $ren;
    }
    public function update() 
    {
        
    }
Public function addavertisment($describtion,$image,$s_date,$e_date)
{
    $dba=new DBManager();
    $query="INSERT INTO advertisment(describtion,image,s_date,e_date) VALUES('$describtion','$image','$s_date','$e_date')";
        
       $dba->addDB($query);
     
        $last_id= mysqli_insert_id($dba->getCon());
      
      return $last_id;
    
}
Public function deleteavertisment($id)
{
    $dbd=new DBManager();
    $query="DELTE FROM advertisment WHERE id='$id'";
        
      $result=  $dbd->deleteDB($query);
     return $result;      
}
}
