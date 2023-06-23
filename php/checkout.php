<?php
require_once('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


//


if(isset($_POST['check-out'])){
    //if cart is empty
    if(empty($_SESSION['cart'])){
        
        header("Location: ../Cart.php?error=Cart is Empty");
        exit();
    }else {
        //user must be logged in

    if(isset($_SESSION['id'])){
        header("Location: ../check_out.php");
        exit();
    } else{
        // if user is not logged in

        header("Location: ../Cart.php?error=You must be logged in first");
        exit();
    }
  }
}   