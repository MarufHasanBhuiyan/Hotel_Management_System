<?php
include "connection.php";

$fullname = $_POST['name'];
$location = $_POST['location'];
$roomno = $_POST['roomno'];   
$totalpeople = $_POST['totalpeople'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$price = $_POST['price'];
$mobile = $_POST['mobile'];
$notice = $_POST['notice'];
$createddate = date('Y-m-d H:i:s'); 

$sql = "INSERT INTO `booking`(`fullname`, `location`, `roomno`, `totalpeople`, `checkin`, `checkout`, `price`, `mobile`, `notice`, `createddate`) 
        VALUES ('$fullname','$location','$roomno','$totalpeople','$checkin','$checkout','$price','$mobile','$notice','$createddate')";

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
            swal('Success!', 'Booking Added Successfully!', 'success')
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
            swal('Error!', 'Failed to add booking: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); 
            });
        </script>
    </body>
    </html>
    ";
}
?>
