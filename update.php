<?php
include "db_conn.php";
$mailc;
if($_POST['npass']!=$_POST['cpass']){
	header("Location: update_pass.php?error=Both Passwords Not Matching");
}

$sql = "UPDATE login SET password='npass' WHERE Email='$mailc'";
$result = mysqli_query($conn, $sql);
if($result==1)
{
		header("Location: index.php");

}
else{
		header("Location: update_pass.php?error=something went wrong");
		

}
?>