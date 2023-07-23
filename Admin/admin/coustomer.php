<?php

@include 'menu.php';

?>

<div class="search">
    <label>
        <form action="post">
            <input name="search" class="stext" type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
        </form>
    </label>
</div>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Inventory Items</h2>
            <a href="add_coustomer.php" class="btn">Add Customer</a>
        </div>

        <table>

            <div class="container mt-4">
    <h6 class="mt-5"><b>Search Name</b></h6>
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getName"/>
        </div>
    </div>                   
    <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Phone Number</td>
                    <td>Address</td>
                    <td>Actions</td>
                </tr>
            </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT * FROM customer";

                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6>".$row['id']."</h6></td></a>";
                   echo"<td><h6>".$row['Name']."</h6></td>";
                   echo"<td>".$row['P_Number']."</td>";
                   echo"<td>".$row['address']."</td>";
                  echo"</tr>";   
                }
            ?>
        </tbody>
    </table>
</div>
<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>

</div>



<!-- =========== Scripts =========  -->
<script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
