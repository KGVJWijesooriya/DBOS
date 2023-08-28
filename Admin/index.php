<?php
require_once "config.php";

$customerSerialNo = $_GET['serialNo'] ?? '';

if ($customerSerialNo !== '') {
    $sql = "SELECT * FROM customers WHERE serial_no = '$customerSerialNo'";
    $result = $conn->query($sql);
    $customerData = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Billing</title>
    <link rel="stylesheet" href="cashier.css">
</head>
<body>
    <div class="container">
        <!-- Your existing HTML code here -->

        <div class="input-group">
            <label for="customerSerialNo">Customer Serial No:</label>
            <input type="text" id="customerSerialNo" placeholder="Enter Customer Serial No" oninput="searchCustomer()">
        </div>

        <!-- Populate customer details if available -->
        <div class="input-group">
            <label for="customerDetails">Customer Details:</label>
            <div class="flex-wrap">
                <div class="flex-item">
                    <input type="text" id="customerName" placeholder="Customer Name" value="<?= $customerData['name'] ?? '' ?>">
                </div>
                <div class="flex-item">
                    <input type="text" id="customerAddress" placeholder="Customer Address" value="<?= $customerData['address'] ?? '' ?>">
                </div>
            </div>
        </div>

        <div class="input-group">
      <label for="barcodeNumber">Barcode Number:</label>
      <input type="text" id="barcodeNumber" placeholder="Enter Barcode Number" oninput="autoFillItemDetails()">
    </div>

    <!-- <div class="input-group">
      <div class="input-label">Item Details:</div>
      <div class="flex-wrap">
        <div class="flex-item">
          <label for="item">Name:</label>
          <input type="text" id="item" placeholder="Enter item name">
        </div>
        <div class="flex-item">
          <label for="price">Price:</label>
          <input type="number" id="price" placeholder="Enter item price">
        </div>
        <div class="flex-item">
          <label for="quantity">Quantity:</label>
          <input type="number" id="quantity" placeholder="Enter quantity">
        </div>
      </div>
    </div> -->

    <div class="input-group">
      <label>Payment Method:</label><br>
      <input type="radio" name="paymentMethod" value="cash" checked> Cash<br>
      <input type="radio" name="paymentMethod" value="creditCard"> Credit Card<br>
      <input type="radio" name="paymentMethod" value="debitCard"> Debit Card<br>
    </div>

    <div class="input-group">
      <button id="addToCartButton">Add to Cart</button>
    </div>    

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Serial No</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody id="itemDetails">
          <!-- Table rows will be auto-filled here -->
        </tbody>
      </table>
    </div>

    <div class="receipt">
        <h2>Receipt</h2>
        <div id="receipt-items"></div>
        <p>Total: <span id="total">0.00</span></p>
        <!-- Add a container for the real-time date and time -->
        <div id="date-time"></div>
  
        <!-- Add the Print and Save buttons -->
        <div class="receipt-buttons">
          <button onclick="printReceipt()">Print</button>
          <button onclick="saveReceipt()">Save</button>
        </div>
      </div>
    </div>
  
    <script src="cashier.js"></script>
  </body>
  </html>


<?php
$conn->close();
?>
