<?php

/*  might need to add the 3307 port to the server name  */

 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "7_Pixels";

$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);






/*
     function getData()
    {
        $sql = "SELECT * FROM Product";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
*/

?>