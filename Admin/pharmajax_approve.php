<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "UPDATE Pharmacist SET Pharmacist_Status='Approved' where Pharmacist_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);
$query="UPDATE pharmacist SET pharmacist_Id=pharmacist_Id.nextval where pharmacist_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);


?>