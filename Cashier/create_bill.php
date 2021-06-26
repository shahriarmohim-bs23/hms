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
               
                
                
                 $Id = $_GET['id'];
                 $Id2 = $_SESSION['cashier_Id'];
                 $medicine=$_POST['medicine'];
                 $room=$_POST['room'];
                 $doctor=$_POST['doctor'];
                 $hos=$_POST['hos'];
                 $staff=$_POST['staff'];
                 $total= $medicine+$room+$doctor+ $hos+$staff;

                 

    $error = array();   
    if(empty($medicine))
    {
        $error['appoint']="Enter Medicine Fee";
    }
  else  if(empty($room))
    {
        $error['appoint']="Enter Room Fee";
    }
    else  if(empty($doctor))
    {
        $error['appoint']="Enter Doctor Fee";
    }
    else  if(empty($hos))
    {
        $error['appoint']="Enter Hospital Fee";
    }
    else  if(empty($staff))
    {
        $error['appoint']="Enter Staff Fee";
    }
    
    
                  
    if(count($error)==0)
    {
        $query = oci_parse($con, "INSERT INTO  Bill ( Medicine_Fee,Room_Fee,Doctor_Fee,Hospital_Fee,Staff_Fee,Total_Fee,Patient_Id,Cashier_Id,Bill_Status) values($medicine,$room,$doctor,$hos, $staff,$total,$Id, $Id2,'Not paid')");
	    oci_execute( $query);
        
        
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
 <?php
                                 $Id = $_GET['id']; 
                                $query = "select R.Room_Id, Room_Cost
                                 from  Room R, Admission Ad
                                 where  R.Room_Id = Ad.Room_Id and Ad.Patient_Id=$Id and Discharge_Date is NULL";
                                 $stid = oci_parse($con, $query);
                                
                                 oci_execute($stid);
	                            
                                 
		                         $row = oci_fetch_row($stid);
                                 $id2=$row[0];
                                 $query="UPDATE Room set Room_Status='Not Booked' where Room_Id='$id2'";
                                 $stid = oci_parse($con, $query);
                                 oci_execute($stid);

                                   
?>



    
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <?php


                 include("navber.php");
        ?>
            <div class="col-md-3"></div>

            

            <div class="col-md-6 jumbotron my-3">
            <h5 class="text-center my-2">Create Bill</h5>
                
                <div >
                <?php
                
                echo $show;
                
                ?>
                <form method="post">
                    

                    


                    <div class="form-group">
                        <label>Medicine Fee: </label>
                        <input type="number" name="medicine" class="form-control"
                        autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Room Fee: </label>
                        <input type="number" name="room" class="form-control"
                        autocomplete="off"  value="<?php echo $row[1]?>">
                    </div>
                    <div class="form-group">
                        <label>Doctor Fee: </label>
                        <input type="number" name="doctor" class="form-control"
                        autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Hospital Fee: </label>
                        <input type="number" name="hos" class="form-control"
                        autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Staff Fee: </label>
                        <input type="number" name="staff" class="form-control"
                        autocomplete="off">
                    </div>
                   
                    
				    

                    <input type="submit" name="appoint" value="Create Bill" class="btn btn-success">
    
                    </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>