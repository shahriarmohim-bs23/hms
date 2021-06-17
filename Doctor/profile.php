
<?php
session_start();
?>
<!Doctype html>
<html>
<head>
    <title>Edit Profile</title>
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
                <h5 class="text-center"> <?php echo $_SESSION['doctor_Name'];?>'s Profile</h5>
                <?php
                
                                    $Id= $_SESSION['doctor_Id'];
                                    $query="SELECT *from Doctor where Doctor_Id='$Id'";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center"><?php echo $row[1];?>'s Details</h5>
                <h5 class="my-3">ID:<?php echo $row[0];?> </h5>
                <h5 class="my-3">Salary:<?php echo $row[5];?> </h5>
                <h5 class="my-3">Shedule:<?php echo $row[9];?> </h5>
                <h5 class="my-3">Joining Date:<?php echo $row[6];?> </h5>
                <h5 class="my-3">Medicine:<?php echo $row[8];?> </h5>
                <h5 class="my-3">Specialization:<?php echo $row[10];?> </h5>
                
                
                
                
                                           
                </div>
                <div class="col-md-4">
                
                <?php
                if(isset($_POST['update']))
                {
                    
                   
                    $user = $_POST['uname'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $mobile = $_POST['mobile'];
                    $rate = $_POST['rate'];
                    $nid = $_POST['nid'];
                    $qualification = $_POST['qualification'];
                   
                    $off  =   $_POST['off'];

                    

                   
                    $query = "UPDATE Doctor SET Doctor_Name ='$user',Doctor_Address= '$address',Doctor_Phone='$mobile',
                    Doctor_Nid = '$nid',   Doctor_VisitingRate='$rate', Doctor_Offday='$off',Doctor_Email='$email' where Doctor_Id='$Id'";
                    $stid = oci_parse($con, $query);
                    oci_execute($stid);
                    
                }
                else if(isset($_POST['change']))
                {
                    $pass    =$_POST['pass'];
                    $con_pass =$_POST['con_pass'];
                    $error = array();
                    if($con_pass!=$pass)
                    {
                       $error['apply']="Both Password do not match";
                    }
                    if(count($error)==0)
                    {
                        $query = "UPDATE Doctor SET Doctor_Password= '$pass' where  Doctor_Id='$Id' ";
                        $stid = oci_parse($con, $query);
                        oci_execute($stid);
                      
    
                    }

                }
    if(isset($error['apply']))
    {
        $s = $error['apply'];
        $show = "<h5 class='text-center alert-danger'>$s</h5>";
    }
    else
    {
        $show ="";
    }
                
                
                ?>
                <form method="post">
                <div class="form-group">
                <label>Edit Username</label>
                <input type="text"name="uname"class="form-control" autocomplete="off"placeholder="Edit Username"
                value="<?php echo $row[1]?>">
                </div>
                <div class="form-group">
                <label>Edit Email</label>
                <input type="text"name="email"class="form-control" autocomplete="off"placeholder="Edit Email"
                value="<?php echo $row[2]?>">
                </div>
                <div class="form-group">
                <label>Edit Address </label>
                <input type="text"name="address"class="form-control" autocomplete="off"placeholder="Edit Address"
                value="<?php echo $row[3]?>">
                </div>
                <div class="form-group">
                <label>Edit Mobile-No</label>
                <input type="text"name="mobile"class="form-control" autocomplete="off"placeholder="Edit Mobile-No"
                value="<?php echo $row[4]?>">
                </div>
                <div class="form-group">
                <label>Edit Offday</label>
                <input type="text"name="off"class="form-control" autocomplete="off"placeholder="Edit OffDay"
                value="<?php echo $row[7]?>">
                </div>
                <div class="form-group">
                <label>Edit NID</label>
                <input type="text"name="nid"class="form-control" autocomplete="off"placeholder="Edit NID"
                value="<?php echo $row[12]?>">
                </div>
                <div class="form-group">
                <label>Edit Qualification</label>
                <input type="text"name="qualification"class="form-control" autocomplete="off"placeholder="Edit Qualification"
                value="<?php echo $row[13]?>">
                </div>
                <div class="form-group">
                <label>Edit Visiting rate</label>
                <input type="number"name="rate"class="form-control" autocomplete="off"placeholder="Edit visiting Rate"
                value="<?php echo $row[11]?>">
                </div>
            
                
                
                
                <input type="submit" name="update"class="btn btn-info my-3"
                value="Update">
                </form>
                <form method="post">


                   <div class="form-group">
                        <label>Change Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm  New Password</label>
                        <input type="password" name="con_pass" class="form-control"
                        autocomplete="off" placeholder=" Confirm New Password">
                    </div>
                <input type="submit" name="change"class="btn btn-info my-3"
                value="Change">
                </form>

                </div>
                </div>
         
        </div>


     
      </div>
    </div>
   </div>
</body>
</html>



