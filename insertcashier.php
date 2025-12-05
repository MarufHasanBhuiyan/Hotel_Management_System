<?php
include "connection.php";
$amount = $_POST['amount'];
$roomno = $_POST['roomno'];
$guestname = $_POST['guestname'];
$cashiername = $_POST['cashiername'];
$createddate = $_POST['createddate'];
$sql = "INSERT INTO cashier (amount, roomno, guestname, cashiername, createddate) VALUES ('$amount', '$roomno', '$guestname', '$cashiername', '$createddate')";
if (mysqli_query($con, $sql)) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Cashier Insertion Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Success!', 'Cash Added Successfully!', 'success')
            .then(() => {
                window.location.href = 'admindashboardcashier.php';
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
        <title>Cashier Insertion Status</title>
        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    </head>
    <body>
        <script>
            swal('Error!', 'Failed to add cash: " . mysqli_error($con) . "', 'error')
            .then(() => {
                window.history.back(); // goes back to the previous page
            });
        </script>
    </body>
    </html>
    ";
}

?>