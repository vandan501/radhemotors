<?php
session_start();

// Retrieve form data
$c_fname = $_POST['c_fname'];
$c_lname = $_POST['c_lname'];
$gender = $_POST['gender'];
$c_email = $_POST['c_email'];
$c_password = $_POST['c_password'];
$c_contact = $_POST['c_contact'];
$c_dob = $_POST['c_dob'];
$c_favCarColor = $_POST['c_favCarColor'];
$c_city = $_POST['c_city'];
$c_address = $_POST['c_address'];

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

// Prepared statement to prevent SQL injection
$sql = $conn->prepare("INSERT INTO customers (c_fname, c_lname, gender, c_email, c_password, c_contact, c_dob, c_favCarColor, c_city, c_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$sql->bind_param("ssssssssss", $c_fname, $c_lname, $gender, $c_email, $c_password, $c_contact, $c_dob, $c_favCarColor, $c_city, $c_address);

// Execute the prepared statement
if ($sql->execute()) {
    $conn->close();
    echo "<script>alert('Registration successful!')</script>";
    echo "<script>window.location.href = 'http://localhost/radhemotors/Customers/listproducts.php';</script>";
    exit();
} else {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

?>
