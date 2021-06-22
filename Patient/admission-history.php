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
                <h5 class="text-center">Booked Room</h5>
                <?php
                                     $id=$_SESSION['patient_Id'];

                                $query="select R.Room_Id,Room_Type,Room_Cost,Admission_date,Discharge_Date
                                from  Room R, Admission Ad
                                where  R.Room_Id = Ad.Room_Id and Ad.Patient_Id = $id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>Room ID</th>
   
    <th>Room Type</th>
    <th>Room Charge</th>
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