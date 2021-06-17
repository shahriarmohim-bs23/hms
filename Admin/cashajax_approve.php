<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "UPDATE Cashier SET Cashier_Status='Approved' where Cashier_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);
$query="UPDATE Cashier SET Cashier_Id=Cashier_Id.nextval where Cashier_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);


?>