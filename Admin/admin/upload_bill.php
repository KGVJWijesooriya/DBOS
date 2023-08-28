<?php
include("../config.php");
?>

<?php
// Establish a database connection
// $servername = "your_server_name";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from AJAX request
$vendorId = $_POST['vendorId'];
$invoiceId = $_POST['invoiceId'];
$productId = $_POST['productId'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$currentDate = date("Y-m-d H:i:s");

// Construct the SQL query
$sqlQuery = "INSERT INTO `vendor_bill`(`vendor_id`, `invoice_id`, `product_id`, `qty`, `cost`, `date`)
             VALUES ('$vendorId','$invoiceId','$productId','$qty','$cost','$currentDate')";

// Perform the query
if ($conn->query($sqlQuery) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sqlQuery . "<br>" . $conn->error;
}

$conn->close();
?>
