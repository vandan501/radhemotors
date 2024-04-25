
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customers</title>
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

      .container {
    width: 100%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    text-align: center;
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
    background-color: #0c2d57;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
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
        <a href="./louout.php" class="nav-link">Logout</a>

      </div>

      <div class="content">
        <div class="header">
          Welcome  to Radhe Motors Admin Panel
        </div>
     
        <div class="container">
        <h2>Customer Details</h2>
        <?php
            // Database connection parameters
            $servername = "localhost";
            $db_username = "vpatel3";
            $db_password = "2njxx2njxxb35l7b35l7";
            $db_name = "vpatel3shoppingcart";

            // Create connection
            $conn = new mysqli($servername, $db_username, $db_password, $db_name);

            // Check connection
            if ($conn->connect_error) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }

            // Fetch all customers
            $sql = "SELECT * FROM customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Date of Birth</th>
                        <th>Favorite Car Color</th>
                        <th>City</th>
                        <th>Address</th>
                    </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['c_id']}</td>
                            <td>{$row['c_fname']}</td>
                            <td>{$row['c_lname']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['c_email']}</td>
                            <td>{$row['c_contact']}</td>
                            <td>{$row['c_dob']}</td>
                            <td>{$row['c_favCarColor']}</td>
                            <td>{$row['c_city']}</td>
                            <td>{$row['c_address']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "No customers found.";
            }

            // Close connection
            $conn->close();
        ?>
    </div>
      </div>
    </div>
  </body>
</html>
