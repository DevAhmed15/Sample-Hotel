<?php

include ('../../classes/admin.php');


  $id=$_GET['id'];

$adm=new admin();
$result=$adm->roomDelete($id);

echo $result;

  $url = "indexAdm.php"; 

header("Location:$url");

?>
