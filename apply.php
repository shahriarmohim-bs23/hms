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


<body style="background-image: url(back.jfif); background-size: cover; background-repeat:no-repeat">

<nav class="navbar navbar-expand-lg navbar-info bg-info">
         <h5 class="text-white">Hospital Management System</h5>
         <div class="mr-auto"></div>
         <ul class="navbar-nav">
             <li class="nav-item"><a href="" class ="nav-link text-white">Admin</a></li>
             <li class="nav-item"><a href="" class ="nav-link  text-white">Doctor</a></li>
             <li class="nav-item"><a href="" class ="nav-link  text-white">Patient</a></li>
        </ul>
</nav>
    
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6 jumbotron my-3">
                <h5 class="text-center my-2">Apply Now!!!</h5>
                
                <form method="post">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control"
                        autocomplete="off" placeholder="Enter Firstname">
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control"
                        autocomplete="off" placeholder="Enter Surname">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                        <label>Select Gender</label>
                        <select name="gender" class="form-control" >
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                        
                    </div>

                    <div class="form-group">
                        <label>Select Country</label>
                        <select name="country" class="form-control" >
                            <option value="">Select Country</option>
                            <option value="Russia">Russia</option>
                            <option value="India">India</option>
                            <option value="Ghana">Ghana</option>
                        </select>
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

                    <input type="submit" name="apply" class="Apply Now" class="btn btn-success">
                    <p>I already have an account <a href="doctorlogin.php">Click here</a></p>
                </form>

            </div>
            <div class="col-md-3"></div>
        
        </div>
    </div>
</div>

</body>
</html>