<?php
session_start();
if(isset($_SESSION['cleaner']))
{
    unset($_SESSION['cleaner']);
    header("Location:../index.php");
}
?>





             
             
            
