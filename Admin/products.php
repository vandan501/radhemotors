
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Total Products</title>
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
    max-width: 800px;
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
        <h2>Product Details</h2>
        <?php
// Database connection parameters
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "radhemotors";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Image</th>
            <th>Company Name</th>
            <th>Car Model Name</th>
            <th>Part Name</th>
            <th>Product Price</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        $imageSrc = $row['p_image'];
        // Check if the image file exists
        if (!file_exists($imageSrc)) {
            // If the image file doesn't exist, use fallback image
            $imageSrc = '../Images/404.png'; // Change 'fallback_image.jpg' to the path of your fallback image
        }

        echo "<tr>
                <td>{$row['p_id']}</td>
                <td><img src='$imageSrc' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>
                <td>{$row['p_company']}</td>
                <td>{$row['p_Car_Name']}</td>
                <td>{$row['p_partname']}</td>
                <td>{$row['p_price']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}

// Close connection
$conn->close();
?>
