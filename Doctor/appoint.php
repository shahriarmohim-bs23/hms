<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Appointment</title>
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
                <h5 class="text-center">Patients</h5>
                <?php
               $id = $_SESSION['doctor_Id'];

                                $query="select P.Patient_Id,Patient_Name,Patient_Phone,Patient_Symptom,Appoint_Date,Appoint_Time,Appoint_Status
                                from Patient P,Appointment A where P.Patient_Id = A.Patient_Id and A.Doctor_Id=$id and  Appoint_Status='Pending'";

                                 $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>Mobile Number</th>
    <th>Symptom</th>
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>

    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO Patient.</td>
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
    <td>
    <a href='approve.php?id=".$row[0]."'>
          <button  id=".$row[0]." class='btn btn-info'>Approve</button>
      </a>
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