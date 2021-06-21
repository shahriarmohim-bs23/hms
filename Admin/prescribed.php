<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Prescribed</title>
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
                <h5 class="text-center">Givens</h5>
                <?php
                              

                                $query="select Medicine_Name,Pharmacist_Name,Patient_Name,prescription_date
                                from Prescription P inner join Patient Pa on P.Patient_Id = Pa.Patient_Id inner join Pharmacist Ph on  P.Pharmacist_Id =  Ph.Pharmacist_Id inner join
                                Medicine M on P.Medicine_Id = M.Medicine_Id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>Medicine</th>
    <th>Pharmacist</th>
    <th>Patient</th>
    <th>Prescribed Date</th>
  

    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO patient.</td>
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