<?php
    session_start();

    $servername = "sql107.epizy.com";
    $username = "epiz_29240958";
    $password = "ZMqd5XG3XFlgIo5";
    $dbname = "epiz_29240958_DBMS";

    // name, email, password
    $name = $_POST["name"];
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

        $sql = "INSERT INTO `Users` (`name`,`email`,`password`) VALUES ('$name','$email','$pw')";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION['logged_in'] = 1;
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['user_pw'] = $password;
        } 
        
        $sql = "INSERT INTO `Interests` (`email`) VALUES ('$email')";
        $result = $conn->query($sql);
    
        $sql = "INSERT INTO `Languages` (`email`) VALUES ('$email')";
        $result = $conn->query($sql);

        // header('Location: http://penpal-with-me.epizy.com/index.php');
        // exit;
    }

    header('Location: http://penpal-with-me.epizy.com/index.php');
    exit;

    $conn->close();

?>