<?php
session_start();
if(isset($_SESSION['pharmacist']))
{
    unset($_SESSION['pharmacist']);
    header("Location:../index.php");
}
?>




