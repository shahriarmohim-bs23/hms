<!DOCTYPE html>
<html>
<head>
 <title>Mohim</title>
 <link rel="stylesheet" type="text/css"href=
 "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 
 <script type="text/javascript" src=""></script>


 <script src="https://code.jquery.com/jquery-3.6.0.slim.js" 
 integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
 <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"href=
"https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

</head> 


 </head>
 <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <h5 class="text-white">Hospital Management System</h5>
         <div class="mr-auto"></div>
         <ul class="navbar-nav">
             <?php
             if(isset($_SESSION['admin']))
             {
                 $user = $_SESSION['admin'];
                 echo '<li class="nav-item"><a href= "admin.php" class="nav-link text-yallow">'.$user.'</a></li>
                 <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

                 
             }
             else if(isset($_SESSION['cashier']))
             {
                $user = $_SESSION['cashier'];
                echo '<li class="nav-item"><a href= "cashier.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
             else if(isset($_SESSION['cleaner']))
             {
                $user = $_SESSION['cleaner'];
                echo '<li class="nav-item"><a href= "cleaner.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
             else if(isset($_SESSION['doctor']))
             {
                $user = $_SESSION['doctor'];
                echo '<li class="nav-item"><a href= "doctor.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
             else if(isset($_SESSION['nurse']))
             {
                $user = $_SESSION['nurse'];
                echo '<li class="nav-item"><a href= "nurse.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
             else if(isset($_SESSION['patient']))
             {
                $user = $_SESSION['patient'];
                echo '<li class="nav-item"><a href= "patient.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
             else if(isset($_SESSION['pharmacist']))
             {
                $user = $_SESSION['pharmacist'];
                echo '<li class="nav-item"><a href= "pharmacist.php" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href= "logout.php" class="nav-link text-white">Logout</a></li>';

             }
            
             else
             {
             echo '
             <li class="nav-item"><a href="Admin/Adminlogin.php" class ="nav-link text-white">Admin</a></li>
             <li class="nav-item"><a href="Doctor/doctorlogin.php" class ="nav-link text-white">Doctor</a></li>
             <li class="nav-item"><a href="patient/patientlogin.php" class ="nav-link text-white">Patient</a></li>
             <li class="nav-item"><a href="Nurse/nurselogin.php" class ="nav-link text-white">Nurse</a></li>
             <li class="nav-item"><a href="Pharmacist/pharmacistlogin.php" class ="nav-link text-white">Pharmacist</a></li>
             <li class="nav-item"><a href="Cashier/cashierlogin.php" class ="nav-link text-white">Cashier</a></li>
             <li class="nav-item"><a href="Cleaner/cleanerlogin.php" class ="nav-link  text-white">Cleaner</a></li>';
             }
             ?>
        </ul>
</nav>
        </body>
 </html>

