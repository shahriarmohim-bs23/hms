<?php

session_start();

?>
<!Doctype html>

    <head>
        <title>Room</title>
    </head>
    <body>
    <?php
    include("../include/header.php");
    ?>
    <div class ="container-fluid">
    <div class="col-md-12">
        <div class ="row">
       
             <?php
                 include("navber.php");
                 $con = oci_connect("system", "abedur11", "localhost/XE");
         
             ?>
           
          
       <div class="col-md-10">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-8">
                       <h5 class ="text-center">Room</h5>
                       <?php

                      

                      $id = $_SESSION['cleaner_Id'];


                      $query = "SELECT *from Room where Cleaner_Id=$id";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>Room ID</th>
                      <th>Room Type</th>
                      <th>Room Status</th>
                    
                     
                     ";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='5' class='text-center'> No Room Attached</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                          
                          $id1=$row[0];
                          $type=$row[1];
                          $status=$row[4];
                          
                         

                          
                         
                        

                          $out .= "<tr>
                          <td>$id1</td>
                          <td>$type</td>
                          <td>$status</td>
                          
                         
                        ";

                      }
                      $out .="
                      </tr>
                     </table>
                      ";
                      echo $out;
                       

                      
                     ?>
                       
                     
                   
</body>
</html>