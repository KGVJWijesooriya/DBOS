<?php
session_start();
if (!$_SESSION['autha'])
{
    // header('location:/DBOS/Admin/Cashier/cashier.php');
}
// $conn = mysqli_connect('localhost','root','','dbos');
include("../config.php");
?>
