<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
        <title>Edit item</title>
        <link rel="icon" href="images/Logo/logo.png" />

    </head>
<body>
    <section id="header">
        <a href="#"><img src="images/Logo/Logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="remove_item.php">Remove Item</a></li>
                <li><a class = "active" href="edit_item.php">Edit Item</a></li>
                <li><a href="Admin.php">ADMIN</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </section>

    
    
    
        <h2 class = "Dashboard">
            Dashboard
        </h2>

        <div class="box">
                <!-- Add item table/form -->
  <form method="post" enctype="multipart/form-data" action="Edit_Item.php">
  <table class= "form-table">
    <caption>Add item</caption>
    <tr>
      <td>
        <label for="name">Product Name:</label>
      </td>
      <td>
        <input type="text" id="name" name="name" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="price">Product Price:</label>
      </td>
      <td>
        <input type="number" id="price" name="price" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="img">Product Image:</label>
      </td>
      <td>
        <input type="file" id="img" name="img" accept="images/*" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="brand">Product Brand:</label>
      </td>
      <td>
        <input type="text" id="brand" name="brand" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="desc">Product Description:</label>
      </td>
      <td>
        <textarea id="desc" name="desc" required></textarea>
      </td>
    </tr>
    <tr>
      <td>
        <label for="category">Product Category:</label>
      </td>
      <td>
        <select id="category" name="category" required>
          <option value="">--Select Category--</option>
          <option value="Laptop">Laptops</option>
          <option value="Monitor" >Monitors</option>
          <option value="Phone">Phones</option>
          <option value="Tablet">Tablets</option>
          <option value="Watche">Watches</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
    <label for="price">Product Stock:</label>
      </td>
      <td>
        <input type="number" id="stock" name="stock" required>
      </td>
    </tr>
    <tr>
        <td colspan="2" class="submit-row">
            <input type="submit" name="add" value="Add Product" class="sbtn">
        </td>
    </tr>
  </table>
  <br><br>
  
</form>
<!-- end of Add item table/form -->

<!-- Database connection to insert the data from the form-->
        <?php
require_once('./php/db.php');

// Handle form submission
if(isset($_POST['add'])) {
    // Get form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_FILES['img']['name'];
    $brand = $_POST['brand'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];


    
    // Insert data into Product table
    $query = "INSERT INTO Product (P_name, P_price, P_img, P_brand, P_desc, P_Stock) VALUES ('$name', '$price', '$img', '$brand', '$desc', '$stock')";
    $result = $conn->query($query);
          
    // Get last inserted P_id
    $P_id = $conn->insert_id;

    // Insert data into Product_categories table
    $query = "INSERT INTO Product_categories (P_id, P_categories) VALUES ('$P_id', '$category')";
    $result = $conn->query($query);
    
    //Upload image to server
    move_uploaded_file($_FILES['img']['tmp_name'], './images/'.$img); 

    // Redirect to the current page
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

?>    <!-- end of Database connection -->

<table class= "styled-table"> <!-- Editing table -->
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Product Brand</th>
            <th>Product Description</th>
            <th>Product Category</th>
            <th>Product Stock</th>
            <th>Edit</th>
        </tr>
    </thead>
    
        <?php
        $query = "SELECT Product.*, Product_categories.P_categories FROM Product JOIN Product_categories ON Product.P_id = Product_categories.P_id";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) { // displaying data from database
            $P_id = $row['P_id'];
            $P_name = $row['P_name'];
            $P_price = $row['P_price'];
            $P_img = $row['P_img'];
            $P_brand = $row['P_brand'];
            $P_desc = $row['P_desc'];
            $P_category = $row['P_categories'];
            $P_stock = $row['P_stock'];
            echo "
            <tbody class ='bodoftable'>
            <tr>
                <td>$P_id</td>
                <td>$P_name</td>
                <td>$P_price</td>
                <td><img src='images/$P_img' alt='$P_name' style='height: 70px; width: 70px;'></td>
                <td>$P_brand</td>
                <td>$P_desc</td>
                <td>$P_category</td>
                <td>$P_stock</td>
                <td><a href='Editing_Page.php?id=$P_id'>Edit</a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT Product.*, Product_categories.P_categories FROM Product JOIN Product_categories ON Product.P_id = Product_categories.P_id WHERE Product.P_id = '$id'";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $P_id = $row['P_id'];
            $P_name = $row['P_name'];
            $P_price = $row['P_price'];
            $P_img = $row['P_img'];
            $P_brand = $row['P_brand'];
            $P_desc = $row['P_desc'];
            $P_category = $row['P_categories'];
            }
            }
            ?>
            


        </div> 
            <!-- footer -->
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
</body>
</html>
