<?php
//


if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        //    if (empty($_SESSION['cart'])) {
        //       $arr = array(0=>$_POST['product_id']);
        //       $_SESSION['cart'] = $arr;
        //   }
   // echo $_POST['Quantity'];
        $count = count($_SESSION['cart']);
        $item_arr = array('product_id' => $_POST['product_id'],'quantity'=>$_POST['Quantity']);
        $_SESSION['cart'][$_POST['product_id']] = $item_arr;
    //       print_r($_SESSION['cart']);
        //  }
    }else{
        $item_arr = array('product_id' => $_POST['product_id'],'quantity'=>$_POST['Quantity']);
               $_SESSION['cart'][$_POST['product_id']] = $item_arr;
    //           print_r($_SESSION['cart']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script
    src="https://kit.fontawesome.com/df0cdd1d13.js"
    crossorigin="anonymous"
  ></script>
    <title>Product details</title>
</head>
<body>

    <section id="header">
        <a href="#"><img src="images/Logo/Logo.png" class="logo" alt="logo" /></a>
  
        <div>
          <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Categorize<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown">
                 <li><a href="category.php?category=Phone"><i class="fa fa-mobile-phone"></i> Phones</a></li>
                 <li><a href="category.php?category=Laptop"><i class="fa fa-laptop"></i> Laptops</a></li>
                 <li><a href="category.php?category=Tablet"><i class="fa fa-tablet"></i> Tablets</a></li>
                 <li><a href="category.php?category=Monitor"><i class="fa fa-desktop"></i> Monitor</a></li>
            </ul>
          </li>
            <?php
            if(isset($_SESSION['id'])){
                echo '<li><a href="">Account <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
            <li><a href="Profile.php">User Profile</a></li>
            <li><a href="orders.php">View Previous Orders</a></li>
            <li><a href="php/logout.php">Logout</a></li>
            </ul>  
                </li>';
            }else{
                echo '<li><a href="login.php">Sign in/Sign up</a></li>';
            }
            ?>
            <li><a href="contact.php">Contact Us</a></li>
            <li>
              <a href="Cart.php"><i class="fa-solid fa-cart-arrow-down"></i>
              <?php
          //echo $_POST['product_id'];
          if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo "<span id=\"cart_count\">$count</span>";
          } else{
            echo "<span id=\"cart_count\">0</span>";
          }

          ?>
              </a>
            </li>
          </ul>
        </div>
      </section>