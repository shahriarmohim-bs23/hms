<?php
session_start();
$con = oci_connect("system", "abedur11", "localhost/XE");
if(isset($_POST['login']))
{
	$email = $_POST['email'];
    
	
	$pass=$_POST['pass'];
	if($email!=""&&$pass!="")
	{
      
        
		$query = oci_parse($con, "SELECT * FROM Administrator WHERE Admin_Email= '$email' AND Admin_pass= '$pass'");
        
		oci_execute($query);
		$row = oci_fetch_array($query, OCI_ASSOC);

		$count=oci_num_rows($query);
    
		
		if($count==1)
		{
			$_SESSION['admin']=$email;

			header('Location: admin.php');
		
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
    <title>Admin login page</title>

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

<body style="background-image: url(back.jfif); background-size: cover; background-repeat: no-repeat">

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
                <h5 class="text-center my-2">Admin Login</h5>
                
                <form method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter password">
                    </div>

                    <input type="submit" name="login" class="btn btn-success" value="Login">

                    
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

    
</body>
</html>