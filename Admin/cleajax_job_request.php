<?php
session_start();
$con = oci_connect("system", "abedur11", "localhost/XE");
$query = "SELECT * FROM Cleaner WHERE Cleaner_status='Pending'";
$stid = oci_parse($con, $query);
oci_execute($stid);
$count=oci_fetch_all($stid, $results);

$output = "";

$output .="

<table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>Shift</th>
    <th>Age</th>
    <th>NID</th>
    <th>Action</th>


    </tr>


";
if($count<1)
{
    $output .="
    <tr>
    <td colspan='8'>NO JOB REQUEST YET.</td>
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
    <td>".$row[5]."</td>
    <td>".$row[8]."</td>
    <td>
     <div class='col-md-1'>
         <div class='row'>
         <div class='col-md-6'>
         <button id='".$row[0]."' class='btn btn-success approve'>Approve</button>
         </div>
         <div class='col-md-6'>
         <button id='".$row[0]."' 
         class='btn btn-danger reject'>Reject</button>
         </div>
    </div>
    </div>

    </td>
      ";
}

$output .="
</tr>
</table>
";
echo $output;

?>