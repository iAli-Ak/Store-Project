<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
        <title>Remove item</title>
        <link rel="icon" href="images/Logo/logo.png" />

    </head>
<body>
    <section id="header">
        <a href="#"><img src="images/Logo/Logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class = "active" href="remove_item.php">Remove Item</a></li>
                <li><a href="edit_item.php">Edit Item</a></li>
                <li><a href="Admin.php">ADMIN</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </section>

    
    
    
        <h2 class = "Dashboard">
            Dashboard
        </h2>

        <div class="box">
            
            <table class="styled-table"> <!-- Remove Item table -->
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                    </tr>
                </thead>
      
            <?php // connection to database
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                require_once('./php/db.php');
                require_once('./php/component.php');

                if(isset($_POST['product'])){
                    $products = $_POST['product'];
                    //validating if an itme was checked or not  
                    if(empty($products)){
                        echo "Please select at least one product.";
                        } else {
                            //loop through selected products and delete them
                            foreach($products as $product){
                                //validation
                                if(!is_numeric($product)){
                                    echo "Invalid product ID.";
                                    break;
                                } else {
                                    $result = $conn->query("DELETE FROM Product WHERE P_id = '$product'");
                                    if($result){
                                        echo "Selected products have been deleted.";
                                    } else {
                                        echo "Error deleting product.";
                                    }
                                }
                            }
                        }
                        // Refresh the page
                        header("Location: " . $_SERVER['REQUEST_URI']);
                        exit;
                }

                $result = $conn->query("SELECT Product.*, Product_categories.P_categories 
                    FROM Product 
                    JOIN Product_categories 
                    ON Product.P_id = Product_categories.P_id");

                    echo "<form method='post'>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tbody class ='bodoftable'>";
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='product[]' value='" . $row["P_id"] . "'></td>";
                        echo "<td>" . $row["P_name"] . "</td>";
                        echo "<td>" . $row["P_categories"] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                    echo "</table>";
                    echo "<input type='submit' value='submit' class='sbtn'>";
                    echo "</form>";
            ?>
        

        
        </div>

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
