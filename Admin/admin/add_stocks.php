<?php

@include 'menu.php';

?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Add Bill</h2>
            <!-- <a href="add_vendor.php" class="btn">Add Vendors</a> -->
        </div>
        <form>
            <div class="form-row">
                <div class="col-4">
                    <input ype="text" name="search" id="search" class="form-control " placeholder="Vendor Name" autocomplete="off" required><br>
                    <!-- <input type="text" class="btn btn-primary" name="searchdata" id="searchdata" value="SEARCH"> -->

                    <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: px;">
                        <div class="list-group" id="show-list">
                            <!-- Here autocomplete list will be display -->
                        </div>
                    </div>
                    <div>
                        <input ype="text" name="search" id="search" class="form-control " placeholder="Vendor Name" autocomplete="off" required><br>
                    </div>
                </div>
        </form>
        <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Cost</td>
                                <td>Qty</td>
                                <td>Price</td>
                            </tr>
                        </thead>
    </div>


    <script>
        $(document).ready(function() {
            // Send Search Text to the server
            $("#search").keyup(function() {
                let searchText = $(this).val();
                if (searchText != "") {
                    $.ajax({
                        url: "action.php",
                        method: "post",
                        data: {
                            query: searchText,
                        },
                        success: function(response) {
                            $("#show-list").html(response);
                        },
                    });
                } else {
                    $("#show-list").html("");
                }
            });
            // Set searched text in input field on click of search button
            $(document).on("click", "a", function() {
                $("#search").val($(this).text());
                $("#show-list").html("");
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#searchdata').click(function(e) {
                e.preventDefault()

                var id = $('input[name=id]').val();
                $.ajax({
                    url: "fetchintextbox.php",
                    type: "POST",
                    data: {
                        "search_post_btn": 1,
                        "id": id,
                    },
                    datatype: "dataType",
                    success: function(response) {
                        $("#vedformid").html(response);
                    }
                });
            });
        });
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>