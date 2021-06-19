<?php
session_start();
?>
<!Doctype html>
<html>
<head>
    <title>BooK</title>
</head>

<body>
<?php
$con = oci_connect("system", "abedur11", "localhost/XE");
include("../include/header.php");

if(isset($_POST['appoint']))
{
                $Date=$_POST['date'];
                $Date=date('d-m-y', strtotime($Date));
                
                
                 $Id = $_GET['id'];
                 $Id2 = $_SESSION['patient_Id'];
                 

    $error = array();   
    if(empty($Date))
    {
        $error['appoint']="Enter Appoint Date";
    }
    
   
                  
    if(count($error)==0)
    {
        $query = oci_parse($con, "INSERT INTO  Admission(Room_Id,Patient_Id,Admission_date) values('$Id','$Id2', to_date('$Date','DD/MM/YYYY'))");
	
        oci_execute($query);
        $query = "UPDATE Room SET Room_Status='BooKed' where Room_Id=$Id";
        $stid = oci_parse($con, $query);
        oci_execute($stid);
        
    }
}
    if(isset($error['appoint']))
    {
        $s = $error['appoint'];
        $show = "<h5 class='text-center alert-danger'>$s</h5>";
    }
    else
    {
        $show ="";
    }



?>



    
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <?php


                 include("navber.php");
        ?>
            <div class="col-md-3"></div>

            

            <div class="col-md-6 jumbotron my-3">
            <h5 class="text-center my-2">Book Room</h5>
                
                <div >
                <?php
                
                echo $show;
                
                ?>
                <form method="post">
                    

                    


                    <div class="form-group">
                        <label>Admission Date: </label>
                        <input type="date" name="date" class="form-control"
                        autocomplete="off">
                    </div>
                   
                    
				    

                    <input type="submit" name="appoint" value="BooK Now" class="btn btn-success">
    
                    </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>