<?php
include 'connection.php';

$phone     = $_POST['phone'];
$room      = $_POST['room'];
$bookingid = $_POST['bookingid'];

$query  = "SELECT * FROM inhouse WHERE mobile='$phone' AND roomno='$room' AND password='$bookingid'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);
    // make sure id is an integer to avoid JS/URL injection
    $inhouse_id = (int) $row['id'];

    // show success then redirect to userdashboard.php?id=...
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
            swal('Success!', 'User Login Successful!', 'success')
            .then(() => {
                // Redirect with the matched inhouse id
                window.location.href = 'userdashboard.php?id={$inhouse_id}';
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
        <title>Booking Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Error!', 'Wrong Credentials, Login Failed!!!', 'error')
            .then(() => {
                window.history.back(); // goes back to the same form with input preserved
            });
        </script>
    </body>
    </html>
    ";
    exit();
}
?>
