
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
                <h5 class="text-center"> <?php echo $_SESSION['cleaner'];?>'s Profile</h5>
                <?php
                
                                    $username= $_SESSION['cleaner'];
                                    $query="SELECT *from Cleaner where Cleaner_Name='$username'";

                                $stid = oci_parse($con, $query);
                                 oci_execute($stid);
                                 $row = oci_fetch_row($stid);
                           
                

                ?>
                <div class="row">
                <div class="col-md-8">
                <h5  class="text-center"><?php echo $_SESSION['cleaner'];?>'s Details</h5>
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
                    $mobile = $_POST['mobile'];
                    $age = $_POST['age'];
                    $nid = $_POST['nid'];
                    $gender = $_POST['gender'];

                    

                   
                    $query = "UPDATE Cleaner SET Cleaner_Name ='$user',Cleaner_Address= '$address',Cleaner_Phone='$mobile',Cleaner_Age=$age,
                    Cleaner_Nid = '$nid',Cleaner_Gender='$gender' where  Cleaner_Name ='$username' ";
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
                        $query = "UPDATE Cleaner SET Cleaner_Password= '$pass' where  Cleaner_Name='$username' ";
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
                <label>Edit Age</label>
                <input type="text"name="age"class="form-control" autocomplete="off"placeholder="Edit Age"
                value="<?php echo $row[5]?>">
                </div>
                <div class="form-group">
                <label>Edit NID</label>
                <input type="text"name="nid"class="form-control" autocomplete="off"placeholder="Edit NID"
                value="<?php echo $row[8]?>">
                </div>
                <div class="form-group">
                     <label>Edit Gender </label>
                        <select name="gender" class="form-control" >
                            <option value=""><?php echo $row[9]?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                        </select>
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



