<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
        <title>Editing Page</title>
        <link rel="icon" href="images/Logo/logo.png" />

    </head>
<body>
    <section id="header">
        <a href="#"><img src="images/Logo/Logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li>Editing Page</a></li>
            </ul>
        </div>
    </section>

    
    
    
        <h2 class = "Dashboard">
            Dashboard
        </h2>

      
<?php // connecting to database
    require_once('./php/db.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT Product.*, Product_categories.P_categories
                  FROM Product
                  JOIN Product_categories
                  ON Product.P_id = Product_categories.P_id
                  WHERE Product.P_id = '$id'";

        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $P_id = $row['P_id'];
            $P_name = $row['P_name'];
            $P_price = $row['P_price'];
            $P_img = $row['P_img'];
            $P_brand = $row['P_brand'];
            $P_desc = $row['P_desc'];
            $P_category = $row['P_categories'];
            $P_stock = $row['P_stock'];
        }
    }
    

?>
            
    <div class="box">
    <form method="post" enctype="multipart/form-data"> <!-- Editing table -->
  <table class="form-table">
    <tr>
      <th>Product Name:</th>
      <td>
        <input type="hidden" name="id" value="<?php echo $P_id; ?>">
        <input type="text" id="name" name="name" value="<?php echo $P_name; ?>" required>
      </td>
    </tr>
    <tr>
      <th>Product Price:</th>
      <td>
        <input type="number" id="price" name="price" value="<?php echo $P_price; ?>" required>
      </td>
    </tr>
    <tr>
      <th>Product Image:</th>
      <td>
        <img src="images/<?php echo $P_img; ?>" width="100">
        <input type="file" id="img" name="img" value="<?php echo $P_img; ?>" accept="image/*" required>
      </td>
    </tr>
    <tr>
      <th>Product Brand:</th>
      <td>
        <input type="text" id="brand" name="brand" value="<?php echo $P_brand; ?>" required>
      </td>
    </tr>
    <tr>
      <th>Product Description:</th>
      <td>
        <textarea id="desc" name="desc" required><?php echo $P_desc; ?></textarea>
      </td>
    </tr>
    <tr>
      <th>Product Category:</th>
      <td>
        <select id="category" name="category" required>
          <option value="">--Select Category--</option>
          <option value="Laptop" <?php echo ($P_category == "Laptop") ? 'selected' : ''; ?>>Laptop</option>
          <option value="Monitor" <?php echo ($P_category == "Monitor") ? 'selected' : ''; ?>>Monitor</option>
          <option value="Phone" <?php echo ($P_category == "Phone") ? 'selected' : ''; ?>>Phone</option>
          <option value="Tablet" <?php echo ($P_category == "Tablet") ? 'Tablets' : ''; ?>>Tablet</option>
          <option value="Watch" <?php echo ($P_category == "Watch") ? 'Watch' : ''; ?>>Watch</option>
        </select>
        </td>
    </tr>
    <tr>
      <th>Product Stock:</th>
      <td>
        <input type="number" id="stock" name="stock" value="<?php echo $P_stock; ?>" required>
      </td>
    </tr>
    <tr>
        <td colspan="2" class="submit-row">
        <input type="submit" name="edit" value="Submit" class="sbtn">
        </td>
    </tr>
  </table>
  <br><br>
  
</form>
        </div>
        
        <?php
            if(isset($_POST['edit'])) { // getting data submitted by the form and redirecting to Edit_Item.php 
                // Get form data
                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_FILES['img']['name'];
                $brand = $_POST['brand'];
                $desc = $_POST['desc'];
                $category = $_POST['category'];
                $stock = $_POST['stock'];
                
                // Update data in Product table
                $query = "UPDATE Product SET P_name = '$name', P_price = '$price', P_img = '$img', P_brand = '$brand', P_desc = '$desc', P_stock = '$stock' WHERE P_id = '$id'";
                $result = $conn->query($query);
                
                // Update data in Product_categories table
                $query = "UPDATE Product_categories SET P_categories = '$category' WHERE P_id = '$id'";
                $result = $conn->query($query);
                
                //Upload image to server
                move_uploaded_file($_FILES['img']['tmp_name'], 'images/'.$img);
                
                // Redirect to the Edit_Item page
                header("Location:Edit_Item.php?id=".$id . $_SERVER['REQUEST_URI']);
                die();
            }
            
        ?>

            <!-- Footer -->
            <a class="arrow-up" href="#"><i class="fas fa-arrow-up"></i></a>
            <footer class="section-p1">
                <div class="col">
                    <h4>Contact</h4>
                    <p><strong>ipsum:</strong> sit, amet consectetur adipisicing elit. Aliquam sit soluta quae,</p>
                    <p><strong>ipsgkj:</strong>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut?</p>
                    <p><strong>ipsumvch:</strong> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem necessitatibus saepe qui sunt, distinctio nulla!</p>
                    <div class="follow">
                        <h4>Follow us</h4>
                        <div class="icons">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
        
                <div class="col">
                    <h4>About</h4>
                    <a href="#">About us</a>
                    <a href="#">Privacy & Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="col">
                <h4>My Account</h4>
                    <a href="#">Sign In</a>
                    <a href="#">View Shopping Cart</a>
                    <a href="#">Help</a>
                </div>
                
            </footer>
            <!-- End of Footer -->        
</body>
</html>
