<?php
include "connection.php";
$inhouseid=$_GET['id'];
$sql="SELECT * FROM inhouse WHERE id='$inhouseid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$id=$inhouseid;
$fullname = $row['fullname'];
$location = $row['location'];
$roomno = $row['roomno'];
$totalpeople = $row['totalpeople'];
$checkin = $row['checkin'];
$checkout = $row['checkout'];
$price = $row['price'];
$mobile = $row['mobile'];
$notice = $row['notice'];
$createddate = date('Y-m-d H:i:s');
$password = $row['password'];
$service = $_POST['services'] ?? '';
$details = $_POST['details'] ?? '';

$query = "INSERT INTO `user`(`fullname`, `location`, `roomno`, `totalpeople`, `checkin`, `checkout`, `price`, `mobile`, `notice`, `createddate`, `password`, `service`, `details`,`inhouseid`) 
        VALUES ('$fullname','$location','$roomno','$totalpeople','$checkin','$checkout','$price','$mobile','$notice','$createddate', '$password', '$service', '$details','$inhouseid')";
        $run = mysqli_query($con, $query);
if ($query) {
    
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
            swal('Success!', 'Request Successful!', 'success')
            .then(() => {
                 window.location.href = 'userdashboard.php?id={$inhouseid}';
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
            swal('Error!', 'Failed to request: ', 'error')
            .then(() => {
                window.history.back(); 
            });
        </script>
    </body>
    </html>
    ";
}
?>