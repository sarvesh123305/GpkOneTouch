<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
</head>
<body>
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Failure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
       Email already Exists!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php 
session_start();//existing session starts 

  $name=$_SESSION["name"];  
  $email= $_SESSION["email"];  
  $phone=$_SESSION["phone"];
  $Password=$_SESSION["Password"];  

  $con=mysqli_connect('localhost','root','',"onetouch"); 
  $query="insert into register (name,email,phone,password) values('$name','$email','$phone','$Password')";  
  try{
  if (mysqli_query($con, $query))
  {
        /* echo '<script>alert("Done")</script>' ;
          echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#Register').modal('show');
                });
                </script>";
        */
        session_destroy();//it will distroy all the session variables

        mysqli_close($con);//it will close the connection

        header("Location:index.php?");//redirect to main page
  } 
  else {
        /* echo '<script>alert("Sorry")</script>' ;
          echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#Register').modal('show');
          });
          </script>";
        */
        echo '<script>alert("data insertion issue");</script>';

  }
    }
    catch(Exception $e)
    {
         echo "<script type='text/javascript'>
$(document).ready(function(){
$('#Register').modal('show');
});
</script>";
    }
?>  