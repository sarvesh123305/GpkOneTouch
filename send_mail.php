<?php
include "db_conn.php";

$mail=$_GET['maill'];
    
$sql = "SELECT * FROM login WHERE Email='$mail'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    $pass=$row['password'];
    
    $to = "$mail";
         $subject = "Recovery";
         
         $message = "</b>";
         $message .= "<h1>This is Your Password For Your Account $pass</h1>";
         
         $header = "From:Onetouchgp123@gmail.com \r\n";
         $header .= "Cc:$mail\r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == 1 ) {

            header("Location:index.php");
            //header("Location: index.html?error=The mail is sent to your mail enter the code ");

            exit();
            
        }else {
            echo "Message could not be sent...";
        }

}
else{

    echo $mailc;
        header("Location: forget.php?error=It seems like you dont have account!33");

        exit();

}








         


?>
