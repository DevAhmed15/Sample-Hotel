<?php
include_once 'Ceo.php';
$con = new Ceo();

$table_name="recep";
$res=$con->select($table_name);
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Receptionist Settings </title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function del_id(id)
{
 if(confirm('Sure to delete this record ?'))
 {
  window.location='deleteRecep.php?delete_id='+id
 }
}
function edit_id(id)
{
 if(confirm('Sure to edit this record ?'))
 {
  window.location='edit_Recep.php?edit_id='+id
 }
}
</script>
</head>
<body>
<center>
<div id="header">
 <div id="content">
    <label>Receptionist System Settings</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Country</th>
	<th>Banck Account</th>
	<th>Gender</th>
	<th>SSN</th>
	<th>Phone Number</th>
    <th colspan="2">edit/delete</th>
    </tr>
    <?php
 while($row=mysql_fetch_row($res))
 {
   ?>
            <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
			<td><?php echo $row[5]; ?></td>
			<td><?php echo $row[6]; ?></td>
			
            <td align="center"><a href="javascript:edit_id(<?php echo $row[7]; ?>)"><img  alt="EDIT" /></a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[7]; ?>)">  <img  alt="DELETE" /></a></td>
            </tr>
            <?php
 }
 ?>
    </table>
    </div>
</div>

<a href="addRecep.html"     ><img  alt="Add new Receptionist ???" />    </a>
<a href="start.php"     ><img  alt="Home???" />    </a>


<div id="footer">
 <div id="content">
    <hr /><br/>
    </div>
</div>

</center>
</body>
</html>