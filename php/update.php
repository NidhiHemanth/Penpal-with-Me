<?php
    session_start();

    $servername = "sql107.epizy.com";
    $username = "epiz_29240958";
    $password = "ZMqd5XG3XFlgIo5";
    $dbname = "epiz_29240958_DBMS";

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

    $sql = "SELECT * FROM Users where email = '$email' && name = '$name'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $sql = "UPDATE `Users` SET `password`='$new_pw' WHERE email = '$email' && name = '$name'";
        $conn->query($sql);
    } 

    header('Location: http://penpal-with-me.epizy.com/index.php');
    exit;

    $conn->close();
?>