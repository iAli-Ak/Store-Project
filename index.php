<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('./php/db.php');
require_once('./php/component.php');
session_start();
//

// Things left to do:
// count the quantity of each product
// make an order container for the order page
// after checkout put the cart items in order and save it in db and display it in the order page

$sql_p = 'SELECT * FROM Product, Product_categories where Product.P_id= Product_categories.P_id and P_categories = "Phone";';
$phone_product = $conn->query($sql_p);

//
$sql_l = 'SELECT * FROM Product, Product_categories where Product.P_id= Product_categories.P_id and P_categories = "Laptop";';
$lap_product = $conn->query($sql_l);

//
$sql_all = 'SELECT * FROM Product';
$all_product = $conn->query($sql_all);

//
$sql_p = 'SELECT * FROM Product, Product_categories where Product.p_id= Product_categories.P_id and (P_name = "iPhone 12" or P_name = "iPhone 13 Pro" or P_name = "iPhone 13 Pro Max" or P_name = "iPhone 14 Plus" );';
$p_product = $conn->query($sql_p);

//
$sql_d = 'SELECT * FROM Product, Product_categories where Product.p_id= Product_categories.P_id and (P_name = "Apple iPad Pro 11 - 2021 Tablet 5G" or P_name = "iPhone 13 Pro" or P_name = "MacBook Pro" or P_name = "Apple Watch SE 2 44 Smartwatch" );
';
$d_product = $conn->query($sql_d);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
  <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
  <script defer src="popup.js"></script>
  <title>Home Page</title>
  <link rel="icon" href="images/Logo/logo.png" />
</head>

<body>
  <?php
  require_once('header.php');
  ?>

  <section id="start">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save up to 30% off! </p>
    <a href="#product1"><button>Check Our Featured Products</button></a>
  </section>

  <section id="feature" class="section-p1">
    <div class="fe-box hidden">
      <img src="images/Free_shipping.png" class="shipping" alt="" />
      <h6>Free Shipping</h6>
    </div>
    <div class="fe-box hidden">
      <img src="images/Free_shipping.png" class="shipping" alt="" />
      <h6>Free Shipping</h6>
    </div>
    <div class="fe-box hidden">
      <img src="images/Free_shipping.png" class="shipping" alt="" />
      <h6>Free Shipping</h6>
    </div>
    <div class="fe-box hidden">
      <img src="images/Free_shipping.png" class="shipping" alt="" />
      <h6>Free Shipping</h6>
    </div>
    <div class="fe-box hidden">
      <img src="images/Free_shipping.png" class="shipping" alt="" />
      <h6>Free Shipping</h6>
    </div>
  </section>
  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <hr>
    <div class="pro-container">

      <?php

      while ($row = mysqli_fetch_assoc($d_product)) {
        component($row['P_id'], $row['P_name'], $row['P_price'], $row['P_img'], $row['P_brand']);
      }

      ?>

    </div>
  </section>

  <section id="banner">
    <h4>Check Our Laptops</h4>
    <h2><span>Laptops & </span>Accessories</h2>
    <a href="#product2"><button>Explore More</button></a>
  </section>

  <section id="product2" class="section-p1">
    <h2>Featured Laptops</h2>
    <hr>
    <div class="pro-container">
      <?php
      while ($row = mysqli_fetch_assoc($lap_product)) {
        component($row['P_id'], $row['P_name'], $row['P_price'], $row['P_img'], $row['P_brand']);
      }
      ?>
    </div>
  </section>

  <section class="section-p1">

  </section>

  <section id="product1" class="section-p1">
    <h2>Mobile Products</h2>
    <hr>
    <div class="pro-container">
      <?php
      while ($row = mysqli_fetch_assoc($p_product)) {
        component($row['P_id'], $row['P_name'], $row['P_price'], $row['P_img'], $row['P_brand']);
      }
      ?>
    </div>
  </section>


  <!-- <a class="arrow-up" href="#"><i class="fas fa-arrow-up"></i></a>-->
  <a class="arrow-up" data-modal-target="#modal">Help</a>
  <!-- Popup Modal-->
  <!--<button data-modal-target="#modal">Open Modal</button>-->
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Help</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <ul>
        <li>You must have an account to make any purchase. If you don't have an account you can sign up from <a href="signup.php">here</a>.</li>
        <li>You can view your previous orders from <a href="orders.php">here</a>.</li>
        <li>If you faced any issues you can contact us from <a href="contact.php">here</a>.</li>
      </ul>
      <br>
      <label for=""> We hope that any of this informations was helpful.</label>
    </div>
  </div>
  <div id="overlay"></div>

  <?php
  require_once('footer.php');
  ?>

</body>

</html>