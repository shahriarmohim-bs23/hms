<?php
session_start();
$con = oci_connect("system", "abedur11", "localhost/XE");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cleaner Job Request</title>
</head>
<body>


<?php
include("../include/header.php");

?>


<div class ="container-fluid">
  <div class="col-md-12">
  <div class="row">
          <div class="col-md-10">
           <?php
               include("navber.php");
                 ?>

                <div class="col-md-10">
                        <h5 class="text-center"> Cleaner Job Request</h5>
                          <div id="show"></div>
                 </div>


  </div>
  </div>
  </div>
  
<script type="text/javascript">
$(document).ready(function(){
  show();
   function show(){
       $.ajax({
           url:"cleajax_job_request.php",
           method:"POST",
           success:function(data)
           {
               $("#show").html(data);
           }
       })
   }
   $(document).on('click','.approve',function(){
     var id=$(this).attr("id");
     alert(id);

$.ajax({
url :"cleajax_approve.php",
method:"POST",
data:{id:id},
success:function(data)
{
 show();
}



});


   });
   $(document).on('click','.reject',function(){
     var id=$(this).attr("id");
     alert(id);

$.ajax({
url :"cleajax_reject.php",
method:"POST",
data:{id:id},
success:function(data)
{
 show();
}



});


   });
   
   
   
   
});
</script>


</body>

</html>