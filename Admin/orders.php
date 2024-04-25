
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders </title>
    <!-- Title image  -->
    <link
      rel="shortcut icon"
      href="./Images/main_logo.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./adminPanel.css" />
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

      table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            margin: 20px;
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
     
        <div class="container">
    <h2>Orders Details</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Customer Contact Number</th>
                <th>Customer Email Address</th>
                <th>Customer Address</th>
                <th>Product ID</th>
                <th>Product Part Name</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
// Assuming you have a database connection established

$servername = "localhost";
$db_username = "vpatel3";
$db_password = "2njxx2njxxb35l7b35l7";
$db_name = "vpatel3shoppingcart";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the "orders" table with JOINs
$sql = "SELECT orders.o_id, customers.c_id, customers.c_fname, customers.c_contact, customers.c_email, customers.c_address, 
               products.p_id, products.p_partname, orders.quantity, orders.amount
        FROM orders
        INNER JOIN customers ON orders.cid = customers.c_id
        INNER JOIN products ON orders.pid = products.p_id";

$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $orderID = $row['o_id'];
        $customerID = $row['c_id'];
        $customerName = $row['c_fname'];
        $contactNumber = $row['c_contact'];
        $emailAddress = $row['c_email'];
        $customerAddress = $row['c_address'];
        $productID = $row['p_id'];
        $productPartName = $row['p_partname'];
        $quantity = $row['quantity'];
        $amount = $row['amount'];

        echo "<tr>
                <td>$orderID</td>
                <td>$customerID</td>
                <td>$customerName</td>
                <td>$contactNumber</td>
                <td>$emailAddress</td>
                <td>$customerAddress</td>
                <td>$productID</td>
                <td>$productPartName</td>
                <td>$quantity</td>
                <td>$amount</td>
              </tr>";
    }
} else {
    echo "0 results";
}
// Close the database connection
$conn->close();
?>

        </tbody>
    </table>
</div>
     
      </div>
    </div>
  </body>
</html>
