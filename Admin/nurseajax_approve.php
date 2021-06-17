<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "UPDATE Nurse SET Nurse_Status='Approved' where Nurse_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);
$query="UPDATE Nurse SET Nurse_Id=Nurse_Id.nextval where Nurse_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);


?>