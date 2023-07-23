<?php
session_start();
if (!$_SESSION['auth'])
{
    header('location:/DBOS/Admin/admin/index.php');
}
//$conn = mysqli_connect('localhost','root','','dbos');
include("../config.php");
?>
