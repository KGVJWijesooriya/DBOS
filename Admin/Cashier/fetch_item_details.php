<?php

include("login-check.php");



// Connect to your database here

if (isset($_POST['barcode'])) {
  $barcode = $_POST['barcode'];

  // Perform a database query to fetch item details based on the barcode
  // Replace with your actual database connection and query logic
  
  $sql = "SELECT * FROM `inventor` WHERE p_No = '$barcode'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $itemDetails = array(
      "itemName" => $row["item_name"],
      "unitPrice" => $row["unit_price"],
      // Add other item details from the row as needed
    );

    header('Content-Type: application/json');
    echo json_encode($itemDetails);
  } else {
    echo "Item not found";
  }

  $conn->close();
}
?>

