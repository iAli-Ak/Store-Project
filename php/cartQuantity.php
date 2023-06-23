<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('component.php');

//

if(isset($_POST['add'])){
    if(empty($_POST['Quantity'])){
        $_POST['Quantity'] = 1;
        //echo $_POST['Quantity'];
        header("location: ../Cart.php");
    } else{
       // echo $_POST['Quantity'];
        header("location: ../Cart.php");
    }
}
