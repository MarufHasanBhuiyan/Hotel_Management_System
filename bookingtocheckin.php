<?php
include "connection.php";


$id = $_GET['id'];


$sql = "SELECT * FROM booking WHERE id='$id'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

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
    $password = rand(1000,9999);
    

    $insert = "INSERT INTO inhouse (fullname, location, roomno, totalpeople, checkin, checkout, price, mobile, notice, createddate, password) 
               VALUES ('$fullname','$location','$roomno','$totalpeople','$checkin','$checkout','$price','$mobile','$notice','$createddate','$password')"; ?>

   
<?php
if(mysqli_query($con, $insert)){
    $delete = "DELETE FROM booking WHERE id='$id'";
    mysqli_query($con, $delete);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
    <script>
        swal('Checked In!', 'Booking moved to Inhouse successfully.', 'success')
        .then(() => {
            window.location.href = 'admindashboardbooking.php';
        });
    </script>
    </body>
    </html>
    <?php
} else {
    echo "Error: " . mysqli_error($con);
}
}
?>