<?php 
  include("../config.php");
  
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM customer WHERE Name LIKE '$name%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['P_Number']."</td><td>".$row['address']."</td></tr>";
   }
    echo $data;
 ?>