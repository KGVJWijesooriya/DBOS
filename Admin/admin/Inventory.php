<?php

@include 'menu.php';

?>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Inventory Items</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Product No</td>
                                <td>Name</td>
                                <td>Cost</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <?php

//Get the Search Keyword
if (isset($_POST['search'])) {
    $search = $_POST['search'];



    //SQL Query to Get foods based on search keyword
    $sql = "SELECT * FROM inventor WHERE id LIKE '%$search%' OR title LIKE '%$search%' OR category_id LIKE '%$search%' ORDER BY id DESC";
    // echo $search;

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Count rows 
    $count = mysqli_num_rows($res);



    if ($count > 0) {


        //Item Available
        while ($row = mysqli_fetch_assoc($res)) {
            //Get the Values 
            
            $p_No = $row['p_No'];
            $p_name = $row['p_name'];
            $p_dis = $row['p_dis'];
            $p_price = $row['p_price'];
            $p_BarC = $row['p_BarC'];
?>


            <tr>
                <td width="5%" class="text-center"><?php echo $row['p_No']; ?></td>
            </tr><tr>
                <td width="20%" class="text-center"><?php echo $row['Name']; ?></td>
            </tr><tr>
                <td width="5%" class="text-center"><?php echo $row['p_cost']; ?></td>
            </tr><tr>
                <td width="10%" class="text-center"><?php echo $row['p_price']; ?></td>
            </tr><tr>
                <td width="10%" class="text-center">
                    <button class="btn-secondary1"><a href="./update-item.php?id=<?php echo $row["id"]; ?>"> UPDATE</a></button><br><br>
                    <button class="btn-secondary2"><a href="./delete-item.php?id=<?php echo $row["id"]; ?>"> DELETE</a></button>
                </td>
            </tr>
        <?php


        }
    } else {
        //Categories not Available 
        echo "<div><br><h4>Sorry! We were not able to find any products for your desired keywords!<br></h4>";
        ?><br /><img src="284595933_1058817921714681_1560530709646485530_n.jpg" width="40%">
</div>
<?php
    }
} else {
    $sql = "SELECT * FROM inventor ORDER BY id DESC";
    //execute the query
    $conn = mysqli_connect('localhost','root','','dbos');
    $res = mysqli_query($conn, $sql);

    //Check whether the query is executed of not
    if ($res == TRUE) {
        // count rows
        $count = mysqli_num_rows($res);


        //check the num of rows
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                foreach ($row as $key => $val) {
                    //generate output
                    //echo $key . ": " . $val . "<BR />";
                }

                //display the value
?>

<tr>
    <td width="5%" class="text-center"><?php echo $row['p_No']; ?></td>
    <td width="20%" class="text-center"><?php echo $row['Name']; ?></td>
    <td width="5%" class="text-center"><?php echo $row['Cost']; ?></td>
    <td width="10%" class="text-center"><?php echo $row['Price']; ?></td>
    <td width="10%" class="text-center"><?php echo $row['qty']; ?></td>
    <td width="10%" class="text-center">
        <button class="btn-secondary1"><a href="./update-item.php?id=<?php echo $row["id"]; ?>"> UPDATE</a></button><br><br>
        <button class="btn-secondary2"><a href="./delete-item.php?id=<?php echo $row["id"]; ?>"> DELETE</a></button>
    </td>
</tr>
<?php
            }
        }
    } else {
    }
}
?>
                        </tbody>
                    </table>
                </div>

                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Actions</h2>
                    </div>

                    <table>
                        <tr>
                        <td width="60px">
                                <div><ion-icon name="add-circle-outline"></ion-icon></div>
                            </td>
                            <td width="60px"><a href="add_item.php">
                                <h4><span> Add New Item </span></h4>
                            </td></a>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>


















            
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>