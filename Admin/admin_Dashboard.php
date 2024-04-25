<?php
$servername = "localhost";
$db_username = "vpatel3";
$db_password = "2njxx2njxxb35l7b35l7";
$db_name = "vpatel3shoppingcart";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Query to get the count of customers
$sqlCustomers = "SELECT COUNT(*) AS customerCount FROM customers";
$resultCustomers = $conn->query($sqlCustomers);
$rowCustomers = $resultCustomers->fetch_assoc();
$customerCount = $rowCustomers['customerCount'];

// Query to get the count of orders
$sqlOrders = "SELECT COUNT(*) AS ordersCount FROM orders";
$resultOrders = $conn->query($sqlOrders);
$rowOrders = $resultOrders->fetch_assoc();
$orderCount = $rowOrders['ordersCount'];

// Query to get the count of second-hand cars
$sqlSecondHandCars = "SELECT COUNT(*) AS secondHandCarCount FROM second_hand_cars";
// $resultSecondHandCars = $conn->query($sqlSecondHandCars);
// $rowSecondHandCars = $resultSecondHandCars->fetch_assoc();
// $secondHandCarCount = $rowSecondHandCars['secondHandCarCount'];

// Query to get the count of products
$sqlProducts = "SELECT COUNT(*) AS productCount FROM products";
$resultProducts = $conn->query($sqlProducts);
$rowProducts = $resultProducts->fetch_assoc();
$productCount = $rowProducts['productCount'];

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Title image  -->
    <link
      rel="shortcut icon"
      href="./Images/main_logo.png"
      type="image/x-icon"
    />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        /* background-color: #f1f1f1; */
      }


      .admin-panel {
        display: flex;
        min-height: 100vh;
      }

      .sidebar {
        width: 250px;

        background-color: #0c2d57;
        color: #fff;
        padding-top: 20px;
      }

      .content {
        flex: 1;
        padding: 20px;
      }

      .header {
        background-color: #0c2d57;
        padding: 10px;
        color: #fff;
        text-align: center;
      }

      .nav-link {
        display: block;
        padding: 10px;
        color: #fff;
        text-decoration: none;
        border-bottom: 1px solid #666;
      }

      .nav-link:hover {
        background-color: white;
        color: black;
      }

      .main-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h2 {
        color: #333;
      }
      .logo {
        width: 80%;
        height: 100px;
        cursor: pointer;
      }

      /* product cards */
      .card-container{
    display: flex;
    gap: 50px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
.card{
    width: 400px;
    height: 200px;
    border-radius: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-grow:1;
    flex-shrink:1;
}
.card:hover{
    cursor: pointer;
}
.card1{
    background-color: green;
    color: white;
    font-size: 25px;
    flex-grow:1;
    flex-shrink:1;
}
.card2{
    background-color: aqua;
    color: Black;
    font-size: 25px;
    flex-grow:1;
    flex-shrink:1;
}
.card3{
    background-color: burlywood;
    color: black;
    font-size: 25px;
    flex-grow:1;
    flex-shrink:1;
}
.card4{
    background-color: blueviolet;
    color: white;
    font-size: 25px;
    flex-grow:1;
    flex-shrink:1;
}

@media only screen and (max-width: 768px){
         .admin-container {
        flex-direction: column;
    }

    .sidebar {
        width: min-content;
        margin-bottom: 20px;
    }
        .card{
          width:min-content;
          width: 200px;
    height: 100px;
    border-radius: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* box-shadow: 10px 10px 1px black; */
    text-align: center;
        }
        .card1{
    background-color: green;
    color: white;
    font-size: 16px;

}
.card2{
    background-color: aqua;
    color: Black;
    font-size: 16px;

}
.card3{
    background-color: burlywood;
    color: black;
    font-size: 16px;
}
.card4{
    background-color: blueviolet;
    color: white;
    font-size: 16px;

}

      }


    </style>
  </head>
  <body>
    <div class="admin-panel">
      <div class="sidebar">
        <div class="header">
          <a href="./adminDashboard.html">
            <img src="../Images/radhe_logo.png" class="logo" alt=""
          /></a>
        </div>
        <a href="./admin_Dashboard.php" class="nav-link">Dashboard</a>
        <a href="./addProduct.php" class="nav-link">Add Products</a>
        <a href="./orders.php" class="nav-link">See Orders</a>
        <a href="./customers.php" class="nav-link">See Customers</a>
        <a href="./products.php" class="nav-link">See Products </a>
        <a href="./logout.php" class="nav-link">Logout</a>
      </div>

      <div class="content">
        <div class="header">
          Welcome  to Radhe Motors Admin Panel
        </div>
     
        <div class="main-content">
          <h2>Dashboard</h2>
          <p></p>
          <div class="card-container">
    <div class="card card1">Number of Customers: <?php echo $customerCount; ?></div>
    <div class="card card2">Number of Orders:  <?php echo $orderCount; ?> </div>
    <div class="card card3">Number of Second Hand Cars: 10 </div>
    <div class="card card4">Number of Products: <?php echo $productCount; ?></div>
</div>
           </div>
       
     
      </div>
    </div>
  </body>
</html>
