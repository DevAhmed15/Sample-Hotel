<?php

include ('../../classes/ceo.php');


  $id=$_GET['id'];

$cont=new ceo();
$result=$cont->delete($id);

echo $result;

  $url = "indexCeo.php"; 

header("Location:$url");

?>
