
<?php
include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search in Guest;s Service Requests</title>
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
            <form action="userservicerequestsearch.php" method="get" class="search-bar">
                        <input type="search" class=" search-input form-control"
                            name="search" id="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>">
                            
                        <button class="btn-admindashboard">Search</button>
                </form>
            </div>

        <div class="intro">
            <a href="login.php" class="btn-admindashboard">Logout</a>

        </div>
    </div>
        <br><br>



    <div class="menu">
        <a href="admindashboardbooking.php" class="btn-admindashboard" ><b>Booking</b></a>
        <a href="admindashboardinhouse.php" class="btn-admindashboard"><b>In House</b></a>
        <a href="admindashboardarchive.php" class="btn-admindashboard"><b>archive</b></a>
        <a href="admindashboardcashier.php" class="btn-admindashboard"><b>cashier</b></a>
        <a style="text-align:right;" href="userservicerequest.php" class="btn-admindashboard"><b>Guest's Service Requests✔️</b></a>
        <hr>
    </div>
    

<br><br>
                     <h3>All Guest's Service Search-Matched Data</h3>
                  
    <div class="table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Location</th>
                    <th>Room No</th>
                    <th>Total People</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Price</th>
                    <th>Mobile</th>
                    <th>Notice</th>
                    <th>Created Date</th>
                    <th>Password</th>
                    <th>Service Name</th>
                    <th>Details</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                 <?php
            include 'connection.php';
            $keyword = $_GET['search'];
            $sql= "SELECT * FROM user WHERE fullname LIKE '%$keyword%' OR location LIKE '%$keyword%' OR roomno LIKE '%$keyword%' OR mobile LIKE '%$keyword%' or service LIKE '%$keyword%'";
            $result = mysqli_query($con, $sql); 
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
    <tr>
        <td><?= $row['inhouseid'] ?></td>
        <td><?= $row['fullname'] ?></td>
        <td><?= $row['location'] ?></td>
        <td><?= $row['roomno'] ?></td>
        <td><?= $row['totalpeople'] ?></td>
        <td><?= $row['checkin'] ?></td>
        <td><?= $row['checkout'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['mobile'] ?></td>
        <td><?= $row['notice'] ?></td>
        <td><?= $row['createddate'] ?></td>
        <td><?=$row['password']?></td>
        <td><?= $row['service'] ?></td>
        <td><?= $row['details'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
  







    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

        
</body>
</html>

