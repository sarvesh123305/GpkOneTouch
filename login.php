

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title></title>
</head>
<body>
<!-- Button trigger modal -->
<!-- Modal -->

 <?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['Email']) && !empty($_POST['Pass'])) {  
    $user=$_POST['Email'];  
    $pass=$_POST['Pass'];  
  $_POST['Email']="";
  $_POST['Pass']="";
    $con=mysqli_connect('localhost','root','',"onetouch"); 
    $query1=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=@mysqli_num_rows($query1);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query1))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
    /* Redirect browser */  
    // header("Location: index.php");  
    // echo '<script>alert("Welcome to GP Connect")</script>';
   echo "<script type='text/javascript'>
$(document).ready(function(){
$('#LoginSuccess').modal('show');
});
</script>";
    }  
    } else {  
      // echo "Invalid username or password!";
    // echo '<script>alert("Invalid username or password!")</script>';
        echo "<script type='text/javascript'>
$(document).ready(function(){
$('#LoginFailure').modal('show');
});
</script>";

    }  
  
} else {  
    // echo "All fields are required!"; 
    // echo '<script>alert("All fields are required")</script>';

}  
}  
else{
  echo "Some Error Occured";
}
?>  
<div class="modal fade" id="LoginSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><img src="images/Success.png" class="responsive" height="30px" width="30px" />Success</h5>
                 <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>

      </div>
      <div class="modal-body">
        You have been logged in successfully
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="LoginFailure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><img src="images/failure.jpeg" class="responsive" height="30px" width="30px" />Failure</h5>
                    <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>

      </div>
      <div class="modal-body">
    Invalid Username or Password
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
