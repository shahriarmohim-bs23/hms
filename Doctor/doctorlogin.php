<?php
session_start();
$con = oci_connect("system", "abedur11", "localhost/XE");
if(isset($_POST['login']))
{
	$user = $_POST['uname'];
	
	$pass=$_POST['pass'];
	if($user!=""&&$pass!="")
	{
		$query = oci_parse($con, "SELECT * FROM Doctor WHERE Doctor_Email= '$user' AND Doctor_Password = '$pass' AND Doctor_Status='Approved'");
		oci_execute($query);
		$row = oci_fetch_array($query, OCI_ASSOC);

		$count=oci_num_rows($query);
        $stid=oci_execute($query);
		
		if($count==1)
		{
            oci_execute($query);
            $row = oci_fetch_row($query);
		    $id=$row[0];
            $name=$row[1];
		
			$_SESSION['doctor']=$user;
            $_SESSION['doctor_Id']=$row[0];
            $_SESSION['doctor_Name']=$row[1];

			header('Location:doctor.php');
		
		}
		else
		{
		
		echo	"<script>alert('Invalid user_name or Password')</script>";
		}
		              
        
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor login page</title>

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
                <h5 class="text-center my-2">Doctors Login</h5>
                
                <form method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter password">
                    </div>

                    <input type="submit" name="login" class="btn btn-success" value="Login">

                    <p>I dont have an acciount <a href="apply.php">Apply Now!!!</a></p>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

    
</body>
</html>