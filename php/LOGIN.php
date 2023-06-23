<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db.php");

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    

    if(empty($email)){
        header("Location: ../login.php?error=Email is required");
        exit();
    }else if(empty($password)){
        header("Location: ../login.php?error=Password is required");
        exit();
    }else{
        $sql_c = "SELECT * FROM Customer_user WHERE C_email= '$email' &&  C_password= '$password'";
        $result_c = mysqli_query($conn, $sql_c);
        $sql_a = "SELECT * FROM Admin_user WHERE A_email= '$email' &&  A_password= '$password'";
        $result_a = mysqli_query($conn, $sql_a);

        if(mysqli_num_rows($result_c) === 1 || mysqli_num_rows($result_a) === 1){
            $row = mysqli_fetch_assoc($result_c);
            $row_a = mysqli_fetch_assoc($result_a);
            if($row['C_email'] === $email && $row['C_password'] === $password){
                $_SESSION['id'] = $row['C_id'];
                $_SESSION['name'] = $row['C_name'];               
                $_SESSION['email'] = $row['C_email'];
                $_SESSION['address'] = $row['C_address'];
                $_SESSION['password'] = $row['C_password'];
                $_SESSION['mobile'] = $row['C_mobile_number'];
                header("Location: ../index.php");
                exit();
            } else if($row_a['A_email'] === $email && $row_a['A_password'] === $password){

                $_SESSION['A_id'] = $row_a['A_id'];
                $_SESSION['A_name'] = $row_a['A_name'];               
                $_SESSION['A_email'] = $row_a['A_email'];
                $_SESSION['A_address'] = $row_a['A_address'];
                $_SESSION['A_password'] = $row_a['A_password'];
                header("Location: ../Admin.php");
                exit();
            }
        }else{
            header("Location: ../login.php?error=Incorrect Email or Password");
        exit();
        }
    }
}
else{
    header("Location: ../login.php");
}

