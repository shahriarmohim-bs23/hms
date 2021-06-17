<?php

session_start();

?>
<!Doctype html>

    <head>
        <title>Administrators</title>
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
                   <div class="col-md-6">
                       <h5 class ="text-center">All Admin</h5>
                       <?php

                      $ad=$_SESSION['admin'];




                      $query = "SELECT *from Administrator Where Admin_Email !='$ad'";
                      $stid = oci_parse($con, $query);
                      oci_execute($stid);
                      
                       $count=oci_fetch_all($stid, $results);
                      
                     
        

                      $out="<table class ='table  table-bordered'>
                      <th>ID</th>
                      <th>USERNAME</th>
                      <th style='width: 10%;'>Action</th>";
                      
                      if($count<1)
                      {
                          $out .="<tr><td colspan='3' class='text-center'> No New Admin</td></tr>";

                      }
                      oci_execute($stid);
                      while($row = oci_fetch_row($stid))
                      {
                          $id=$row[0];
                          $username=$row[2];
                          

                          $out .= "<tr>
                          <td>$id</td>
                          <td>$username</td>
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
                    <div class="col-md-6">
                        <?php
                        if(isset($_POST['add']))
                        {
                           
                            $uname=$_POST['uname'];
                            $email=$_POST['email'];
                            $pass=$_POST['pass'];
                            
                            $error =array();
                            
                            
                           if(empty($email))
                            {
                                $error['u']="Enter Email";
                            }
                            else if(empty($uname))
                            {
                                $error['u']="Enter Username";
                            }
                            else if(empty($pass))
                            {
                                $error['u']="Enter Password";
                            }
                            if(count($error)==0)
                            {
                              $query = "INSERT INTO Administrator  VALUES (Admin_Id.nextval, '$email','$uname','$pass')";
                              $stid = oci_parse($con, $query);
                      
                             oci_execute($stid);
                             
                            }
                        }
                         
                         

                       ?>
               
                       <h5 class ="text-center">Add Admin</h5>
                       
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
                             <label>Username</label>
                             <input type="text" name="uname"  class="form-control"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Email</label>
                             <input type="text" name="email"  class="form-control"
                             autocomplete="off">              
                            </div>

                            <div class="from-group">
                             <label>Password</label>
                             <input type="password" name="pass"  class="form-control"
                             autocomplete="off">              
                            </div></br>
                            <input type="submit" name="add" value="Add New Admin" class="btn btn-success">

                    </form>

                    </div>
    </div>
</div>
</div>
</body>
</html>

