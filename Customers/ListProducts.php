<?php

session_start(); // Start the session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f1f1f1;
}

header {
    background-color: #0c2d57;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.welcome-msg {
    font-size: 20px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
}

.container {
    width: 100%;
    margin: 20px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}
h2{
    display : block;
color:red;
width : 100%;
text-align:center;
}

.product-card {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

img {
    max-width: 100%;
    height: auto;
}

button {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #0c2d57;
    color: #fff;
    border: none;
    cursor: pointer;
}
button:hover {
    background-color: #fff;
    color: #0c2d57;
}
span{
    position:absolute;
    right:10px;    
}
a{
    text-decoration:none;
    color:yellow;
    cursor:pointer;
}
a:hover{
    color:white;

}

    </style>
</head>
<body>
    <header>
        <?php

if(isset($_SESSION["c_fname"])) {
    echo '<div class="welcome-msg"> Welcome <h3 style="color: yellow;"> ' . $_SESSION["c_fname"] . '! </h3><span> <a href="./logout.php">Logout</a> </span> </div>';

} else {
    // Redirect to the login page or handle the case when the user is not logged in
    header("Location: login.php");
    exit(); // Make sure to exit after redirecting
}
        ?>
    </header>

    <div class="container">
        <h2>Available Products</h2>
        <?php
            // Fetch all products
            $servername = "localhost";
            $db_username = "vpatel3";
            $db_password = "2njxx2njxxb35l7b35l7";
            $db_name = "vpatel3shoppingcart";

            $conn = new mysqli($servername, $db_username, $db_password, $db_name);

            if ($conn->connect_error) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }

            $sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>
                <form method='POST' action='checkoutpage.php'>
                    " . getImageHTML($row['p_image']) . "
                    <h3><b> Company Name </b> {$row['p_company']}</h3>
                    <h3> <b> Car Name: </b>{$row['p_Car_Name']}</h3>
                    <p><b>Part Name</b> {$row['p_partname']}</p>
                    <p> <b>Price:   </b>{$row['p_price']}</p>
                    
                    <!-- Hidden input fields to store product details -->
                    <input type='hidden' name='p_id' value='{$row['p_id']}'>
                    <input type='hidden' name='name' value='{$row['p_Car_Name']}'>
                    <input type='hidden' name='image' value='{$row['p_image']}'>
                    <input type='hidden' name='price' value='{$row['p_price']}'>
                    
                    <button type='submit' name='addToCart'>Add to Cart</button>
                    <button type='button' onclick='buyNow({$row['p_id']})'>Buy Now</button>
                </form>
            </div>";
    }
} else {
    echo "No products found.";
}

function getImageHTML($imagePath) {
    // Check if the image exists
    if (file_exists($imagePath)) {
        // If the image exists, display it
        return "<img src='$imagePath' alt='Product Image'>";
    } else {
        // If the image doesn't exist, render a default image
        return "<img src='../Images/404.png' alt='Default Image'>";
    }
}
?>

<script>
    function buyNow(productId) {
        // Display confirmation popup
        if (confirm("Are you sure you want to buy this product?")) {
            // Redirect to checkout page with the selected product ID
            window.location.href = `checkoutpage.php?p_id=${productId}`;
        }
    }
</script>
</body>
</html>