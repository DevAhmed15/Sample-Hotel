<?php

$cust_id =$_SESSION['login_id'];

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'DBManager.php';


$db=new DBManager();
        
 
    $sql = "SELECT * FROM read_advert WHERE id_customer='$cust_id' and read_status=0 ";
    $result=  $db->selectDB($sql);
       if ($result->num_rows > 0) 
{
    // output data of each row
       
    while($row = $result->fetch_assoc())
    {
        $dvert_id=$row['id_advert'];
        $query="SELECT describtion  FROM advertisment WHERE id=' $dvert_id'";
       $des= $db->selectDB($query);
       if ($des->num_rows > 0) {
     // output data of each row
     $row = $des->fetch_assoc() ;
      {
     $dess=$row['describtion'];
      
     }
        echo  "<a href='show_advert.php?id=$dvert_id'>"."$dess"."</a>" ."<br>";
    }
    
} 

         
}