<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once('./php/db.php');
  require_once('./php/component.php');
  session_start();
  ?>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
  <script src="https://kit.fontawesome.com/df0cdd1d13.js" crossorigin="anonymous"></script>
  <script defer src="popup.js"></script>
  <title>Orders</title>
  <link rel="icon" href="images/Logo/logo.png" />
</head>

<body>
  <?php
  require_once('header.php');
  ?>
  <section id="product2" class="section-p1">
    <h2>Orders</h2>
    <hr>
    <div class="pro-container">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <?php
        $email = $_SESSION['email'] ?? '';

        $name = str_replace('.', '_', $email);

        $data = $_COOKIE[$name] ?? [];

        $data = !empty($data) ? json_decode($data, true) : [];

        foreach ($data as $item) {
          echo '<tr><td>' . $item['name'] . '</td><td>' . $item['qty'] . '</td><td>' . $item['total'] . '</td></tr>';
        }

        if (empty($data)) {
          echo "No orders have been made.";
        }
        

        ?>

      </table>
    </div>
  </section>
  <?php
  require_once('footer.php');
  ?>
</body>

</html>