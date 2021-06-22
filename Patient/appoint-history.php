<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Appointment History</title>
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
                <h5 class="text-center">Appointment</h5>
                <?php
                                     $id=$_SESSION['patient_Id'];

                                $query="select D.Doctor_Id,Doctor_Name,Doctor_Specialization,Doctor_Phone,Appoint_Date,Appoint_Time,Appoint_Status
                                from Doctor D,Appointment A
                                where  D.Doctor_Id = A.Doctor_Id and A.Patient_Id= $id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>Doctor ID</th>
    <th>Doctor Name</th>
    <th>Specialization</th>
    <th>Mobile No</th>
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>
    


    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO DOCTOR.</td>
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
    
   
   ";
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