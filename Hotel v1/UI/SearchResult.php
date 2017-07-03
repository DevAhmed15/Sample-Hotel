
<table class="tab">
  <?php 
include ('../classes/person.php');
   $persons= new person();
   $DB=new DBManager();
  $_res=$persons->ShowAllPersons(); 
$number=mysqli_num_rows($_res);
if ($number > 0 )
{
  echo "<tr> <th> ID </th> <th> Name </th> <th> Email </th> <th> SSN </th> <th> Address </th></tr>";
  
while ($row = mysqli_Fetch_assoc($_res)) {
  echo "<tr>";
  echo "<td>" . $row['cust_id'] . "</td>" .
 "<td>" . $row['fullname'] . "</td>" . 
 "<td>" . $row['Email'] . "</td>" .
 "<td>" . $row['ssn'] . "</td>" .
 "<td>" . $row['value'] . "</td>" .
 "</tr>";

}
}

?>
</table>  
