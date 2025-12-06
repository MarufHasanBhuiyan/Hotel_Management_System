<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "UPDATE user SET status='Completed' WHERE id=$id";
$run=mysqli_query($con, $sql);
if ($run) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Request Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Success!', 'Service Request Marked as Completed!', 'success')
            .then(() => {
                window.location.href = 'userservicerequest.php';
            });
        </script>
    </body>
    </html>
    ";
    exit();
} else {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Request Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Error!', 'Failed to Mark Request as Completed!', 'error')
            .then(() => {
                window.location.href = 'userservicerequest.php';
            });
        </script>
    </body>
    </html>
    ";
    exit();
}




?>