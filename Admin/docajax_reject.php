<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "DELETE  from Doctor where Doctor_Id=$id";
$stid = oci_parse($con, $query);
oci_execute($stid);

?>