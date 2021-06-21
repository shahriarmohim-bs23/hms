<?php
$con = oci_connect("system", "abedur11", "localhost/XE");
$c= rand(1,1000);

if(isset($_POST['apply']))
{
    $username = $_POST['uname'];
   
    $shift = $_POST['shift'];
    $phone  = $_POST['phone']; 
    $nid      = $_POST['nid'];
    $experience     = $_POST['experience'];
    $address  =$_POST['address'];
    $institute =$_POST['institute'];
    $qualification =$_POST['qualification'];
    $email=$_POST['email'];
    $pass    =$_POST['pass'];
    $con_pass =$_POST['con_pass'];
    $length = strlen ($phone);
    $len =   strlen ($nid);
    $len1=strlen($pass);
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  

    $filename =$_FILES['cert']['name'];

     $target_dir = "uploads/";
     $destination = $target_dir . basename($_FILES["cert"]["name"]);
     $extension = pathinfo($filename,PATHINFO_EXTENSION);
     $uploadOk = 1;
 
     $file = $_FILES['cert']['tmp_name'];
     $size = $_FILES['cert']['size'];

    $error = array();
     if (!preg_match ("/^[0-9]*$/",  $phone) ){  
        $error['apply']= "Only numeric value is allowed in Mobile No."; 
       } 
      else if ( $length !=11) {  
        $error['apply']= "Mobile must have 11 digits.";  
                  
    } 
    else if ( $len !=10) {  
        $error['apply']= "NID must have 10 digits.";  
                  
    }
      else if (!preg_match ($pattern, $email) ){  
        $error['apply'] = "Email is not valid.";  
             
    } 
    else if($experience<0)
{
    $error['apply'] = "Experience is Not Valid";  
}
else if($len1<6)
{
    $error['apply'] = "Password Less than 6 digit";  
}
 else   if(empty($username))
    {
        $error['apply']="Enter Username";
    }
    
    else if(empty($email))
    {
        $error['apply']="Enter Email";
    }
    else if(empty($institute))
    {
        $error['apply']="Enter Institute Name";
    }
    else if(empty($qualification))
    {
        $error['apply']="Enter qualification";
    }
    else  if(empty($shift))
    {
        $error['apply']="Enter Shift";
    }
    else if(empty($phone))
    {
        $error['apply']="Enter Phone No";
    }

    else if(empty($nid))
    {
        $error['apply']="Enter NID";
    }
    else if(empty($experience))
    {
        $error['apply']="Enter Experience";
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
        if (!in_array($extension, ['zip', 'pdf', 'docx', 'png'])) {
            echo "You file extension must be .zip, .pdf , .docx or .png";
        } 
        elseif ($_FILES['cert']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } 
        else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {

                $query = oci_parse($con, "INSERT INTO Pharmacist values($c,'$email','$address','$phone','$shift',$experience,15000,'$nid','$institute','$qualification','$pass','$username','Pending','$filename' )");     
                oci_execute($query);

                if($query)
                {
                    echo "<script>alert('You have Successfully Applied')</script>";
                    //header("Location: login.php");
                }
            }
            else {
                echo "<Script>alert('Failed')</script>";
            }
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


 <script src="https://code.jquery.com/jquery-3.6.0.slim.js" 
 integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
 <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"href=
"https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"></script>
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
            <h5 class="text-center my-2">Pharmacist</h5>
                <h5 class="text-center my-2">Apply Now!!!</h5>
                <div >
                <?php
                
                echo $show;
                
                ?>
                <form method="post" enctype="multipart/form-data">
                    

                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Username">
                    </div>
                    
                    
                    


                    <div class="form-group">
                        <label>Select Shift</label>
                        <select name="shift" class="form-control" >
                            <option value="">Select Shift</option>
                            <option value="morning">Morning</option>
                            <option value="noon">Noon</option>
                            <option value="night">Night</option>
                        </select>
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
                        <label>Experience</label>
                        <input type="number" name="experience" class="form-control" autocomplete="off" placeholder="Enter Experience">
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                        autocomplete="off" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" name="institute" class="form-control" autocomplete="off" placeholder="Enter Institute Name">
                        
                    </div>
                    <div class="form-group">
                        <label>Degree</label>
                        <input type="text" name="qualification" class="form-control" autocomplete="off" placeholder="Enter Qualification">
                        
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email">
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

                    <div class="form-group">
                        <label>Upload your certificate: </label>
                        <input type="file" name="cert" class="form-control">
                    </div>

                    <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                    <p>I already have an account <a href="pharmacistlogin.php">Click here</a></p>
                    </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>