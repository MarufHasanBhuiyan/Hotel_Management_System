<?php
include "connection.php"; ?>


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
            <form action="cashiersearch.php" method="get" class="search-bar">
                        <input type="search" class=" search-input form-control"
                            placeholder="Search By Guest-Name,Room No...." name="search" id="search" >
                            
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
        <a href="admindashboardcashier.php" class="btn-admindashboard"><b>cashier✔️</b></a>
        <hr>
    </div>

    
  
  
   <div class="menu1">
        <div class="addcash">
            <!-- Button trigger modal -->
            <button style="width:100px;" type="button" class="btn btn-primary btn-admindashboard" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <b>Add Cash</b>
          </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cashier Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insertcashier.php" method="post">
                <div class="modal-body">
                    

                        <input type="number" name="amount" class="form-control" required id="amount" placeholder="Amount">
                        <br>

                        <input type="number" name="roomno" id="roomno" class="form-control" required  placeholder="Room No">
                        <br>

                        <input type="text" name="guestname" id="guestname" placeholder="Guest Name" class="form-control" required >
                        <br>

                        <input type="text" name="cashiername" class="form-control" required id="cashiername" placeholder="Cashier Name" value="Maruf Hasan (Cashier)">
                        <br>

                         <?php date_default_timezone_set('Asia/Dhaka'); ?>
                         <input type="hidden" name="createddate" id="createddate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                           
                   
                </div>
                <div class="modal-footer">
                   
                    <input type="submit" class="btn btn-primary btn-admindashboard"  value="Add Cash">
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
            $sql = "SELECT sum(amount) as total_amount FROM cashier";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total_amount'];
            ?>


             <input style="width:200px; font-weight:bold;" type="button" class="btn btn-primary btn-admindashboard" value="Total: <?php echo $total; ?> tk">
        </div>



    </div>


<br><br>
               <h3>All Cashier Data</h3>
    <div class="table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Guest Name</th>
                    <th>Room No</th>
                    <th>amount</th>
                    <th>Cashier Name</th>
                    <th>Created Date</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cashier ORDER BY createddate DESC";
                $result = mysqli_query($con, $sql); ?>
               <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['guestname'] ?></td>
        <td><?= $row['roomno'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['cashiername'] ?></td>
        <td><?= $row['createddate'] ?></td>
       
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



