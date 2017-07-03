<?php
session_start();

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
       <form method="POST" >
            <input type="text" name="user"/>
            <br/>
            <input type="password" name="password" />
             <br/>
             <input type="submit" value="submit"/>
        </form>  
        <?php
        
      include 'DBManager.php';
        $user_name  = $_POST['user'];
        $passw      = $_POST['password'];
        
        if($user_name==NULL)
        {
            
        }
 else
 {
        $adv=new DBManager();
        $sql_query ="SELECT * FROM customer";
    $result=$adv->selectDB($sql_query);
         if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        if ($user_name==$row['username']&&$passw==$row['pass'])
        {
           $_SESSION['login_id']=$row['id'];
           header("Location:profile.php");           
           
        }
 
       
    }
} 
else 
{
    echo "0 results";
}
      
       
 }
 
 ?>
           
    </body>
</html>
