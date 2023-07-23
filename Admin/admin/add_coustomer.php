<?php

@include 'menu.php';

?>

<?php

if(isset($_POST['submit'])){

    $c_name = $_POST['c_name'];
    $c_pNo = $_POST['c_pNo'];
    $c_address = $_POST['c_address'];
 
    $select = " SELECT * FROM customer WHERE Name = '$c_name' && P_Number = '$c_pNo' ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'Product already exist!';
 
    }else{
        $insert = "INSERT INTO `customer`(`Name`, `P_Number`, `address`) VALUES ('$c_name','$c_pNo','$c_address')";
        mysqli_query($conn, $insert);
        
    }
 
 };

?>

<div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Inventory Items</h2>
                    </div>

                    <table><form action="" method="post">

                        <tbody>
                        
                            <tr>    
                                <td>Name</td>
                                <td><input class="itext" type="text" name="c_name" required placeholder="enter your Coustomer name"></td>
                            </tr> 
                         
                            <tr>
                                <td>Phone Number</td>
                                <td><input class="itext" type="number" name="c_pNo" required placeholder="enter your Coustomer Phone Number"></td>
                            </tr>

                            <tr>
                                <td>Address</td>
                            <td><input class="itext" type="text" name="c_address" required placeholder="enter your Coustomer Address"></td>
                            </tr>

                        </tbody>
                    </table>
                    
                    <input type="submit" name="submit" value="Save" class="form-btn">
                    </form>
                </div>