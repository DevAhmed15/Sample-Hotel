<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}
</style>
<body>


<div>
  <form action="recep.php">
  
    <input type="submit" value="Click here for receptionist settings "  name="receptionistBtn">
  </form>
</div>



<div>
  <form action="admin.php">
  
    <input type="submit" value="Click here for admin settings "  name="adminBtn">
  </form>
</div>

</body>
</html>

