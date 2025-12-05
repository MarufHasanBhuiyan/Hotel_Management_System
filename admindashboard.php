<?php
include "connection.php";


    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminsignup WHERE email='$email' AND password='$password'";
    $run = mysqli_query($con, $sql);

    if(mysqli_num_rows($run) <= 0){
        // Login Failed
        echo <<<EOD
        <!DOCTYPE html>
        <html>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal('Login Failed!', 'Incorrect Email or Password', 'error')
            .then(() => {
                window.location.href = 'login.php';
            });
        </script>
        </body>
        </html>
        EOD;

    } else {
        // Login Success
        echo <<<EOD
        <!DOCTYPE html>
        <html>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal('Success!', 'Login Successful!', 'success')
            .then(() => {
                window.location.href = 'admindashboardbooking.php';
            });
        </script>
        </body>
        </html>
        EOD;
    }

?>
