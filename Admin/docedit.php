<?php

session_start();
?>

<!Doctype html>
<html>
<head>
    <title>Edit Doctor</title>
</head>
<body>
<?php


include("../include/header.php");
$con = oci_connect("system", "abedur11", "localhost/XE");

?>
<div class="container-fulid">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-10">
            
                
                <?php


                 include("navber.php");
                ?>

             
                <div class ="col-md-10">
                <h5 class="text-center">Edit Doctor</h5>
                <?php
                if(isset($_GET['id']))
                {
                                 $id = $_GET['id'];
                                 $query="SELECT *from Doctor where Doctor_Id=$id";

                                 $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                                 echo $row[0];
                           
                }

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center">Doctor Details</h5>
                <h5 class="my-3">ID:<?php echo $row[0];?> </h5>
                <h5 class="my-3">USERNAME:<?php echo $row[1];?> </h5>
                <h5 class="my-3">EMAIL:<?php echo $row[2];?> </h5>
                <h5 class="my-3">Address:<?php echo $row[3];?> </h5>
                <h5 class="my-3">Phone:<?php echo $row[4];?> </h5>
                <h5 class="my-3">Joining Date:<?php echo $row[6];?> </h5>
                <h5 class="my-3">Department:<?php echo $row[8];?> </h5>
                <h5 class="my-3">Specialization:<?php echo $row[10];?> </h5>
                <h5 class="my-3">Visiting Rate:<?php echo $row[11];?> </h5>
                <h5 class="my-3">NID:<?php echo $row[12];?> </h5>
                <h5 class="my-3">Qualification:<?php echo $row[13];?> </h5>
                
                                           
                </div>
                <div class="col-md-4">
                <?php
                if(isset($_POST['update']))
                {
                   
                    $salary = $_POST['salary'];
                   
                    $offday =$_POST['offday'];
                    $shedule =$_POST['shedule'];
                    
                    $query = "UPDATE  Doctor SET  Doctor_Salary= $salary,  Doctor_Offday='$offday',
                    Doctor_Schedule='$shedule' where Doctor_Id=$id";
                    $stid = oci_parse($con, $query);
                    oci_execute($stid);
                    
                }
                
                
                ?>
                <h5 class="text_center">Update information</h5>
                <form method="post">
                <label>Enter Doctor's Salary</label>
                <input type="number"name="salary"class="form-control" autocomplete="off"placeholder="Enter Doctor's Salary"
                value="<?php echo $row[5]?>">
                <label>Change offday</label>
                <input type="text"name="offday"class="form-control" autocomplete="off"placeholder="Change OffDay"
                value="<?php echo $row[7]?>">
                <label>Change Shedule</label>
                <select name="shedule" class="form-control" >
                            <option value=""><?php echo $row[9];?></option>
                            <option value="8Am_to_4Pm">8Am to 4Pm</option>
                            <option value="4Pm_to_12Am">4Pm to 12Am</option>
                            <option value="12Am_to_8Am">12Am to 8Am</option>
                </select>
               
                <input type="submit" name="update"class="btn btn-info my-3"
                value="Update Salary">
                </form>

                </div>
                </div>
         
        </div>


     
      </div>
    </div>
   </div>
</body>
</html>
