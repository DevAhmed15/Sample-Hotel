<?php

session_start();
$cust_id =$_SESSION['login_id'];



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'DBManager.php';
$DB=new DBManager();
$sql = "SELECT * FROM read_advert WHERE cust_id='$cust_id' and read_status=0 ";
       $result=$DB->selectDB($sql);
       $count=mysqli_num_rows($result);
       echo $count;
      ?>