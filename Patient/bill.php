<?php

session_start();

?>
<!Doctype html>

    <head>
        <title>Bill</title>
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
                       <h5 class ="text-center">Bill</h5>
                       <?php

                      


                     $id = $_SESSION['patient_Id'];
                     

                      $query = "SELECT *from Bill where Patient_Id=$id and Bill_Status='Not paid'";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>Medicine Fee</th>
                      <th>Room Fee</th>
                      <th>Doctor Fee</th>
                      <th>Hospital Fee</th>
                      <th>Staff Fee</th>
                      <th>Total Fee</th>
                     ";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='5' class='text-center'> No Bil</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                         
                          

                          $out .= "<tr>
                          <td>$row[0]</td>
                          <td>$row[1]</td>
                          <td>$row[2]</td>
                          <td>$row[3]</td>
                          <td>$row[4]</td>
                          <td>$row[5]</td>
                          
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
                           
                            $Date=$_POST['date'];
                            $Date=date('d-m-y', strtotime($Date));
                            $mode=$_POST['mode'];
                            
                            
                       
                        
                            
                            $error =array();
                            
                            
                           if(empty($Date))
                            {
                                $error['u']="Enter Date";
                            }
                            else if(empty($mode))
                            {
                                $error['u']="Enter Bill MODE";
                            }
                            
                            
                            if(count($error)==0)
                            {
                              


   $query = oci_parse($con,
    "begin
    Bill_Admission(to_date('$Date','DD/MM/YYYY'),'$mode','$id');
    end;");
    oci_execute($query);
                            
                        

                             
                            }
                        }
                         
                         

                       ?>
               
                       <h5 class ="text-center">Bill Pay</h5>
                       
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
                       
                       



                        <div class="form-group">
                     <label>Bill Mode</label>
                        <select name="mode" class="form-control" >
                            <option value="">Bill Mode</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                           
                        </select>
                    </div>

                           

                            <div class="form-group">
                            <label>Payment Date </label>
                           <input type="date" name="date" class="form-control"
                            autocomplete="off">
                             </div>
                            
                            </br>
                            <input type="submit" name="add" value="Pay" class="btn btn-success">

                    </form>

                    </div>
    </div>
</div>
</div>
</body>
</html>

