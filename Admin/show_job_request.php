<?php
$con = oci_connect("system", "abedur11", "localhost/XE");
$query = "SELECT *from Employee";
$stid = oci_parse($con, $query);
oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC);
$count=oci_num_rows($stid);








$query = oci_parse($con, 
"SELECT * FROM d WHERE status='pending' order by date_reg Asc");
oci_execute($query);
$row = oci_fetch_array($query, OCI_ASSOC);
$count=oci_num_rows($query);


$output = "";


$output .="

<table class='table table-bordered'>
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>Email</th>
    <th>Date Registered</th>
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


while($row = oci_fetch_array($stid,OCI_ASSOC))
{
   
    

    $output .= "<tr>
    <td>".$row['dID']."</td>
    <td>".$row['dname']."</td>
    <td>".$row['demail']."</td>
    <td>".$row['ddate']."</td>
    <td>
     <div class='col-md-12'>
         <div class='row'>
         <div class='col-md-6'>
         <button id='".$row['dID']."' class='btn btn-success approve'>Approve</button>
         </div>


         <div class='col-md-6'>
         <button id='".$row['dID']."' 
         class='btn btn-danger reject'>Reject</button>
         
         
         </div>

         </div>

    <td>
       <a href='delete.php?id=$id'> <button  id='$id' class='btn btn-danger remove'>
            Reject</button></a>
    </td>";
echo $output;
}


?>