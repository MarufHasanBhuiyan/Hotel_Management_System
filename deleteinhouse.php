<?php
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM inhouse WHERE id='$id'";

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
            swal('Success!', 'Inhouse Booking Deleted Successfully!', 'success')
            .then(() => {
                window.location.href = 'admindashboardinhouse.php';
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
            swal('Error!', 'Failed to delete inhouse data: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); 
            });
        </script>
    </body>
    </html>
    ";
}


?>