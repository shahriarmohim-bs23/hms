<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "UPDATE Doctor SET Doctor_Status='Approved' where Doctor_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);
$query="UPDATE Doctor SET Doctor_Id=Doctor_Id.nextval where Doctor_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);

?>