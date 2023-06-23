<?php
require_once('./php/db.php');
require_once('./php/component.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


$sql_d = 'SELECT * FROM Product, Product_categories where Product.p_id= Product_categories.P_id and (P_name = "Apple iPad Pro 11 - 2021 Tablet 5G" or P_name = "iPhone 13 Pro" or P_name = "MacBook Pro" or P_name = "Apple Watch SE 2 44 Smartwatch" );
';
$d_product = $conn->query($sql_d);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script
    src="https://kit.fontawesome.com/df0cdd1d13.js"
    crossorigin="anonymous"
  ></script>
    <title>Product details</title>
    <link rel="icon" href="images/Logo/logo.png" />
</head>
<body>

<?php
  require_once('header.php');
  ?>

      <section id="prodetails" class="section-p1">
        <?php
        
        proDetails($conn, $_GET['p_id']);

?>
      </section>

      <hr>

      <section id="fpro">
        <h2>Featured Products</h2>
        <div class="pro-container">
        <?php
        while ($row = mysqli_fetch_assoc($d_product)) {
          component($row['P_id'], $row['P_name'], $row['P_price'], $row['P_img'], $row['P_brand']);
        }
        ?>
        
  
    
          
          
        </div>
      </section>


      <?php
    require_once('footer.php');
    ?>
</body>
</html>