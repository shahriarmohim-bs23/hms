<?php

session_start();
?>

<!Doctype html>
<html>
<head>
    <title>Prescription</title>
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
                <h5 class="text-center">Prescription</h5>
                <?php
                if(isset($_GET['id']))
                {
                                    $id = $_GET['id'];
                                    $query="SELECT *from Patient where Patient_Id=$id";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                }

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center">Patient Details</h5>
                <h5 class="my-3">ID:<?php echo $row[0];?> </h5>
                <h5 class="my-3">USERNAME:<?php echo $row[1];?> </h5>
                <h5 class="my-3">Email:<?php echo $row[2];?> </h5>
                <h5 class="my-3">Mobile No:<?php echo $row[4];?> </h5>
                <h5 class="my-3">Age:<?php echo $row[5];?> </h5>
                <h5 class="my-3">Symptom:<?php echo $row[3];?> </h5>
              
                
                                           
                </div>
                <div class="col-md-4">
                
                <?php
                if(isset($_POST['update']))
                {
                    $Date=$_POST['date'];
                    $Date=date('d-m-y', strtotime($Date));
                    $medicine = $_POST['medicine'];
                   
                    $query = "SELECT *from Medicine where Medicine_Name='$medicine'";
                    $stid = oci_parse($con, $query);
                    oci_execute($stid);
                    $row = oci_fetch_row($stid);
		            $mid=$row[0];
                   //$query = oci_parse($con, "INSERT INTO Prescribed values($mid,$id)");
                   //oci_execute($query);
                    $pid=$_SESSION['pharmacist_Id'];
                    //$query = oci_parse($con, "INSERT INTO Pharmmedicne values($mid,$pid)");
                   //oci_execute($query);
                    $query = oci_parse($con, "INSERT INTO Prescription values($mid,$pid,$id,to_date('$Date','DD/MM/YYYY'))");
                    oci_execute($query);
                    
                }
                
                
                ?>
                <form method="post">
                <div class="form-group">
                <label>Enter Medicine Name</label>
                <input type="text"name="medicine"class="form-control" autocomplete="off"placeholder="Enter Medicine Name">
                </div>
                    <div class="form-group">
                        <label>Prescription Date</label>
                        <input type="date" name="date" class="form-control"
                        autocomplete="off">
                    </div>
                
                
                
                <input type="submit" name="update"class="btn btn-info my-3"
                value="Prescribed">
                </form>

                </div>
                </div>
         
        </div>


     
      </div>
    </div>
   </div>
</body>
</html>
