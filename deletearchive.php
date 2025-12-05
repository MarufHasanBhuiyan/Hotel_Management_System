<?php
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM archive WHERE id='$id'";

if (mysqli_query($con, $sql)) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Booking Deletion Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Success!', 'Archive Data Deleted Successfully!', 'success')
            .then(() => {
                window.location.href = 'admindashboardarchive.php';
            });
        </script>
    </body>
    </html>
    ";
} else {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Booking Deletion Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Error!', 'Failed to delete archive data: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); // goes back to the previous page
            });
        </script>
    </body>
    </html>
    ";
}


?>