<?php
include "connection.php";

$fullname=$_POST['fullname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$htown=$_POST['htown'];
$phone=$_POST['mobile']; 
$email=$_POST['email'];
$password=$_POST['password'];
$pet=$_POST['pet'];

$sql="INSERT INTO adminsignup(fullname,dob,gender,hometown,phone,email,password,pet) 
VALUES('$fullname','$dob','$gender','$htown','$phone','$email','$password','$pet')";

$run = mysqli_query($con,$sql);

if($run){
    header("Location: login.php?status=success");
    exit();
} else {
    header("Location: login.php?status=failed");
    exit();
}
?>
