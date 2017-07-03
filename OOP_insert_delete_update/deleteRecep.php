<?php
include_once 'Ceo.php';
$con = new Ceo();

$table_name="recep";

if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $recep_id="recep_id";
 $res=$con->delete($table_name,$id,$recep_id);
  //$res=$con->delete();
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='recep.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record cant Deleted !!!')
        window.location='recep.php'
        </script>
  <?php
 }
}
?>