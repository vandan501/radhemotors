<?php
    session_start();
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','vpatel3','2njxx2njxxb35l7b35l7','vpatel3shoppingcart') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM customers WHERE c_email='" . $_POST["c_email"] . "' and c_password = '". $_POST["c_password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["c_id"] = $row['c_id'];
        $_SESSION["c_fname"] = $row['c_fname'];
        } else {
          
          echo '<script>alert("Invalid email or Password!")</script>';    

                           
     

    }
    }
    if(isset($_SESSION["c_id"])) {
    header("Location:http://localhost/radhemotors/Customers/listproducts.php");
    }
?>
  
    <?php
    
    ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Login | Radhe Motors</title>
    <!-- Link of fontawasome website for icons -->
    <script
      src="https://kit.fontawesome.com/267448ee0a.js"
      crossorigin="anonymous"
    ></script>

    <!-- internal css -->
    <style>
      body {
        background-color: rgb(1, 46, 88);
        box-sizing: border-box;
        margin: 0;
        /* padding: 20%; */
      }
      h1 {
        color: yellow;
        font-size: 34px;
      }
      fieldset {
        width: 70%;
        text-align: center;
        padding: 40px;
        height: min-content;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 30px;
      }
      .cform-section {
        display: flex;
        flex-direction: column;
        margin: auto 0;
        width: auto;
        height: min-content;
        padding: 20px;
        justify-content: center;
        align-items: center;
      }
      form {
        display: flex;
        gap: 20px;
        align-items: center;
        flex-direction: column;
        padding: 5px;
      }
      a {
        color: yellow;
      }

      input {
        width: 100%;
        font-size: 20px;
        display: inline-block;
        flex-shrink: inherit;
        padding: 5px;
        height: 25px;
        border: none;
        border-radius: 5px;
      }
      input:hover {
        background-color: whitesmoke;
        font-weight: 600;
      }
      h2 {
        color: white;
        font-weight: 300;
      }
      #submit {
        background-color: green;
        color: white;
        padding: 5px;
        height: 40px;
        border-radius: 10%;
        width: 160px;
      }
      #submit:hover {
        background-color: white;
        color: black;
      }
    </style>
  </head>
  <body>
    <section class="cform-section">
      <fieldset>
        <legend><h1>Customer Login Page</h1></legend>

        <form action="" autocomplete="off" method="POST">
          <input
            type="email"
            name="c_email"
            id="c_email"
            placeholder="Email id"
            required
          />
          <input
            type="password"
            name="c_password"
            id="c_password"
            required
            placeholder="Password"
            title="Password Should be strong"
          />
          <input type="submit" name="submit" id="submit" />
        </form>
      </fieldset>
      <h2>
        Don't Have An Account?
        <a href="./Customer_register.html"> register here </a>
      </h2>
      <h3><a href="./index.html"> Go to website</a></h3>
    </section>
  </body>
</html>
