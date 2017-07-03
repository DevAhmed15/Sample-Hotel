<?php

include ('../../classes/ceo.php');


  $id=$_GET['id'];

$cont=new ceo();
$result=$cont->del_ADV($id);

echo $result;

  $url = "indexCeo.php"; 

header("Location:$url");

?>
