<?php
    session_start();

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // FirstName, LastName, email, phoneNo, date, message
    $name = $_POST["name3"];
    $email = $_POST["email3"];
    $new_pw = $_POST["pw3"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Users where email = '$email' && username = '$name'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $sql = "UPDATE `Users` SET `password`='$new_pw' WHERE email = '$email' && username = '$name'";
        $conn->query($sql);
    } 

    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();
?>