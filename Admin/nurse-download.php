<?php
$con = oci_connect("system", "abedur11", "localhost/XE");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Nurse WHERE Nurse_Id=$id";
    $stid = oci_parse($con, $query);
    oci_execute($stid);
    
    
    
    oci_execute($stid);
    $row= $row = oci_fetch_row($stid);
    $filepath = '../Nurse/uploads/' . $row[13];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../Nurse/uploads/' .  $row[13]));
        readfile('../Nurse/uploads/' .  $row[13]);
        exit;

       
    }

}
?>