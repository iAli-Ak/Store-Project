<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('./php/db.php');
require_once('./php/component.php');
session_start();

if(!isset($_SESSION['A_email'])){
    header('location: login.php?error=Only Authroized people are allowed.');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
        <title>Admin Page</title>
        <link rel="icon" href="images/Logo/logo.png" />
    </head>
<body>
    <section id="header">
        <a href="#"><img src="images/Logo/Logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
            <li><?php echo 'Welcome ' . $_SESSION['A_name'] . '';?></li>
                <li><a href="remove_item.php">Remove Item</a></li>
                <li><a href="edit_item.php">Edit Item</a></li>
                <li><a class = "active">ADMIN</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </div>
    </section>

    
    
    
        <h2 class = "Dashboard">
            Dashboard
        </h2>
        
        <div class ="values">
            <div class = "values-box">
                <i class="fa-solid fa-user-group"></i>
                <div>
                    <h3>7,562</h3>
                    <span>New Users</span>
                </div>
            </div>



            <div class = "values-box">
                <i class="fa-solid fa-bag-shopping"></i>
                <div>
                    <h3>21,386</h3>
                    <span>Total Orders</span>
                </div>
            </div>



            <div class = "values-box">
                <i class="fa-solid fa-mobile-screen-button"></i>
                <div>
                    <h3>62,451</h3>
                    <span>Products Sold</span>
                </div>
            </div>


            
            <div class = "values-box">
                <i class="fa-solid fa-money-bill"></i>
                <div>
                    <h3>$9,084</h3>
                    <span>made this month</span>
                </div>
            </div>
        </div>


            <div class="board">

                <table width = "100%">
                    <thead>
                        <tr>

                            <td>Name</td>
                            <td>Title</td>
                            <td>Status</td>
                            <td>Role</td>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Hussain Alkhalifah</h5>
                                    <p>Hussain@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>

                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Ibrahim Alali</h5>
                                    <p>Ibrahim@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>

                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Abdulaziz Al-momen</h5>
                                    <p>Abdulaziz@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>

                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Ali Al Khatamh</h5>
                                    <p>Ali@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>

                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Omar Zimmo</h5>
                                    <p>Omar@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>

                        <tr>
                            <td class="people">
                            <i class="fa-solid fa-user"></i>
                                <div class="people-description">

                                    <h5>Ahmed Alsaif</h5>
                                    <p>Ahmed@outlook.com</p>
                                </div>
                            </td>

                            <td class="people-des">

                                <h5>Software Engineer</h5>
                                <p>Web dev</p>
                            </td>

                            <td class="active">

                                <p>Active</p>

                            </td>

                            <td class="role">

                                <p>Owner</p>

                            </td>

                            <td class="edit"><a href="#">Edit</a></td>

                        </tr>
                    </tbody>

                </table>

            </div>

            <div class="box">
            <h3 class="list">list of products</h3>
        
            <table class="styled-table"> <!-- List of products table -->
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Category</th>
                    </tr>
                </thead>
            <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require_once('./php/db.php');
        require_once('./php/component.php');

        
        
        $result = $conn->query("SELECT Product.*, Product_categories.P_categories 
                                    FROM Product 
                                    JOIN Product_categories 
                                    ON Product.P_id = Product_categories.P_id"); // displaying the table table

                                        

                                while($row = $result->fetch_assoc()) {
                                    
                                    echo "<tbody class ='bodoftable'>";
                                    echo "<tr>";
                                    echo "<td>" . $row["P_name"] . "</td>";
                                    echo "<td>" . $row["P_categories"] . "</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                    
                                }
                                
                                
        ?>
            </table>
            </div>

            <a class="arrow-up" href="#"><i class="fas fa-arrow-up"></i></a>
            <?php require_once('footer.php')?>    
</body>
</html>
