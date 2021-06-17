<?php

session_start();
?>

<!Doctype html>
<html>
<head>
    <title>Edit Cashier</title>
</head>
<body>
<?php
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
                <h5 class="text-center">Edit Pharmacist</h5>
                <?php
                if(isset($_GET['id']))
                {
                                    $id = $_GET['id'];
                                    $query="SELECT *from Pharmacist where Pharmacist_Id=$id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                }

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center">Pharmacist Details</h5>
                <h5 class="my-3">ID:<?php echo $row[0];?> </h5>
                <h5 class="my-3">Username:<?php echo $row[11];?> </h5>
                <h5 class="my-3">Email:<?php echo $row[1];?> </h5>
                <h5 class="my-3">Address:<?php echo $row[2];?> </h5>
                <h5 class="my-3">Mobile No:<?php echo $row[3];?> </h5>
                <h5 class="my-3">Experience:<?php echo $row[5];?> </h5>
                <h5 class="my-3">NID:<?php echo $row[7];?> </h5>
                <h5 class="my-3">Institution Name:<?php echo $row[8];?> </h5>
                <h5 class="my-3">Degree:<?php echo $row[9];?> </h5>
                
                                           
                </div>
                <div class="col-md-4">
                
                <?php
                if(isset($_POST['update']))
                {
                   
                    $salary = $_POST['salary'];
                    $shift =$_POST['shift'];
                    $query = "UPDATE Pharmacist SET Pharmacist_Salary= $salary, Pharmacist_Shift='$shift'  where Pharmacist_Id=$id";
                    $stid = oci_parse($con, $query);
                    oci_execute($stid);
                    
                }
                
                
                ?>
                <form method="post">
                <div class="form-group">
                <label>Update Pharmacist's Salary</label>
                <input type="number"name="salary"class="form-control" autocomplete="off"placeholder="Enter Pharmacist's Salary"
                value="<?php echo $row[6]?>">
                </div>
                
                
                <div class="form-group">
                     <label>Change Pharmacist's Shift</label>
                        <select name="shift" class="form-control" >
                            <option value=""><?php echo $row[4]?></option>
                            <option value="morning">Morning</option>
                            <option value="noon">Noon</option>
                            <option value="night">Night</option>
                        </select>
                    </div>
                <input type="submit" name="update"class="btn btn-info my-3"
                value="Update">
                </form>

                </div>
                </div>
         
        </div>


     
      </div>
    </div>
   </div>
</body>
</html>
