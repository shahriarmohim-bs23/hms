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

                                $query="SELECT *from  Appointment where Doctor_Id=$id and Appoint_Status='Pending'";

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
   $id1=$row[1];
   $query1="SELECT *from  Patient where Patient_Id=$id1";

   $stid1= oci_parse($con, $query1);
   oci_execute($stid1);
   $row1 = oci_fetch_row($stid1);

   

    $output .= "<tr>
   
    <td>".$row1[0]."</td>
    <td>".$row1[1]."</td>
    <td>".$row1[4]."</td>
    <td>".$row1[3]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    <td>
    <a href='approve.php?id=".$row[1]."'>
          <button  id=".$row[1]." class='btn btn-info'>Approve</button>
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