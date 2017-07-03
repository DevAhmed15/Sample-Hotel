<?php
session_start();
$cust_id=$_SESSION['login_id'];
include 'DBManager.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $db=new DBManager();
         $show_id=$_GET["id"];
         $show_query="SELECT * FROM advertisment WHERE id='$show_id'";
         $query="UPDATE read_advert SET read_status=1 WHERE id_advert='$show_id'and id_customer='$cust_id'";
        $show_result=$db->selectDB($show_query);
         if ($show_result->num_rows > 0) 
        {
     // output data of each row
     $row = $show_result->fetch_assoc() ;
      {
      
     echo $row['describtion']."<br/> ".$row['image']."<br/>".$row['s_date']."<br/>".$row['e_date']."<br/>";
       }
     $result= $db->updateDB($query);
        }
        // put your code here
        ?>
    </body>
</html>