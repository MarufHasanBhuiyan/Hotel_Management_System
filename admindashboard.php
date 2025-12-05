<?php
include "connection.php";

$email= $_POST['email'];
$password= $_POST['password'];
$sql="SELECT * FROM adminsignup WHERE email='$email' AND password='$password'";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)<=0){
     echo "
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script>
        swal('Login Failed!', 'Incorrect Email or Password', 'error')
        .then(() => {
            window.location.href = 'login.php?';
        });
    </script>
    ";
    
} else {
     echo "
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script>
        swal('Success!', 'Login Successful!', 'success');
    </script>
    ";


    
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




 <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- nav tab -->
                <ul class="nav no-print nav-tabs">
                    <li class="nav-item">
                        <a href="#booking" class="nav-link active tab-btn" data-bs-toggle="tab">
                            Booking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#inhouse" class="nav-link  tab-btn " data-bs-toggle="tab">
                            In House
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#archieve" class="nav-link  tab-btn  " data-bs-toggle="tab">
                            Archive
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#cashier" class="nav-link cashier-tab  cashier " data-bs-toggle="tab">
                            Cashier
                        </a>
                    </li>
                </ul>
                <!-- nav pane -->
                <div class="tab-content">
                    <div class="tab-pane search-pane active container-fluid mt-3" id="booking">
                        <div class="row no-print my-5">

                            <div class="col-md-4 text-center">
                                <button data-bs-toggle="modal" data-bs-target="#registration-modal"
                                    class="btn action-btn b-register-btn px=4 text-white fw-bold">Register</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn action-btn px=4 print-btn text-white fw-bold">Print</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn action-btn px=4 total-btn text-white fw-bold">Total Booking</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <h1>All Booking Data</h1>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Location</th>
                                        <th>Room No</th>
                                        <th>Fullname</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Total people</th>
                                        <th>Mobile</th>
                                        <th>Price</th>
                                        <th>Notice</th>
                                        <th class="no-print">Created At</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="booking-list">
                                 
                                </tbody>
                            </table>
                        </div>
                        <div class="row py-5 show-booking-rooms">
            
                            
                        </div>

                    </div>
                    <div class="tab-pane search-pane  container-fluid mt-3" id="inhouse">
                        <div class="row my-5 no-print">

                            <div class="col-md-4 text-center">
                                <button data-bs-toggle="modal" data-bs-target="#inhouse-modal"
                                    class="btn action-btn in-house-reg-btn px=4 text-white fw-bold">Register</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn action-btn print-btn px=4 text-white fw-bold">Print</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn action-btn px=4 text-white total-btn fw-bold">Total Inhouse</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <h1>All In House Data</h1>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Location</th>
                                        <th>Room No</th>
                                        <th>Fullname</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Total people</th>
                                        <th>Mobile</th>
                                        <th>Price</th>
                                        <th>Notice</th>
                                        <th class="no-print">Created At</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="inhouse-list">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="row py-5 no-print show-inhouse-rooms">
                            
                            <div class="card text-center px-0 col-md-2">
                                <div class="bg-danger text-white fw-bold card-header">
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane search-pane  container-fluid mt-3" id="archieve">
                        <div class="row my-5 no-print">

                            <div class="col-md-6 ">
                                <button class="btn action-btn print-btn px=4 text-white fw-bold">Print</button>
                                <button class="btn action-btn px=4 text-white total-btn fw-bold">Total Archive</button>
                            </div>
                        </div>
                        <div>
                            <h1>All Archive Data</h1>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Location</th>
                                        <th>Room No</th>
                                        <th>Fullname</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                        <th>Total people</th>
                                        <th>Mobile</th>
                                        <th>Price</th>
                                        <th>Notice</th>
                                        <th class="no-print">Created At</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="archieve-list">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane cashier-tab-pan  container-fluid mt-3" id="cashier">

                        <div>
                            <h1>All Cashier Data</h1>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Room No</th>
                                        <th>Cashier</th>
                                        <th>Date/Time</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="cashier-list">


                                </tbody>
                            </table>
                            <div class="d-flex  mt-5 align-items-center justify-content-between">
                                <h1>Total</h1>
                                <h1 class="total" style="margin-right: 80px ;">6000</h1>
                            </div>
                        </div>
                        <div class="row my-5 no-print">

                            <div class="col-md-3 text-center">
                                <button data-bs-toggle="modal" data-bs-target="#cashier-modal"
                                    class="btn cash-btn action-btn px=4 text-white fw-bold">Add Cash</button>
                            </div>
                            <!-- <div class="col-md-3 text-center">
                                <button class="btn close-cashier-btn action-btn px=4 text-white fw-bold"> Close
                                    Cashier</button>
                            </div>
                            <div class="col-md-3 text-center">
                                <button data-bs-toggle="modal" data-bs-target="#cashier-arch-modal"
                                    onclick="showCashArchFunc()" class="btn action-btn px-4 text-white fw-bold"> Archive
                                    Cashier</button>
                            </div> -->
                            <div class="col-md-3 text-center">
                                <button class="btn action-btn print-btn px=4 text-white fw-bold">Print</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Start Modals coding -->

    <!-- Booking Modals -->
    <div class="modal animate__animated animate__zoomIn" id="registration-modal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Registration Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body-body p-4">
                    <form class="booking-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input required name="fullname" type="text" class="mb-3 form-control"
                                    placeholder="Fullname">
                            </div>
                            <div class="col-md-6">
                                <input required name="location" type="text" class="mb-3 form-control"
                                    placeholder="Location">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input required name="roomNo" type="number" class="mb-3 form-control"
                                    placeholder="Room No">
                            </div>
                            <div class="col-md-6">
                                <input required name="totalPeople" type="number" class="mb-3 form-control"
                                    placeholder="Total People">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Check In Date</label>
                                <input required name="checkInDate" type="date" class="mb-3 form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Check Out Date</label>
                                <input required name="checkOutDate" type="date" class="mb-3 form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input required name="price" type="number" class="mb-3 form-control"
                                    placeholder="Price">
                            </div>
                            <div class="col-md-6">
                                <input required name="mobile" type="tel" class="mb-3 form-control" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <textarea name="notice" class="form-control" placeholder="Notice"></textarea>
                        </div>
                        <div class="row mb-3">
                            <button type="submit" class="btn action-btn text-white fw-bold">Register</button>
                            <button type="button" class="btn d-none bg-danger text-white fw-bold">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- In house modals -->
    <div class="modal animate__animated animate__zoomIn" id="inhouse-modal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>In House Form</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body-body p-4">
                    <form class="inhouse-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input required name="fullname" type="text" class="mb-3 form-control"
                                    placeholder="Fullname">
                            </div>
                            <div class="col-md-6">
                                <input required name="location" type="text" class="mb-3 form-control"
                                    placeholder="Location">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input required name="roomNo" type="number" class="mb-3 form-control"
                                    placeholder="Room No">
                            </div>
                            <div class="col-md-6">
                                <input required name="totalPeople" type="number" class="mb-3 form-control"
                                    placeholder="Total People">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Check In Date</label>
                                <input required name="checkInDate" type="date" class="mb-3 form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Check Out Date</label>
                                <input required name="checkOutDate" type="date" class="mb-3 form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input required name="price" type="number" class="mb-3 form-control"
                                    placeholder="Price">
                            </div>
                            <div class="col-md-6">
                                <input required name="mobile" type="text" class="mb-3 form-control"
                                    placeholder="Mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <textarea name="notice" class="form-control" placeholder="Notice"></textarea>
                        </div>
                        <div class="row mb-3">
                            <button type="submit" class="btn action-btn text-white fw-bold">Register</button>
                            <button type="button" class="btn d-none bg-danger text-white fw-bold">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- archieve -->
    <div class="modal animate__animated animate__zoomIn" id="cashier-arch-modal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Archive Cash</h5>
                    <button class="btn action-btn arch-print-btn  mx-5 mb-1 text-white">Print</button>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body-body p-4">
                    <div class="table-responsive">

                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Cashier</th>
                                    <th>Date/Time</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody class="cashier-arch-list">


                            </tbody>
                        </table>
                        <div class="d-flex mt-5 align-items-center justify-content-between">
                            <h1>Total</h1>
                            <h1 class="arch-total" style="margin-right: 80px ;"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Cashier Modal -->
    <div class="modal animate__animated animate__zoomIn" id="cashier-modal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Cashier Form</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body-body p-4">
                    <form class="cashier-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input required name="amount" type="number" class="mb-3 form-control"
                                    placeholder="Amount">
                            </div>
                            <div class="col-md-6">
                                <input required name="roomNo" type="number" class="mb-3 form-control"
                                    placeholder="Room No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input required name="cashierName" type="text" readonly class="mb-3 form-control">
                            </div>
                            <div class="row mb-3">
                                <button type="submit" class="btn action-btn text-white fw-bold">Register</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    







    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</body>
</html>



<?php
}
?>
