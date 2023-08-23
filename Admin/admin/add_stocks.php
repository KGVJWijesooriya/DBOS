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
            <form>
                <div class="form-row">
                    <div class="col-4">
                        <!-- <input type="hidden" name="search" id="search" class="form-control" placeholder="Vendor Name" autocomplete="off" required><br> -->
                        <select name="Vender_Name" data-live-search="true" id="Vender_Name" class="form-control" title="Select Vender Name"> </select> <br>
                    </div>
                    <!-- <div>
                        <input type="number" class="form-control" placeholder="Vender Phone Number"  >
                    </div> -->
                </div>
                <div class="form-row">
                    <div>
                        <br><input type="number" class="form-control" placeholder="Invoice Number" required>
                    </div>
                    <div class="px-2">
                        <br><input type="date" class="form-control" required>
                    </div>
                </div>
            </form>
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
                <form>
                    <tbody id="tbl">
                        <tr>
                            <td class="count"></td>
                            <td class="col-4">
                                <select name="Product_box" id="Product_box" class="form-control " data-live-search="true" title="Select Product Name"></select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="qty" onchange="Calc(this);">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="cost" onchange="Calc(this);">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="amount">
                            </td>
                        </tr>
                    </tbody>
                </form>
            </table>
            <div class="float-right">
                <h4 class="float-right">Total</h4><br>
                <input type="number" class="tota" id="total" readonly>
                <input type="submit" name="save" id="save" class="button add_another btn btn-success" value="Save" />
            </div>
            <input type="submit" class="button add_another btn btn-success" value="Add another line" />
        </div>
    </div>
</div>


<script>
    // $('document').ready(function() {
    //     $('.add_another').click(function() {
    //         $("#tbl").append('<tr><td class="count"></td><td><input type="text" name="search" id="search" class="form-control" placeholder="Enter Product Name or Barcode" autocomplete="off" required></td><td><input type="number" class="form-control" name="qty" onchange="Calc(this);"></td><td><input type="number" class="form-control" name="cost" onchange="Calc(this);"></td><td><input type="number" class="form-control" name="amount"></td></tr>');
    //     });
    // })
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

                        $("#Vender_Name").html(html);
                        $("#Vender_Name").selectpicker("refresh");
                    }
                },
            });
        }
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
});

</script>




<?php
@include 'footer.php';
?>