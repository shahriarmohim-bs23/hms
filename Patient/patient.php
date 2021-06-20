<?php
session_start();

$con = oci_connect("system", "abedur11", "localhost/XE");
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>

    <link rel="stylesheet" type="text/css"href=
 "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 
 <script type="text/javascript" src=""></script>


 <script src="https://code.jquery.com/jquery-3.6.0.slim.js" 
 integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
 <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"href=
"https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"></script>

</head>

<body>
   
<?php
include("../include/header.php");
?>



<?php
include("navber.php");
?>
                <div class="col-md-10">
                     
                    <h4 class="my-2">Patient Dashboard</h4>

                    <div class="col-md-12 my-5">
                        <div class="row">
                        <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-8">
                                    <?php
                                   $id = $_SESSION['patient_Id'];
                                 $query = "SELECT *from Bill where Patient_Id=$id and Bill_Status='Not Paid'";
                                 $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $count=oci_fetch_all($stid, $results);
                                 if($count==1){
                                 
                                 $row = oci_fetch_row($stid);
                                 $count=$row[5];
                                 }
                                   
                                    ?>
                                        <h5 class="my-2 text-white"
                                        style="font-size: 30px;"><?php echo $count;?></h5>
                                        <h5 class="text-white">Taka</h5>
                                        <h5 class="text-white">Bill</h5>

                                    </div>
                                    <div class="col-md-4">
                                        <a href="bill.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                           
                </div>

    
</body>
</html>