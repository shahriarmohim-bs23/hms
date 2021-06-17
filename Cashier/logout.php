<?php
session_start();
if(isset($_SESSION['cashier']))
{
    unset($_SESSION['cashier']);
    header("Location:../index.php");
}
?>




