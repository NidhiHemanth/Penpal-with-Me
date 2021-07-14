<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "penpals";

    // FirstName, LastName, email, phoneNo, date, message
    $rem = $_POST["remember"];
    $email = $_POST["email2"];
    $pw = $_POST["pw2"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM UserLog where Email = '$email' && Password = '$pw'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $_SESSION['logged_in'] = 1;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_pw'] = $pw;
        
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row["Name"];

        if(isset($rem)) {
            setcookie ("email2",$_POST["email2"],time()+ 3600);
            setcookie ("pw2",$_POST["pw2"],time()+ 3600);
            echo "Cookies Set Successfuly";
        }

        // echo "Success";
        header('Location: http://localhost/PHPfiles/PenPals/home.php');
        exit;
    } 

    // echo "Fail";
    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();

?>