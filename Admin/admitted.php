<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Admission History</title>
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
                <h5 class="text-center">Admitted patient</h5>
                <?php
                                   

                                $query="select Patient_Name,Patient_Symptom,R.Room_Id,Room_Type,Room_Cost,Admission_date,Discharge_Date
                                from Patient P, Room R, Admission Ad
                                where P.Patient_Id = Ad.Patient_Id and R.Room_Id = Ad.Room_Id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>Patient Name</th>
   
    <th>Patient Symptom</th>
    <th>Room Id</th>
    <th>Room Type</th>
   
    <th>Room Cost</th>
    <th>Admission Date</th>
    <th>Discharge Date</th>
    
    


    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO Room Booked.</td>
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