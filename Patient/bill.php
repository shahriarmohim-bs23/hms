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

                      




                      $query = "SELECT *from Room";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>Room ID</th>
                      <th>Room Type</th>
                      <th>Room Price(Taka)</th>
                      <th>Cleaner Name</th>
                      <th>Room Status</th>
                     ";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='5' class='text-center'> No Room</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                          $id=$row[0];
                          $name=$row[1];
                          
                          $price=$row[2];
                      
                          $status=$row[4];
                          
                          $stid1 = oci_parse($con, "SELECT *from Cleaner where Cleaner_Id='$row[3]'");
                          oci_execute($stid1);
                          $row1 = oci_fetch_row($stid1);
                          $cleaner1=$row1[2];
                          

                          $out .= "<tr>
                          <td>$id</td>
                          <td>$name</td>
                          
                          <td>$price</td>
                          <td>$cleaner1</td>
                          <td>$status</td>
                        ";

                      }
                      $out .="
                      </tr>
                     </table>
                      ";
                      echo $out;
                       

                      
                     ?>
                       
                           
                    </div>
                    <div class="col-md-4">
                        <?php
                        if(isset($_POST['add']))
                        {
                           
                            $type=$_POST['type'];
                            $cost=$_POST['cost'];
                            $Cleaner=$_POST['Cleaner'];
                          
                            
                       
                        
                            
                            $error =array();
                            
                            
                           if(empty($type))
                            {
                                $error['u']="Enter Type";
                            }
                            else if(empty($cost))
                            {
                                $error['u']="Enter Room Cost";
                            }
                            else if(empty($Cleaner))
                            {
                                $error['u']="Enter Cleaner ID";
                            }
                            
                            if(count($error)==0)
                            {
                            
                              $query = "INSERT INTO Room VALUES (Room_Id.nextval, '$type','$cost','$Cleaner','Not Booked')";
                              $stid = oci_parse($con, $query);
                      
                             oci_execute($stid);
                            
                          //   $query="SELECT
                            // MAX(Room_Id) FROM
                            // Room";
                            // $stid = oci_parse($con, $query);
                            // oci_execute($stid);
                            //$row = oci_fetch_row($stid);
                           //  $id=$row[0];
                             // $query = "INSERT INTO Nursing VALUES ('$nurse','$id')";
                             // $stid = oci_parse($con, $query);
                      
                              // oci_execute($stid);

                             
                            }
                        }
                         
                         

                       ?>
               
                       <h5 class ="text-center">Add Room</h5>
                       
                       <form method="post" enctype="multipart/form-data">
                       <div>

                      
                       <?php
                       
                       if(isset($error['u']))
                       {
                           $er=$error['u'];
                           $show="<h5 class='text-center alert alert-danger'>$er</h5>";
                           echo $show;
                       }
                       ?>
                       
                        </div>
                       
                       



                         <div class="from-group">
                             <label>Room Type</label>
                             <input type="text" name="type"  class="form-control"  placeholder="Enter Room Type"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Room Cost</label>
                             <input type="number" name="cost"  class="form-control"  placeholder="Enter Room Cost"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Cleaner ID</label>
                             <input type="number" name="Cleaner"  class="form-control" placeholder="Enter Cleaner ID"
                             autocomplete="off">              
                            </div>
                            
                            
                            </br>
                            <input type="submit" name="add" value="Add New Room" class="btn btn-success">

                    </form>

                    </div>
    </div>
</div>
</div>
</body>
</html>

