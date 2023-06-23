<?php

require_once('./php/db.php');
require_once('./php/component.php');
session_start();
//if(isset($_GET['action'])){
//    echo "hi";
//    echo $_SESSION['cart'][$_GET['id']];
//    var_dump($_SESSION['cart']);
//    unset($_SESSION['cart'][$_GET['id']]);
//    for($i=0; $i<count($_SESSION['cart']); $i++){
 //       echo $_SESSION['cart'][$i]['product_id'];
 //   }
//}
//?action=remove&id=2
if(isset($_GET['action'])){
    if($_GET['action'] == 'remove'){
        
        foreach($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                
             }
        }
    }
  //  print_r($_SESSION['cart']);
}




if(isset($_POST['add'])){
    if(empty($_POST['Quantity'])){
        $_POST['Quantity'] = 1;
        //echo $_POST['Quantity'];
        header("location: ../Cart.php");
    } else{
       // echo $_POST['Quantity'];
        header("location: ../Cart.php");
    }
}
//print_r($_SESSION['cart']);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
    <title>Cart</title>
    <link rel="icon" href="images/Logo/logo.png" />
</head>
<body>
<?php

  require_once('header.php');
  ?>

  <style>
    <?php include ("style.css") ?>
  </style>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
    <div class="small-container cart-page">
    <form action="php/checkout.php" method="post"> 
  <table>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>
    <?php
    if (isset($_SESSION['cart'])) {
      $product_id = array_column($_SESSION['cart'], null);

      $sql = "SELECT * FROM Product";
      $item = $conn->query($sql);
      $total = 0;
      $q =1;

      while ($row = mysqli_fetch_assoc($item)) {
        foreach ($product_id as $id) {
          if ($row['P_id'] == $id['product_id']) {
            cart($row['P_id'], $row['P_name'], $row['P_price'], $row['P_img'], $id['quantity'], $row['P_stock']);
            $total = $total + ($row['P_price']*$id['quantity']);
          }
        }
      }
    }
    ?>
  </td>
  </tr>
  </table>
  <div class="total-price">
    <table>
      <tr>
        <td>Delivery</td>
        <td class="delivery">FREE</td>
      </tr>
      <tr>
        <td>Total</td>
        <td>SAR <?php echo $total; ?></td>
      </tr>
    </table>
    <button type="submit" name="check-out">Check Out</button>
</form>

<script>
  function saveCartToCookie() {
    //get the contents of the cart
    var cart = [];
    var tableRows = document.querySelectorAll("table tr");
    for (var i = 1; i < tableRows.length - 2; i++) {
      var product = tableRows[i].children[0].textContent;
      var quantity = tableRows[i].children[1].textContent;
      var subtotal = tableRows[i].children[2].textContent;
      var item = {product: product, quantity: quantity, subtotal: subtotal};
      cart.push(item);
    }

    //get the user's id
    var userId = "<?php echo $_SESSION['email']; ?>";

    //save the cart to a cookie with the user's id as the key
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = userId + "=" + JSON.stringify(cart) + ";" + expires + ";path=/";
  }

  //call the function when the form is submitted
  document.querySelector("form").addEventListener("submit", function(event) {
    saveCartToCookie();
  });
</script>
    </div>
</div>




<?php
    require_once('footer.php');
    ?>
</body>
</html>