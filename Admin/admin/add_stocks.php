<?php

@include 'menu.php';

?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add Bill</h2>
            <a href="add_vendor.php" class="btn">Add Vendors</a>
        </div>
        <div>
            <form method="post">
                <div class="form-row">
                    <div class="col-4">
                        <input type="hidden" name="Vender_ID" id="Vender_ID" value="">
                        <select name="Vender_Name" data-live-search="true" id="Vender_Name" class="form-control" title="Select Vender Name"> </select> <br>
                    </div>
                    <!-- <div>
                        <input type="number" class="form-control" placeholder="Vender Phone Number"  >
                    </div> -->
                </div>
                <div class="form-row">
                    <div>
                        <br><input type="number" name="invoice_id" id="invoice_id" class="form-control" placeholder="Invoice Number" required>
                    </div>
                    <div class="px-2">
                        <br><input type="date" id="date" name="date" class="form-control" required>
                    </div>
                </div>
        </div>

        <div class=" mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td class="col-md-6">Name</td>
                        <td>Qty</td>
                        <td>Cost</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody id="tbl">
                </tbody>

            </table>
            <div class="float-right">
                <h4 class="float-right">Total</h4><br>
                <input type="number" class="tota" id="total" name="total" value="" readonly>
                <input type="submit" name="submit" id="save" class="button add_another btn btn-success" value="Save" />
            </div>
            <button type="button" id="addRowButton" class="btn btn-primary">Add New Row</button>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Load initial data
        loadVenderData();
        loadProductData();

        // Attach the function to the button's click event
        $("#addRowButton").click(addNewRow);

        // Function to clone the row and append it to the table
        function addNewRow(event) {
            event.preventDefault(); // Prevent form submission

            var table = document.getElementById("tbl");
            var newRow = document.createElement("tr");

            // HTML for the new row
            newRow.innerHTML = `
                <td>
                    <input type="hidden" name="count" value="">
                    <span class="count-display"></span>
                </td>
                <td class="col-4">
                    <input type="hidden" name="Product_no" value="">
                    <select name="Product_id[]" class="form-control product-select" data-live-search="true" title="Select Product Name"></select>
                </td>
                <td>
                    <input type="number" class="form-control" name="qty[]" onchange="Calc(this);">
                </td>
                <td>
                    <input type="number" class="form-control" name="cost[]" onchange="Calc(this);">
                </td>
                <td>
                    <input type="number" class="form-control" name="amount">
                </td>
            `;

            // Append the new row to the table
            table.appendChild(newRow);

            // Update the count in all rows
            updateRowCount();

            // Refresh the Bootstrap-select in the newly added row
            var productSelect = $(newRow).find(".product-select");
            productSelect.selectpicker();

            // Load product data and populate options
            loadProductData(productSelect);
        }


        // Function to update the count in the rows
        function updateRowCount() {
            var table = document.getElementById("tbl");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var countInput = rows[i].querySelector("input[name='count']");
                var countDisplay = rows[i].querySelector(".count-display");
                if (countInput && countDisplay) {
                    countInput.value = i + 1;
                    countDisplay.textContent = i + 1; // Update the count display
                }
            }
        }

        // Load vendor data and populate options
        function loadVenderData() {
            // ... Your loadVenderData logic ...
        }

        // Load product data and populate options
        function loadProductData(selectElement) {
            // ... Your loadProductData logic ...
        }

        // Function to load product data and populate options
        function loadProductData(selectElement) {
            $.ajax({
                url: "fetch.php", // Change the URL to the correct PHP file
                method: "POST",
                data: {
                    type: "ProductData", // You may need to adjust this type
                },
                dataType: "json",
                success: function(data) {
                    var html = "";
                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
                    }

                    // Populate options in the select menu
                    selectElement.html(html);

                    // Refresh the Bootstrap-select to display the newly populated options
                    selectElement.selectpicker('refresh');
                },
            });
        }

    });
</script>






<script>
    $(document).ready(function() {
        load_data("ProductData"); // Change the type to "ProductData"

        function load_data(type = "") {
            $.ajax({
                url: "fetch.php", // Change the URL to the correct PHP file
                method: "POST",
                data: {
                    type: type,
                },
                dataType: "json",
                success: function(data) {
                    var html = "";
                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
                    }
                    $("#tbl").append('<tr><td><input type="hidden" name="count" value=""><span class="count-display"></span></td><td class="col-4"><select name="Product_box" class="form-control" data-live-search="true" title="Select Product Name">' + html + '</select></td><td><input type="number" class="form-control" name="qty" onchange="Calc(this);"></td><td><input type="number" class="form-control" name="cost" onchange="Calc(this);"></td><td><input type="number" class="form-control" name="amount"></td></tr>');

                    // Refresh the Bootstrap-select in the newly added row
                    $("select[name='Product_box']").last().selectpicker('refresh');

                    // Recalculate the count in each row
                    // updateRowCounts();
                },
            });
        }

        // Function to update the count in each row
        // function updateRowCounts() {
        //     $("td.count").each(function(index) {
        //         $(this).text(index + 1);
        //     });
        // }
    });
</script>

<!-- Calculation -->
<script>
    function Calc(v) {
        var index = $(v).parent().parent().index();

        var qty = document.getElementsByName("qty")[index].value;
        var cost = document.getElementsByName("cost")[index].value;

        var amt = qty * cost;
        document.getElementsByName("amount")[index].value = amt;

        GetTotal();
    }

    function GetTotal() {
        var sum = 0
        var amounts = document.getElementsByName("amount");

        for (let index = 0; index < amounts.length; index++) {
            var amount = amounts[index].value;
            sum = +(sum) + +(amount);
        }

        document.getElementById("total").value = sum;
        // alert(sum);
    }
</script>

<script>
    $(document).ready(function() {
        $("#Vender_Name").selectpicker();

        load_data("VendorData");

        function load_data(type = "") {
            $.ajax({
                url: "fetch_P.php",
                method: "POST",
                data: {
                    type: type,
                },
                dataType: "json",
                success: function(data) {
                    var html = "";
                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
                    }
                    $("#Vender_Name").html(html);
                    $("#Vender_Name").selectpicker("refresh");
                },
            });
        }

        // Add an onchange event to update the hidden input (Vender_ID)
        $("#Vender_Name").on("changed.bs.select", function(e) {
            var selectedOption = $(this).find("option:selected");
            var vendorID = selectedOption.val();
            $("#Vender_ID").val(vendorID);
        });
    });



    // Product Data

    $(document).ready(function() {
        $("#Product_box").selectpicker();

        load_data("ProductData"); // Change the type to "ProductData"

        function load_data(type = "") {
            $.ajax({
                url: "fetch.php", // Change the URL to the correct PHP file
                method: "POST",
                data: {
                    type: type,
                },
                dataType: "json",
                success: function(data) {
                    var html = "";
                    for (var count = 0; count < data.length; count++) {
                        html += '<option value="' + data[count].id + '">' + data[count].name + ' (ID: ' + data[count].id + ')</option>';
                    }
                    $("#Product_box").html(html);
                    $("#Product_box").selectpicker("refresh");
                },
            });
        }
        // Add an onchange event to update the hidden input (Product_no)
        $("#Product_box").on("changed.bs.select", function(e) {
            var selectedOption = $(this).find("option:selected");
            var vendorID = selectedOption.val();
            $("#Product_no").val(vendorID);
        });
    });
</script>


<script>
    // Your existing JavaScript code here

    // Attach the function to the button's click event
    // $("#submitFormButton").click(submitForm);

    // function submitForm() {
    //     var formData = [];
    //     var rows = document.querySelectorAll("#tbl tbody tr");

    //     rows.forEach(function(row) {
    //         var productID = row.querySelector("select[name='Product_id[]']").value;
    //         var qty = row.querySelector("input[name='qty[]']").value;
    //         var cost = row.querySelector("input[name='cost[]']").value;
    //         formData.push({ productID: productID, qty: qty, cost: cost });
    //     });

    //     $.ajax({
    //         url: "upload_bill.php", // Change this URL to your server-side script
    //         method: "POST",
    //         data: { formData: JSON.stringify(formData) },
    //         success: function(response) {
    //             // Handle success response from the server
    //             console.log(response);
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle error
    //             console.error(error);
    //         }
    //     });
    // }
</script>


<?php

// if (isset($_POST['submit'])) {
//     $vendor_id = $_POST['Vender_ID'];
//     $new_total = $_POST['total'];

//     // Fetch the current amount from the database
//     $sql_select = "SELECT Amount FROM vendor WHERE id = '$vendor_id'";
//     $result_select = mysqli_query($conn, $sql_select);

//     if ($result_select) {
//         $row = mysqli_fetch_assoc($result_select);
//         $current_amount = $row['Amount'];

//         // Calculate the new total amount
//         $total_amount = $current_amount + $new_total;

//         // Perform SQL update query
//         $sql_update = "UPDATE vendor SET Amount = '$total_amount' WHERE id = '$vendor_id'";
//         $result_update = mysqli_query($conn, $sql_update);

//         if ($result_update) {
//             // Success message
//             echo "Vendor data updated successfully!";
//         } else {
//             // Error message
//             echo "Error updating vendor data: " . mysqli_error($conn);
//         }
//     } else {
//         // Error message for fetching current amount
//         echo "Error fetching current amount: " . mysqli_error($conn);
//     }
// }

?>

<?php
@include 'footer.php';
?>