<?php

session_start();
?>
<!Doctype html>
<html>
<head>
<title>Book appointment</title>
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
                <h5 class="text-center">Available Doctors</h5>
                <?php

                                $query="SELECT *from Doctor where Doctor_status ='Approved'";

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
    <th>Department</th>
    <th>Schedule</th>
    <th>Specialization</th>
    <th>Visiting Rate</th>
    <th>Qualification</th>
    <th>Action</th>


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
    <td>".$row[4]."</td>
    <td>".$row[8]."</td>
    <td>".$row[9]."</td>
    <td>".$row[10]."</td>
    <td>".$row[11]."</td>
    <td>".$row[13]."</td>
    <td>
    <a href='appointment.php?id=".$row[0]."'>
          <button  id=".$row[0]." class='btn btn-info'>Quick appointment</button>
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
       
