<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_GET['id'];
$query = "DELETE from EMPLOYEE WHERE EMP_ID ='$id'";
$stid = oci_parse($con, $query);
oci_execute($stid);
if($stid)
{
    oci_free_statement($stid);
    oci_close($conn);
    
    header("location:administrator.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>