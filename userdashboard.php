<?php
include 'connection.php';
if (isset($_GET['id']) && $_GET['id'] != '') {
    
    
    $inhouseid = (int)$_GET['id']; 

} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/admindashboard.css">
    <link rel="stylesheet" href="css/dashboard.css"> -->
    <link rel="stylesheet" href="css/userdashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
    
<?php
include 'nav.html'; ?>



<br>

<div class="containeruserdashboard">
    
    <div class="service">
        <h3>Looking For Services?</h3>
        <form action="insertuser.php?id=<?php echo $inhouseid; ?>" method="post">
            <label for="services">Select Your Required Service</label>
            <br>
            <select name="services" id="services">
                <option value="laundry">Laundry</option>
                <option value="roomcleaning">Room Cleaning</option>
                <option value="taxi">Taxi Service</option>
                <option value="spa">Spa</option>
                <option value="gym">Gym Access</option>
                <option value="pool">Swimming Pool</option>
                <option value="breakfast">Breakfast</option>
                <option value="dinner">Dinner</option>
                <option value="extrasupplies"> Extra Room Supplies</option>
                <option value="other">Other</option>
            </select>
            <br><br>
            <label for="details">Provide Additional Details:</label><br>
            <textarea id="details" name="details" rows="4" cols="50"
                placeholder="Specify your requirements here..."></textarea>
            <br><br>
            <input type="submit" value="Request Service">

        </form>
    </div>
    
    <br><br>
    <hr>
    
     
    <div class="food">
       
        <h3>Looking for foods?</h3>
        <div class="cards">
            <div class="card">
                <img src="images/burger.jpg" alt="Burger">
                <h4>Burger</h4>
                <p>600.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/swarma.jpg" alt="Swarma">
                <h4>Swarma</h4>
                <p>250.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/pizza.jpg" alt="Pizza">
                <h4>Pizza</h4>
                <p>900.00 tk</p>
                <button>Order Now</button>
            </div>
        </div>

         <div class="cards">
            <div class="card">
                <img src="images/friedrice.jpg" alt="Fried Rice">
                <h4>Fried Rice</h4>
                <p>1000.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/steak.jpg" alt="Steak">
                <h4>Steak</h4>
                <p>1500.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/pasta.jpg" alt="Pasta">
                <h4>Pasta</h4>
                <p>700.00 tk</p>
                <button>Order Now</button>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <img src="images/donout.jpg" alt="Donout">
                <h4>Donout</h4>
                <p>150.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/icecream.jpg" alt="Ice Cream">
                <h4>Chocolate Icecream</h4>
                <p>350.00 tk</p>
                <button>Order Now</button>
            </div>
            <div class="card">
                <img src="images/pudding.jpg" alt="Pudding">
                <h4>Pudding</h4>
                <p>400.00 tk</p>
                <button>Order Now</button>
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