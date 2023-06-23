<?php
session_start();

require_once('./php/db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="Style_for checkout.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/Logo/logo.png" />
</head>
<body>
<script src="check_out_condtions.js"></script>
<div class="container">
    <form action="order_complete.php" method="post">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" required>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="text" onkeypress="return numaric_only(event)"  maxlength="3" placeholder="xxx" required>
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input  type="text" onkeypress="return numaric_only(event)" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>expiration date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months" required>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years" required>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="images/pp.png" alt="master card">
                    <img src="images/vi.png" alt="Visa">
                    <img src="images/mc.png" alt="paypal">
                </div>
            </div>    
        </div>
        <input type="submit" value="Confirm" class="confirm">
    </form>
    </div>
</body>
</html>
