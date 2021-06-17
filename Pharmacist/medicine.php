<?php

session_start();

?>
<!Doctype html>

    <head>
        <title>Medicine</title>
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
                       <h5 class ="text-center">Medicine</h5>
                       <?php

                      




                      $query = "SELECT *from Medicine";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>ID</th>
                      <th>Medicine Name</th>
                      <th>Company Name</th>
                      <th>Price(Taka)</th>
                      <th>Expire Date</th>
                      <th style='width: 10%;'>Action</th>";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='5' class='text-center'> No Medicine</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                          $id=$row[0];
                          $name=$row[1];
                          $company=$row[2];
                          $price=$row[3];
                          $date=$row[4];
                          

                          $out .= "<tr>
                          <td>$id</td>
                          <td>$name</td>
                          <td>$company</td>
                          <td>$price</td>
                          <td>$date</td>
                          <td>
                             <a href='delete.php?id=$id'> <button  id='$id' class='btn btn-danger remove'>
                                  Remove</button></a>
                          </td>";

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
                           
                            $mname=$_POST['mname'];
                            $company=$_POST['company'];
                            $price=$_POST['price'];
                            $date=$_POST['date'];
                            $Date=date('d-m-y', strtotime($date));
                            
                            $error =array();
                            
                            
                           if(empty($mname))
                            {
                                $error['u']="Enter Medicine Name";
                            }
                            else if(empty($company))
                            {
                                $error['u']="Enter Company Name";
                            }
                            else if(empty($price))
                            {
                                $error['u']="Enter Price Name";
                            }
                            else if(empty($date))
                            {
                                $error['u']="Enter Expire Date";
                            }
                            if(count($error)==0)
                            {
                              $query = "INSERT INTO Medicine  VALUES (Medicine_Id.nextval, '$mname','$company','$price',to_date('$Date','DD/MM/YYYY'))";
                              $stid = oci_parse($con, $query);
                      
                             oci_execute($stid);
                             
                            }
                        }
                         
                         

                       ?>
               
                       <h5 class ="text-center">Add Medicine</h5>
                       
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
                             <label>Medicine Name</label>
                             <input type="text" name="mname"  class="form-control"  placeholder="Enter Medicine Name"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Company</label>
                             <input type="text" name="company"  class="form-control"  placeholder="Enter Company Name"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Price</label>
                             <input type="number" name="price"  class="form-control" placeholder="Enter Medicine Price"
                             autocomplete="off">              
                            </div>
                            <div class="from-group">
                             <label>Expire Date</label>
                             <input type="Date" name="date"  class="form-control" placeholder="Enter Expire Date"
                             autocomplete="off">              
                            </div>
                            
                            </br>
                            <input type="submit" name="add" value="Add New Medicine" class="btn btn-success">

                    </form>

                    </div>
    </div>
</div>
</div>
</body>
</html>

