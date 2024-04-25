<?php
session_start();

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

// Retrieve data from the GET request
$cid = isset($_SESSION['c_id']) ? $_SESSION['c_id'] : '';
$pid = isset($_GET['p_id']) ? $_GET['p_id'] : '';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';
$amount = isset($_GET['p_price']) ? $_GET['p_price'] * $quantity : ''; 

// Perform the insert query to the orders table
$insertOrderQuery = "INSERT INTO `orders` (cid, pid, quantity, amount) VALUES (?, ?, ?, ?)";

// Assuming you have a prepared statement
$stmt = $conn->prepare($insertOrderQuery);

// Bind parameters
$stmt->bind_param("iiid", $cid, $pid, $quantity, $amount);

// Execute the statement
if ($stmt->execute()) {
    // Insert successful

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Display popup and redirect using JavaScript
    echo '<script>';
    echo 'alert("Your order has been placed successfully!");';
    echo 'window.location.href = "thankyou.php";';
    echo '</script>';
    exit;
} else {
    // Insert failed

    // Respond with an error message
    $response = ['success' => false, 'error' => 'Failed to insert order. Please try again.'];

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
