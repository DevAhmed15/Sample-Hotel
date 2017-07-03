<?php
include_once 'Ceo.php';
$con = new Ceo();
$table_name="admin";

if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $admin_id="admin_id";
 $res=$con->delete($table_name,$id,$admin_id);
  //$res=$con->delete();
 if($res)
 {
  ?>
  <script>
  alert('Record Deleted ...')
        window.location='admin.php'
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('Record cant Deleted !!!')
        window.location='admin.php'
        </script>
  <?php
 }
}
?>