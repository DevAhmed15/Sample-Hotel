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
        <form method="POST">
            <input type="text" name="advers"/>
            <br/>
            <input type="file" name="image" />
             <br/>
            <input type="number" name="period"/>
             <br/>
            <input type="date" name="s_date"/>
             <br/>
            <input type="date" name="e_data"/>
             <br/>
             <input type="submit" value="submit"/>
        </form>
        <?php
       
        
        $text     = $_POST['advers'];
        $image    = $_POST['image'];
        
        $s_date   = $_POST['s_date'];
        $e_date   = $_POST['e_data'];
        if($text==NULL)
        {
            
        }
 else
 {
           include 'advertisment.php';
      
        $sub=new advertisment();
      $result=  $sub->addavertisment($text, $image, $s_date, $e_date);
      $sub->NotifyObserver($result);
 }
 
   
        ?>
    </body>
</html>
