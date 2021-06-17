<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Total Pharmacist</title>
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
                <h5 class="text-center">Total Pharmacist</h5>
                <?php

                                $query="SELECT *from Pharmacist where Pharmacist_status ='Approved'";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 $output ="";

    $output .="
    <table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Mobile Number</th>
    <th>Shift</th>
    <th>Institution Name</th>
    <th>Degree</th>
    <th>Action</th>


    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO Pharmacist.</td>
    </tr>
    
    
    
    ";
}




oci_execute($stid);
while($row = oci_fetch_row($stid))
{
   
   

    $output .= "<tr>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[3]."</td>
    <td>".$row[4]."</td>
    <td>".$row[8]."</td>
    <td>".$row[9]."</td>
    <td>
    <a href='pharmedit.php?id=".$row[0]."'>
          <button  id=".$row[0]." class='btn btn-info'>Edit</button>
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
       
