<?php

$con = oci_connect("system", "abedur11", "localhost/XE");

$id = $_POST['id'];
$query = "UPDATE Cashier SET Cashier_Status='Approved' where Cashier_Email='$id'";
$stid = oci_parse($con, $query);
oci_execute($stid);
$query="UPDATE Cashier SET Cashier_Id=Cashier_Id.nextval where Cashier_Email='$id'";
$stid = oci_parse($con, $query);
oci_execute($stid);
$to_email = "nasifshahriar4@gmail.com";
$subject = "Approval Email";
$body = "Hi, Heartiest Congratulation for you.You  are Appointed as a  Cashier In Birdem Hospital.Contact With us as soon as possible";
$headers = "From: Nshariarmohim007";
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>



?>