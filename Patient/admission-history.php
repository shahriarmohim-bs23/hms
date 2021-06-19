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

                                $query="SELECT *from  Admission where Patient_Id= $id";

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
   
    $id1=$row[0];
    $query1="SELECT *from Room where Room_Id=$id1";
 
    $stid1= oci_parse($con, $query1);
    oci_execute($stid1);
    $row1 = oci_fetch_row($stid1);
 

    $output .= "<tr>
    <td>".$row1[0]."</td>
    <td>".$row1[1]."</td>
    <td>".$row1[2]."</td>
  
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
   
    
   
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