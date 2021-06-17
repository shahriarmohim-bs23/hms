<?php
$con = oci_connect("system", "abedur11", "localhost/XE");
$c= rand(1,1000);

if(isset($_POST['apply']))
{
                  $username = $_POST['uname'];
   
   
                   $phone  = $_POST['phone']; 
                   $nid      = $_POST['nid'];
    
                $address  =$_POST['address'];
    
                 $qualification=$_POST['qualification'];
                 $email=$_POST['email'];
                 $specialization=$_POST['specialization'];
                 $dept = $_POST['dept'];
                 $shedule = $_POST['shedule'];
                 $pass    =$_POST['pass'];
                 $offday   =$_POST['offday'];
                 $Date=$_POST['date'];
                 $Date=date('d-m-y', strtotime($Date));
                 $rate=$_POST['rate'];
                 $pass=$_POST['pass'];
                 
                 $con_pass =$_POST['con_pass'];

    $error = array();
    if(empty($username))
    {
        $error['apply']="Enter Username";
    }
    
    else if(empty($email))
    {
        $error['apply']="Enter Email";
    }
    else if(empty($shedule))
    {
        $error['apply']="Enter Shedule";
    }
    else if(empty($offday))
    {
        $error['apply']="Enter offday";
    }
    else if(empty($specialization))
    {
        $error['apply']="Enter specialization";
    }
    else if(empty($qualification))
    {
        $error['apply']="Enter Qualification";
    }
    else  if(empty($dept))
    {
        $error['apply']="Enter department";
    }
    else  if(empty($Date))
    {
        $error['apply']="Enter Joining Date";
    }
    else if(empty($phone))
    {
        $error['apply']="Enter Phone No";
    }

    else if(empty($nid))
    {
        $error['apply']="Enter NID";
    }
    else if(empty($rate))
    {
        $error['apply']="Enter Visiting Rate";
    }
    else if(empty($address))
    {
        $error['apply']="Enter Address";
    }
    else if(empty($pass))
    {
        $error['apply']="Enter Password";
    }
    else if($con_pass!=$pass)
    {
        $error['apply']="Both Password do not match";
    }

    


                
   
   
                  
    if(count($error)==0)
    {
        $query = oci_parse($con, "INSERT INTO  Doctor values($c,'$username','$email', '$address','$phone',40000,to_date('$Date','DD/MM/YYYY'),'$offday','$dept', '$shedule','$specialization',$rate,'$nid','$qualification','$pass','Pending')");
	
        oci_execute($query);
        if($query)
        {
            echo "<script>alert('You have Successfully Applied')</script>";
            header("Loacation: doctorlogin.php");

        }
        else
        {
            echo "<Script>alert('Failed')</script>";
        }
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






<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now!!!</title>

    <link rel="stylesheet" type="text/css"href=
 "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 
 <script type="text/javascript" src=""></script>


 
    
</head>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <h5 class="text-white">Hospital Management System</h5>
         <div class="mr-auto"></div>
         <ul class="navbar-nav">
             <li class="nav-item"><a href="../index.php" class ="nav-link text-white">Home</a></li>
             
        </ul>
</nav>
    
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6 jumbotron my-3">
            <h5 class="text-center my-2">Doctor</h5>
                <h5 class="text-center my-2">Apply Now!!!</h5>
                <div >
                <?php
                
                echo $show;
                
                ?>
                <form method="post">
                    

                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Username">
                    </div>
                    
                    
                    
    


                   

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                        
                    </div>


                    <div class="form-group">
                        <label>NID</label>
                        <input type="text" name="nid" class="form-control" autocomplete="off" placeholder="Enter NID Number">
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                        autocomplete="off" placeholder="Enter Address">
                    </div>
                    
                    <div class="form-group">
                        <label>Qualification</label>
                        <input type="text" name="qualification" class="form-control" autocomplete="off" placeholder="Enter Qualification">
                        
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email">
                    </div>


                    

                    <div class="form-group">
                        <label>Specialization</label>
                        <input type="text" name="specialization" class="form-control"
                        autocomplete="off" placeholder="Enter Specialization">
                    </div>

                    <div class="form-group">
                        <label>Select Department</label>
                        <select name="dept" class="form-control" >
                            <option value="">Select Department</option>
                            <option value="medicine">Medicine</option>
                            <option value="surgery">Surgery</option>
                            <option value="dental">Dental</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Shedule</label>
                        <select name="shedule" class="form-control" >
                            <option value="">Select Shedule</option>
                            <option value="8Am_to_4Pm">8Am to 4Pm</option>
                            <option value="4Pm_to_12Am">4Pm to 12Am</option>
                            <option value="12Am_to_8Am">12Am to 8Am</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>When Can you Join?</label>
                        <input type="date" name="date" class="form-control"
                        autocomplete="off">
                    </div>
                    

                    <div class="form-group">
                        <label>Off Day(Max 2 Days)</label>
                        <input type="text" name="offday" class="form-control"
                        autocomplete="off" placeholder="Enter Off Day">
                    </div>
				    <div class="form-group">
                        <label>Visiting Rate</label>
                        <input type="number" name="rate" class="form-control"
                        autocomplete="off" placeholder="Enter Visiting Rate">
                    </div>							

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="con_pass" class="form-control"
                        autocomplete="off" placeholder="Enter Confirm Password">
                    </div>

                    <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                    <p>I already have an account <a href="cashierlogin.php">Click here</a></p>
                    </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>
