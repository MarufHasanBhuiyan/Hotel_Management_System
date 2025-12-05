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
    <link rel="stylesheet" href="css/dashboard.css">
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
            <form action="inhousesearch.php" method="get" class="search-bar">
                        <input type="search" class=" search-input form-control"
                            placeholder="Search By Name,Room No...." name="search" id="search" >
                            
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
        <a href="admindashboardinhouse.php" class="btn-admindashboard"><b>In House✔️</b></a>
        <a href="admindashboardarchive.php" class="btn-admindashboard"><b>archive</b></a>
        <a href="admindashboardcashier.php" class="btn-admindashboard"><b>cashier</b></a>
        <hr>
    </div>

    
   <div class="menu1">
        <div class="register">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-admindashboard" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <b>Register</b>
          </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insertinhouse.php" method="post">
                <div class="modal-body">
                    

                        <input type="text" name="name" class="form-control" required id="name" placeholder="Full Name">
                        <br>

                        
                        <input type="text" name="location" class="form-control" required id="location" placeholder="Location">
                        <br>

                     
                        <input type="number" name="roomno" id="roomno" class="form-control" required  placeholder="Room No">
                        <br>

                         
                        <input type="number" name="totalpeople" id="totalpeople" placeholder="Total People" class="form-control" required >
                        <br>

                        <label for="checkin">Check In Date</label>
                         <input type="date" name="checkin" id="checkin"  class="form-control" required >
                         <br>

                          <label for="checkout">Check Out Date</label>
                         <input type="date" name="checkout" id="checkout"  class="form-control" required >

                            <br>

                        <input type="number" name="price" id="price" placeholder="Price" class="form-control" required >
                        <br>

                        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" class="form-control" required >
                        <br>
                       


                        <textarea name="notice" id="notice" style="width:450px;" placeholder="notice"></textarea>

                         <?php date_default_timezone_set('Asia/Dhaka'); ?>
                         <input type="hidden" name="createddate" id="createddate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            <?php
                                $randomPass=rand(1000,9999);
                            ?>

                         <input type="hidden" name="password" id="password" value="<?php echo $randomPass; ?>">

                   
                </div>
                <div class="modal-footer">
                   
                    <input type="submit" class="btn btn-primary btn-admindashboard"  value="Save">
                </div>
                 </form>
                </div>
            </div>
            </div>

        </div>


        <div class="print">
             <button class="btn btn-primary btn-admindashboard" onclick="printTable()"><b>Print</b></button>
        </div>

                <script>
                function printTable() {
                    var table = document.querySelector(".table"); 
                    var newWin = window.open("");
                    newWin.document.write("<html><head><title>Print</title>");
                    // Include Bootstrap CSS for styling (optional)
                    newWin.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">');
                    newWin.document.write("</head><body>");
                    newWin.document.write(table.outerHTML); // only the table
                    newWin.document.write("</body></html>");
                    newWin.document.close();
                    newWin.print();
                }
                </script>




        
        <div class="total">

            <?php
            $sql = "SELECT COUNT(id) as total_bookings FROM inhouse";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total_bookings'];
            ?>


             <input style="width:200px; font-weight:bold;" type="button" class="btn btn-primary btn-admindashboard" value="Total: <?php echo $total; ?>">
        </div>



    </div>


<br><br>
               <h3>All In-House Data</h3>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM inhouse";
                $result = mysqli_query($con, $sql); ?>
               <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
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
        <td>
            <a href="updateinhouse.php?id=<?=$row['id']?>" ><i class="fa fa-edit" title="update"></i></a>
            &nbsp;&nbsp;
            <a href="deleteinhouse.php?id=<?=$row['id']?>" ><i class="fa fa-trash" title="delete"></i></a>
            &nbsp;&nbsp;
            <a href="inhousetoarchive.php?id=<?=$row['id']?>" ><i class="fa fa-sign-in-alt " title="checkout"></i>
</a>
        </td>
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




