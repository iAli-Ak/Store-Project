<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("db.php");

$firstName = $_POST['firstName'];
$email = $_POST['email'];
$mobileNumber = $_POST['number'];
$password = $_POST['password'];
$address = $_POST['address'];





if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
} else{

        $sql = "SELECT * FROM Customer_user";
        $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($email === $row['C_email']) {
            header("Location: ../signup.php?error=Email already exist");
            exit();
        }else {
            $stmt = $conn->prepare("insert into Customer_user(C_name, C_email, C_mobile_number, C_password, C_address)
                        values(?,?,?,?,?)");
            $stmt->bind_param("ssiss", $firstName, $email, $mobileNumber, $password, $address);
            $stmt->execute();
            echo "complete";
            $stmt->close();
            $conn->close();
            header("Location: ../index.php");
        }
        
    }
}



