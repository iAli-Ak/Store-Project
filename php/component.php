<?php
require_once('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// remove all the extra folders and put all the images in one folder which is the main one (images)
// plus update the path of the products in the database
// u have to make sure that the edit/add images are in the images folder


function component($p_id,$productName, $productPrice, $productimg,$pBrand){
    $element = '
    
    <div class="pro">
    <form action="" method="post">
    <img src="images/'.$productimg.'" alt="" />
    <div class="des">
      <span>'.$pBrand.'</span>
     <a name="p_id" href=product_details.php?p_id="'.$p_id.'"> <h5>'.$productName.'</h5></a>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h2>SAR '.$productPrice.'</h2>
    </div>
    <button name="add" class="add">Add To Cart</button>
    <input type="hidden" name="product_id" value="'.$p_id.'">
    <input type="hidden" name="Quantity" value="1">
  
    </form>
  </div>';

    echo $element;
}


function proDetails($conn,$p_id){
  
  $sql = "SELECT * FROM Product, Product_categories where Product.p_id= Product_categories.P_id and Product.P_id=$p_id;";
  $all_product = $conn->query($sql);
  while ($row = mysqli_fetch_assoc($all_product)) {
    
    echo '
    <form action="" method="post">
     <div class="single-pro-image">
    <img src="images/' . $row['P_img'] . '" width="100%" alt="">
</div>
<div class="single-pro-details">
    <h3 class="brand">' . $row['P_brand'] . '</h3>
    <h4>' . $row['P_desc'] . '
    </h4>
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h2>Price: <span>SAR</span> <span class="price">' . $row['P_price'] . '</span></h2>
    <div>
    <h2 class="quantity">Quantity: </h2>
    <input type="number" min="1" value="1" name="Quantity" max="'.$row['P_stock'].'">
    <a href="Cart.php?product_id='.$row['P_id'].'" class=""><button name="add" >Add to Cart</button></a>
  
    </div>
    <input type="hidden" name="product_id" value='.$p_id.'>
    
</div>
</form>

  
';}
}


function cart($p_id,$productName, $productPrice, $productimg, $productQuantity, $productStock){

  

  echo '
  <tr>
  <td>
  <form action="Cart.php?action=remove&id='.$p_id.'" method="get">
  <div class="cart-info">
                      <img src="images/'.$productimg.'" alt="">
                      <div class="details">
                          <a name=\"p_id\" href=product_details.php?p_id='.$p_id.'><p>'.$productName.'</p></a>
                          <small>Price: SAR '.$productPrice.'</small>
                          <br>
                          <a class=/"remove/" href="Cart.php?action=remove&id='.$p_id.'">Remove</a>
                      </div>
                      </form>
              </div>
              </td>
              <td><input type="number" name="cartQ" min="0" max="'.$productStock.'" value="'.$productQuantity.'"></td>
                <td class="subTotal">SAR '.$productQuantity*$productPrice.'</td>
            </tr>
            <tr>
                <td>
              </tr>
              
              
  ';
}


function product($p_id, $p_img, $productName, $productQuantity, $productPrice){
  echo '<div class="pro-img"><img src="images/'.$p_img.'" alt=""></div>
  <label for="">'.$productName.'</label>
  <br>
  <label for="">Quantity: '.$productQuantity.'</label>
  <div class="vertical-line"></div>
  <input type="hidden" name="product_id" value='.$p_id.'>';
}

function order($O_id, $P_id, $P_img, $P_name, $quantity, $price, $total){
    echo ' <div class="orders">
  <form action="">
  <label for="">' . $O_id . '</label>
  <div class="vertical-line"></div>
  <div class="order-info">
  ';
    product($P_id, $P_img, $P_name, $quantity, $price);

  echo'</div>
  
 
  <!--end-->
  <div class="total"><label for="">Total Price: '.$total.'</label></div>
  </form>
</div>';
}





//orders functions (didn't use yet)

?>

