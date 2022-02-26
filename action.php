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
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    
    }  
    } else {  
    // echo "Invalid username or password!";
    echo '<script>alert("Invalid username or password!")</script>';

    }  
  
} else {  
    // echo "All fields are required!"; 
    echo '<script>alert("All fields are required")</script>';

}  
}  
?>  