<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "penpals";

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

    $sql = "SELECT * FROM UserLog where Email = '$email' && Name = '$name'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $sql = "UPDATE `UserLog` SET `Password`='$new_pw' WHERE Email = '$email' && Name = '$name'";
        $conn->query($sql);
    } 

    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();
?>