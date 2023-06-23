<?php
require_once('./php/db.php');
require_once('./php/component.php');
session_start();

$cookiesData = [];

if (isset($_SESSION['cart'])) {
    $product_id = array_column($_SESSION['cart'], null);

    $sql = "SELECT * FROM Product";
    $item = $conn->query($sql);
    $total = 0;
    $q = 1;

    while ($row = mysqli_fetch_assoc($item)) {
        foreach ($product_id as $id) {
            if ($row['P_id'] == $id['product_id']) {
                $cookiesData[] = [
                    'name' => $row['P_name'],
                    'total' => ($row['P_price'] * $id['quantity']),
                    'qty' => $id['quantity']
                ];
            }
        }
    }
}
$email = $_SESSION['email'];

$cookie_name = $_SESSION['email'];
$name = str_replace('.', '_', $email);
$cookieExistingData = $_COOKIE[$name] ?? [];

if (!empty($cookieExistingData)) {
    $cookieExistingData = json_decode($cookieExistingData, true);
}

$cookieExistingData = array_merge($cookieExistingData, $cookiesData);

$cookieExistingData = json_encode($cookieExistingData);

setcookie($cookie_name, $cookieExistingData, time() + (86400 * 30), "/"); // 86400 = 1 day


unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
    <title>profile</title>
    <link rel="icon" href="images/Logo/logo.png" />
</head>

<body>
    <?php
    require_once('header.php'); ?>

    <section id="product2" class="section-p1">

        <div class="thanks">
            <h2>Thank You for Ordering...</h2>
        </div>

    </section>

    <?php
    require_once('footer.php'); ?>
</body>

</html>