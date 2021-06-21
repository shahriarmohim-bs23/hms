<?php
$con = oci_connect("system", "abedur11", "localhost/XE");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Cleaner WHERE Cleaner_Id=$id";
    $stid = oci_parse($con, $query);
    oci_execute($stid);
    
    
    
    oci_execute($stid);
    $row= $row = oci_fetch_row($stid);
    $filepath = '../Cleaner/uploads/' . $row[12];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../Cleaner/uploads/' .  $row[12]));
        readfile('../Cleaner/uploads/' .  $row[12]);
        exit;

       
    }

}
?>
