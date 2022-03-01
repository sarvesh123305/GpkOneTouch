<?php  
if(isset($_POST["submitreg"])){  
if(!empty($_POST['NameReg']) && !empty($_POST['EmailReg'])  &&!empty($_POST['Phone_no'])) {  
    $name=$_POST['NameReg'];  
    $email=$_POST['EmailReg'];  
    $phone=$_POST['Phone_no'];  

  $_POST['NameReg']="";
  $_POST['EmailReg']="";
  $_POST['Phone_no']="";

      $con=mysqli_connect('localhost','root','',"onetouch"); 
    $query="insert into register (name,email,phone) values('$name','$email','$phone')";  
    if (mysqli_query($conn, $query)) {
    alert("Donee");

       
} else {
          alert("Sorry");
}
  
  
} else {  
    // echo "All fields are required!"; 
    echo '<script>alert("All fields are required")</script>';

}  
mysqli_close($conn);

}  
?>  