<?php

session_start();

?>
<!Doctype html>

    <head>
        <title>Nursing</title>
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
                       <h5 class ="text-center">Nursing</h5>
                       <?php

                      




                      $query = "SELECT *from Nursing";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>Room ID</th>
                      <th>Nurse Name</th>
                     
                     ";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='5' class='text-center'> No Nurse Attached</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                          $id=$row[0];
                          $id1=$row[1];
                          
                          
                          $query1= "SELECT *from Nurse where Nurse_Id='$id'";
                          $stid1 = oci_parse($con, $query1);
                          oci_execute($stid1);
                          $row1 = oci_fetch_row($stid1);
		                  
                          $name=$row1[1];
                         
                        

                          $out .= "<tr>
                          <td>$id1</td>
                          <td>$name</td>
                          
                         
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
                           
                            $nurse=$_POST['nurse'];
                            $id=$_POST['room'];
                            
                          
                            
                       
                        
                            
                            $error =array();
                            
                            
                           if(empty($nurse))
                            {
                                $error['u']="Enter Nurse Id";
                            }
                            else if(empty($id))
                            {
                                $error['u']="Enter Room Id";
                            }
                            
                            
                            if(count($error)==0)
                            {
                            
                              
                              $query = "INSERT INTO Nursing VALUES ('$nurse','$id')";
                              $stid = oci_parse($con, $query);
                      
                               oci_execute($stid);

                             
                            }
                        }
                         
                         

                       ?>
               
                       <h5 class ="text-center">Add Nurse</h5>
                       
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
                             <label>Room ID</label>
                             <input type="number" name="room"  class="form-control"  placeholder="Enter Room ID"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Nurse ID</label>
                             <input type="number" name="nurse"  class="form-control" placeholder="Enter Nurse ID"
                             autocomplete="off">              
                            </div>
                            
                            
                            </br>
                            <input type="submit" name="add" value="Add Nurse" class="btn btn-success">

                    </form>

                    </div>
    </div>
</div>
</div>
</body>
</html>