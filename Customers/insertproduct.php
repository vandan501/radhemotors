<?php
session_start();

// Retrieve form data
$productImage = $_POST['p_image'];
$companyName = $_POST['p_company'];
$carName = $_POST['p_Car_Name'];
$partName = $_POST['p_partname'];
$productPrice = $_POST['p_price'];

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

// Perform database insert (update table and column names accordingly)
$sql = "INSERT INTO products (p_image, p_company, p_Car_Name, p_partname, p_price) 
        VALUES ('$productImage', '$companyName', '$carName', '$partName', '$productPrice')";

// Execute the query
if ($conn->query($sql)) {
    echo "<script>alert('Product Uploaded successfully')</script>";
    header("Location:http://localhost/radhemotors/Admin/products.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

// Close connection
$conn->close();
?>
