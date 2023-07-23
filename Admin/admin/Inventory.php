<?php

@include 'menu.php';

?>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Inventory Items</h2>
            <a href="add_item.php" class="btn">New Item</a>
            <a href="add_item.php" class="btn">New Item</a>
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
            $sql = "SELECT * FROM inventor ORDER BY id DESC";
            //execute the query
            $conn = mysqli_connect('localhost', 'root', '', 'dbos');
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

            ?>
            </tbody>
        </table>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>