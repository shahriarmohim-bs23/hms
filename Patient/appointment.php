<?php
session_start();
?>
<!Doctype html>
<html>
<head>
    <title>Appointment:)</title>
</head>

<body>
<?php
$con = oci_connect("system", "abedur11", "localhost/XE");
include("../include/header.php");

if(isset($_POST['appoint']))
{
                $Date=$_POST['date'];
                $Date=date('d-m-y', strtotime($Date));
                 $Time=$_POST['time'];
                
                 $Id = $_GET['id'];
                 $Id2 = $_SESSION['patient_Id'];
                 

    $error = array();   
    if(empty($Date))
    {
        $error['appoint']="Enter Appoint Date";
    }
    else if(empty($Time))
    {
        $error['appoint']="Enter Appoint Time";
    }

    
   
                  
    if(count($error)==0)
    {
        $query = oci_parse($con, "INSERT INTO  Appointment values('$Id','$Id2', to_date('$Date','DD/MM/YYYY'),'$Time','Pending' )");
	
        oci_execute($query);
        
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

            <?php
                
                                 $Id = $_GET['id'];
                                  $query="SELECT *from Doctor where Doctor_Id='$Id'";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                

                ?>
            

            <div class="col-md-6 jumbotron my-3">
            <h5 class="text-center my-2">Appoint</h5>
                <h5 class="text-center my-2">Schedule : <?php echo $row[9];?> </h5>
                <div >
                <?php
                
                echo $show;
                
                ?>
                <form method="post">
                    

                    


                    <div class="form-group">
                        <label>Appoint date: </label>
                        <input type="date" name="date" class="form-control"
                        autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Appoint time: </label>
                        <input type="time" name="time" class="form-control"
                        autocomplete="off">
                    </div>
                    

                    
				    

                    <input type="submit" name="appoint" value="Appoint Now" class="btn btn-success">
    
                    </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>