<?php
session_start();
include "db_conn.php";


            if($_POST['code']==$_SESSION['vcode']){
              header("Location:register.php?");
              //echo '<script>alert("done");</script>';
            }
            else{
                echo '<script>alert("Invalid Code!");';
                header("Location:varify.php?error=Invalid Code!");
              //echo '<script>alert("not done");</script>';

            }
        

?>