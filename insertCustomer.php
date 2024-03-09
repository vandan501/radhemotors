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
$db_username = "root";
$db_password = "";
$db_name = "radhemotors";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection-A
if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Prepared statement to prevent SQL injection
$sql = $conn->prepare("INSERT INTO customers (c_fname, c_lname, gender, c_email, c_password, c_contact, c_dob, c_favCarColor, c_city, c_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$sql->bind_param("ssssisssss", $c_fname, $c_lname, $gender, $c_email, $c_password, $c_contact, $c_dob, $c_favCarColor, $c_city, $c_address);

// Execute the prepared statement--
if ($sql->execute()) {
    echo "<script>alert('Registration successful!')</script>";
    header("Location:http://localhost/radhemotors/Customers/listproducts.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

// Close connection
$conn->close();
?>
