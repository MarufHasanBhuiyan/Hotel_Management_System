<?php
include "connection.php";

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$location = $_POST['location'];
$roomno = $_POST['roomno'];
$totalpeople = $_POST['totalpeople'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$price = $_POST['price'];
$mobile = $_POST['mobile'];
$notice = $_POST['notice'];

$sql = "UPDATE booking SET 
        fullname='$fullname', 
        location='$location', 
        roomno='$roomno', 
        totalpeople='$totalpeople', 
        checkin='$checkin', 
        checkout='$checkout', 
        price='$price', 
        mobile='$mobile', 
        notice='$notice' 
        WHERE id='$id'";

if(mysqli_query($con, $sql)) {
     echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Booking Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Success!', 'Booking Updated Successfully!', 'success')
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
        <title>Booking Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Error!', 'Failed to update booking: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); // goes back to the same form with input preserved
            });
        </script>
    </body>
    </html>
    ";
}
?>