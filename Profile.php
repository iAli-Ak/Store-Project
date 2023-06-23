<?php
require_once('./php/db.php');
require_once('./php/component.php');
session_start(); ?>
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
    <style>
        .containerp {
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profileb {
            background-color: #242424;
            text-align: center;
            padding: 40px 90px;
            position: relative;
            border-radius: 20px;
        }

        .containerp .profileb img{
            width: 100px;
            height: 100px;
            margin: 20px 0px;
        }

        .containerp .profileb label {
            padding: 5px 0px;
            color: aliceblue;
        }

        .containerp .profileb input {
            margin: 10px;
        }


    </style>
</head>

<body>
    <?php
    require_once('header.php'); ?>

    <div class="containerp">
        <form action="">
        <div class="profileb">
            <div>
            <img src="images/ppimg.png" alt="profile pic" width="390px" height="390px">
            </div>
            <br>
            <label for="">Name:</label>
            <input type="text" value=<?php echo $_SESSION['name'];?>>
            <br>
            <label for="">Email:</label>
            <input type="text" value=<?php echo $_SESSION['email'];?>>
            <br>
            <label for="">Phone Number:</label>
            <input type="text" value=<?php echo $_SESSION['mobile'];?>>
            <br>
            <label for="">Address:</label>
            <input type="text" value=<?php echo $_SESSION['address'];?>>
        </div>
        </form>
    </div>


    <?php
    require_once('footer.php'); ?>
</body>

</html>