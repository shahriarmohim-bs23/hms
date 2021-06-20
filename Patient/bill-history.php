<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Bill History</title>
</head>
<body>
<?Php
$con = oci_connect("system", "abedur11", "localhost/XE");

include("../include/header.php");
?>
<div class="container-fulid">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-10">
            
                
                <?php


                 include("navber.php");
                ?>

             
                <div class ="col-md-10">
                <h5 class="text-center">Bill history</h5>
                <?php
                $id = $_SESSION['patient_Id'];

                $query = "SELECT *from Bill where Patient_Id=$id and Bill_Status='Paid'";
                $stid = oci_parse($con, $query);
                oci_execute($stid);
                
                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>Medicine Fee</th>
    <th>Room Fee</th>
    <th>Doctor Fee</th>
    <th>Hospital Fee</th>
    <th>Staff Fee</th>
    <th>Total Fee</th>
    <th>Payment Date</th>


    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO Room.</td>
    </tr>
    
    
    
    ";
}




oci_execute($stid);
while($row = oci_fetch_row($stid))
{
   
   

    $output .= "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[6]."</td>
   
      </td>";
}

$output .="
</tr>
</table>
";
echo $output;
?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
       
