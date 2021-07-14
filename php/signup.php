<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // FirstName, LastName, email, phoneNo, date, message
    $name = $_POST["name1"];
    $email = $_POST["email1"];
    $pw = $_POST["pw1"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `Users` where email = '$email'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 0) {

        $sql = "INSERT INTO `Users` (`username`,`email`,`password`) VALUES ('$name','$email','$pw')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['logged_in'] = 1;
            $_SESSION['username'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_pw'] = $password;

            header('Location: http://localhost/PHPfiles/PenPals/home.php');
            exit;
        } 

    }
    
    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();

?>