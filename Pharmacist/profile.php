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
                <h5 class="text-center"> <?php echo $_SESSION['pharmacist_name'];?>'s Profile</h5>
                <?php
                
                                    $Id= $_SESSION['pharmacist_Id'];
                                    $query="SELECT *from Pharmacist where Pharmacist_Id='$Id'";

                                 $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center"><?php echo $_SESSION['pharmacist_name'];?>'s Details</h5>
                <h5 class="my-3">ID:<?php echo $row[0];?> </h5>
                <h5 class="my-3">Salary:<?php echo $row[6];?> </h5>
                <h5 class="my-3">Shift:<?php echo $row[4];?> </h5>
                
                
                                           
                </div>
                <div class="col-md-4">
                
                <?php
                if(isset($_POST['update']))
                {
                   
                    $user = $_POST['uname'];
                    $address = $_POST['address'];
                    $email=$_POST['email'];
                    $mobile = $_POST['mobile'];
                    $age = $_POST['age'];
                    $nid = $_POST['nid'];
                    $qualification = $_POST['qualification'];
                    $institution=$_POST['institution'];
                    

                   
                    $query = "UPDATE Pharmacist SET Pharmacist_Name='$user',Pharmacist_Address= '$address',Pharmacist_Phone='$mobile',Pharmacist_Experience=$age,
                    Pharmacist_Nid = '$nid',Pharmacist_Institute='$institution',Pharmacist_Degree='$qualification' where Pharmacist_Id='$Id' ";
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
                        $query = "UPDATE Pharmacist SET Pharmacist_Password= '$pass' where  Pharmacist_Id='$Id'";
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
                value="<?php echo $row[11]?>">
                </div>
                <div class="form-group">
                <label>Edit Email</label>
                <input type="text"name="email"class="form-control" autocomplete="off"placeholder="Edit Email"
                value="<?php echo $row[1]?>">
                </div>
                <div class="form-group">
                <label>Edit Address </label>
                <input type="text"name="address"class="form-control" autocomplete="off"placeholder="Edit Address"
                value="<?php echo $row[2]?>">
                </div>
                <div class="form-group">
                <label>Edit Mobile-No</label>
                <input type="text"name="mobile"class="form-control" autocomplete="off"placeholder="Edit Mobile-No"
                value="<?php echo $row[3]?>">
                </div>
                <div class="form-group">
                <label>Edit Experience</label>
                <input type="text"name="age"class="form-control" autocomplete="off"placeholder="Edit Experience"
                value="<?php echo $row[5]?>">
                </div>
                <div class="form-group">
                <label>Edit NID</label>
                <input type="text"name="nid"class="form-control" autocomplete="off"placeholder="Edit NID"
                value="<?php echo $row[7]?>">
                </div>
                <div class="form-group">
                <label>Edit Qualification</label>
                <input type="text"name="qualification"class="form-control" autocomplete="off"placeholder="Edit Qualification"
                value="<?php echo $row[9]?>">
                </div>
                <div class="form-group">
                <label>Edit Institution</label>
                <input type="text"name="institution"class="form-control" autocomplete="off"placeholder="Edit Institution"
                value="<?php echo $row[8]?>">
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



