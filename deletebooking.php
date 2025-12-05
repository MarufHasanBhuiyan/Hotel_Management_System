<?php
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM booking WHERE id='$id'";

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
            swal('Success!', 'Booking Deleted Successfully!', 'success')
            .then(() => {
                window.location.href = 'admindashboardbooking.php';
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
            swal('Error!', 'Failed to delete booking: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); // goes back to the previous page
            });
        </script>
    </body>
    </html>
    ";
}


?>