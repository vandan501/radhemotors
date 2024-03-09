<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
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

    #placeOrderBtn {
      margin-top: 20px;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    #placeOrderBtn:hover {
      background-color: #0056b3;
      
    }
    .quantity{
      width:100%;
      font-size:18px;
    }
  </style>
</head>
<body>

<h2>Checkout Details</h2>

<!-- Form starts here -->
<form method="GET" action="insertorder.php">

<table>
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Time of Purchase</th>
    <th>User</th>
  </tr>

  <?php
    // Retrieve product details from URL parameters
    $product_id = isset($_POST['p_id']) ? $_POST['p_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    // Additional details
    $time_of_purchase = date("Y-m-d H:i:s");  // Current date and time
    $user = isset($_SESSION["c_fname"]) ? $_SESSION["c_fname"] : 'Guest';  // Assuming you have a user session

    // Display product details in the table row
    echo "<tr>";
    echo "<td>$product_id</td>";
    echo "<td>$name</td>";
    echo "<td><img src='$image' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>";
    echo "<td>$price</td>";
    echo "<td>
    <select name='quantity' id='quantity' class='quantity'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <!-- Add more options as needed -->
    </select>
  </td>";
    echo "<td>$time_of_purchase</td>";
    echo "<td>$user</td>";
    echo "</tr>";
  ?>
</table>

<!-- Hidden input fields to store product details -->
<input type='hidden' name='p_id' value='<?php echo $product_id; ?>'>
<input type='hidden' name='p_partname' value='<?php echo $name; ?>'>
<input type='hidden' name='p_image' value='<?php echo $image; ?>'>
<input type='hidden' name='p_price' value='<?php echo $price; ?>'>
<input type='hidden' name='time_of_purchase' value='<?php echo $time_of_purchase; ?>'>
<input type='hidden' name='user' value='<?php echo $user; ?>'>

<!-- Place Order button -->

<center>
<!-- <button  type='button' '>Place Order</button> -->
<input id='placeOrderBtn' type='submit' value='Place Order' name='submit'>
</center>
</form>
<!-- Form ends here -->

<!-- JavaScript for handling the Place Order button -->
<script>
  function placeOrder() {
    // You can add additional JavaScript logic here
    // For example, you can submit the hidden input fields to insertorder.php using AJAX
    alert('Order placed successfully!');
    // Add AJAX code or redirect to insertorder.php as needed
  }
</script>

</body>
</html>
