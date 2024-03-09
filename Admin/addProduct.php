
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Add Product</title>
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
         
            <!-- add product section -->
    <section class="addproduct">
      <h1 class="head">Add Product</h1>
      <form action="../Customers/insertproduct.php" method="POST">
        <table>
          <tr>
            <td>
              <label for=""> Select Product image :</label>
            </td>
            <td>
              <input
                type="file"
                name="p_image"
                  id="p_image"
                accept=".jpeg,.jpg,.png"
                required
              />
            </td>
          </tr>

          <tr>
            <td><label for="">Company Name :</label></td>
            <td>
              <select name="p_company" id="p_company" required>
                <option value="TATA" disabled selected>
                  Select Company Name
                </option>
                <option value="TATA">TATA</option>
                <option value="MAHINDRA">MAHINDRA</option>
              </select>
            </td>
          </tr>

          <tr>
            <td><label for="">Car model Name :</label></td>
            <td>
              <input
                type="text"
                name="p_Car_Name"
                id="p_Car_Name"
                placeholder="enter car name"
              />
            </td>
          </tr>

          <tr>
            <td><label for="">Part Name :</label></td>
            <td>
              <input
                type="text"
                name="p_partname"
                id="p_partname"
                placeholder="Enter Part Name"
              />
            </td>
          </tr>

          <tr>
            <td><label for="">Product Price :</label></td>
            <td>
              <input
                type="number"
                name="p_price"
                id="p_price"
                class="Product Price"
                placeholder="Product Price"
              />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input
                type="submit"
                name="submit"
                id="submit"
                value="Add Product"
              />
            </td>
          </tr>
        </table>
      </form>
    </section>

    <!-- end of add product section -->


           </div>
       
     
      </div>
    </div>
  </body>
</html>
