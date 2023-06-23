<?php 
require_once('./php/db.php');
require_once('./php/component.php');
session_start(); 
 $sql = 'SELECT * FROM Product, Product_categories where Product.P_id= Product_categories.P_id and P_categories = "'.$_GET['category'].'";';
 $product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
    <title>Categorize</title>
    <link rel="icon" href="images/Logo/logo.png" />
</head>
<body>
    <?php require_once('header.php'); ?>
    


    <section id="product1" class="section-p1">
      <h2><?php echo $_GET['category']?> Products</h2>
      <hr>
      <div class="pro-container">
      
        <?php
        while ($row = mysqli_fetch_assoc($product)) {
          component($row['P_id'],$row['P_name'], $row['P_price'], $row['P_img'], $row['P_brand']);   
        }
        
        ?>
       
      </div>
    </section>


    <?php require_once('footer.php');?>
</body>
</html>