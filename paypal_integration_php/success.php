<?php
include 'db_config.php';
session_start();
//Store transaction information from PayPal
$item_number = $_SESSION['name'];
$txn_id = $_SESSION['price'];
//$payment_gross = $_GET['amt'];
//$currency_code = $_GET['cc'];
//$payment_status = $_GET['st'];

//Get product price
//$productResult = $db->query("SELECT price FROM products WHERE id = ".$item_number);
//$productRow = $productResult->fetch_assoc();
//$productPrice = $productRow['price'];

//if(!empty($txn_id) && $payment_gross == $productPrice){
    //Inser tansaction data into the database
    $insert = $db->query("INSERT INTO payments(name1,price) VALUES('".$item_number."','".$txn_id."')");
    $last_insert_id = $db->insert_id;
?>
	<h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1>
<?php
