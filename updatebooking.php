<?php
include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/admindashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>

    <div class="nav-bar">
        <div class="logo">
            <img src="images/logo.png" alt="LOGO">
            <a href="homepage.html" style="text-decoration: none;"><span><b>The Grand Palace</b></span></a>

        </div>

         <div >
            <form action="" method="" class="search-bar">
                        <input type="search" class=" search-input form-control"
                            placeholder="Search By Name,Email,Room No....">
                            
                        <button class="btn-admindashboard">Search</button>
                </form>
            </div>

        <div class="intro">
            <a href="login.php" class="btn-admindashboard">Logout</a>

        </div>
    </div>
    
        <?php
        $id=$_GET['id'];
        $sql="SELECT * FROM `booking` WHERE id='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        ?>

        <div class="container mt-5">
    <h2>Update Booking</h2>
    <form action="updatebookingaction.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?= $row['fullname'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" value="<?= $row['location'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Room No</label>
            <input type="number" name="roomno" value="<?= $row['roomno'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Total People</label>
            <input type="number" name="totalpeople" value="<?= $row['totalpeople'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Check-in</label>
            <input type="date" name="checkin" value="<?= $row['checkin'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Check-out</label>
            <input type="date" name="checkout" value="<?= $row['checkout'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="<?= $row['price'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="tel" name="mobile" value="<?= $row['mobile'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Notice</label>
            <textarea name="notice" class="form-control"><?= $row['notice'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>


     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</body>
</html>
