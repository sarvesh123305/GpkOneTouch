//have to add other validationns like password and conform password
<?php 

include "db_conn.php";
session_start(); //starts a session

if(isset($_POST["submitReg"])){  
    /*$e = $_POST['EmailReg'];
    $query="SELECT * FROM register WHERE Email='$e'"; 

    if (mysqli_query($con, $query)
    {
        //echo'<script>alert("Email is Already Present !");</script>' ;
       // echo 'alert("Email is Already Present")';
        // echo "<script>alert('Email is Present')</script>";  
        //header("Location:index.html");

    }
    
    if($_POST['Password'] != $_POST['ConfirmPassword'])
    {
        //echo '<script>alert(" Both Passwords Are Not Matched !");</script>' ;
        header("Location:index.php?");
    }*/
    if(!empty($_POST['NameReg']) && !empty($_POST['EmailReg'])  &&!empty($_POST['Phone_no']) && !empty($_POST['Password']) && !empty($_POST['ConfirmPassword'])) {  
        
        echo '<script>alert("All fields are filled");</script>';
        $name=$_POST['NameReg'];  
        $email=$_POST['EmailReg'];  
        $phone=$_POST['Phone_no'];
        $Password=$_POST['Password'];  
        $ConfirmPassword=$_POST['ConfirmPassword'];  

        $_SESSION["name"]=$_POST['NameReg'];  
        $_SESSION["email"]=$_POST['EmailReg'];  
        $_SESSION["phone"]=$_POST['Phone_no'];
        $_SESSION["Password"]=$_POST['Password'];  
        $_SESSION["ConfirmPassword"]=$_POST['ConfirmPassword'];  
        $_SESSION["vcode"]=rand(1000,9999);

        //below code for send a mail
        $to = $_SESSION["email"];

        $subject = "Confirmation";
        
        $message = "</br>";
        $message .= "<h1>This is Varification Mali for Your Email:".$_SESSION["email"]."</h1>";
        $message .= "</br>";
        $message .= "<p>Your varification code is ".$_SESSION["vcode"]."</p></br>".$_SESSION["name"];
        $message .= "</br>";
        $message .= $_SESSION["email"];

        
        $header = "From:Onetouchgp123@gmail.com \r\n";
        $header .= "Cc:".$_SESSION["email"]."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == 1 ) {

           header("Location:varify.php?");
           exit();
           
       }
       else {
           echo '<script>alert("Message could not be send...");</script>';
       }
  
    }
    else {  
    // echo "All fields are required!";    
        echo '<script>alert("All fields are required");</script>';

    }  

}  
else{
  echo "Some Error Occured";
}
?>  