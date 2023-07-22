let totalAmount = 0;
let itemNo = 1;

// Function to update the row in the table
function updateTableRow(row, item, price, quantity, itemTotal) {
  const cells = row.cells;
  cells[1].textContent = item;
  cells[3].textContent = quantity;
  cells[4].textContent = `$${price.toFixed(2)}`;
  cells[5].textContent = `$${itemTotal.toFixed(2)}`;
}

// Function to add the item to the cart
function addToCart() {
  const customerName = document.getElementById("customerName").value;
  const customerAddress = document.getElementById("customerAddress").value;
  const item = document.getElementById("item").value;
  const price = parseFloat(document.getElementById("price").value);
  const quantity = parseInt(document.getElementById("quantity").value);
  const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

  if (!customerName || !customerAddress || !item || isNaN(price) || isNaN(quantity)) {
    alert("Please fill all the fields correctly.");
    return;
  }

  const itemTotal = price * quantity;
  totalAmount += itemTotal;

  const receiptItems = document.getElementById("receipt-items");
  const newItem = document.createElement("p");
  newItem.textContent = `${item} x ${quantity} = $${itemTotal.toFixed(2)}`;
  receiptItems.appendChild(newItem);

  const totalElement = document.getElementById("total");
  totalElement.textContent = totalAmount.toFixed(2);

  // Reset input fields after adding to cart
  document.getElementById("item").value = "";
  document.getElementById("price").value = "";
  document.getElementById("quantity").value = "";

  // Add the purchase item to the table or update existing row
  const purchaseItems = document.getElementById("purchase-items");
  let newRow = null;

  // Check if an existing row with the same item already exists in the table
  const rows = purchaseItems.getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    const cells = rows[i].cells;
    if (cells[1].textContent === item) {
      newRow = rows[i];
      break;
    }
  }

  if (newRow === null) {
    newRow = document.createElement("tr");
    newRow.innerHTML = `
      <td>${itemNo}</td>
      <td>${item}</td>
      <td>${generateSerialNo()}</td>
      <td>${quantity}</td>
      <td>$${price.toFixed(2)}</td>
      <td>$${itemTotal.toFixed(2)}</td>
    `;
    purchaseItems.appendChild(newRow);
    itemNo++;
  } else {
    // Update the existing row with new data
    updateTableRow(newRow, item, price, quantity, itemTotal);
  }
}

function generateSerialNo() {
  // This is just a simple example of generating a random serial number.
  // In a real application, you might have a more sophisticated logic.
  return Math.floor(Math.random() * 100000);
}

function displayDateTime() {
    const dateTimeContainer = document.getElementById('date-time');
  
    function updateDateTime() {
      const currentDate = new Date();
      const dateString = currentDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
      const timeString = currentDate.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
      const dateTimeString = `${dateString}, ${timeString}`;
  
      dateTimeContainer.innerText = `Date & Time: ${dateTimeString}`;
    }
  
    // Update the date and time every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);
  }
  
  // Function to print the receipt
  function printReceipt() {
    window.print();
  }
  
  // Function to save the receipt as a text file
  function saveReceipt() {
    const receiptText = document.getElementById('receipt-items').innerText;
    const totalText = document.getElementById('total').innerText;
  
    // Create a Blob object with the receipt text
    const blob = new Blob([`Receipt\n\n${receiptText}\nTotal: ${totalText}`], { type: 'text/plain' });
  
    // Create a URL for the Blob
    const url = URL.createObjectURL(blob);
  
    // Create an anchor element to trigger the download
    const anchor = document.createElement('a');
    anchor.href = url;
    anchor.download = 'receipt.txt';
  
    // Click the anchor to initiate the download
    anchor.click();
  
    // Clean up by revoking the URL object
    URL.revokeObjectURL(url);
  }
  
  // Call the displayDateTime function when the document is ready
  document.addEventListener('DOMContentLoaded', function() {
    displayDateTime();
  });
