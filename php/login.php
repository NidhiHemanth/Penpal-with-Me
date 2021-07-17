<?php
    session_start();

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // FirstName, LastName, email, phoneNo, date, message
    $rem = $_POST["remember"];
    $name = $_POST["name2"];
    $pw = $_POST["pw2"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Users where username = '$name' && password = '$pw'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $_SESSION['logged_in'] = 1;
        $_SESSION['username'] = $name;
        $_SESSION['user_pw'] = $pw;
        
        $row = $result->fetch_assoc();

        if(isset($rem)) {
            setcookie ("name2",$_POST["name2"],time()+ 3600);
            setcookie ("pw2",$_POST["pw2"],time()+ 3600);
            echo "Cookies Set Successfuly";
        }

        $sql = "SELECT * FROM Penpals where user1 = '$name' or user2 = '$name'";
        $result = $conn->query($sql);
    
        if (mysqli_num_rows($result) > 0) {    
            $i = 1;
            while($row = $result->fetch_assoc()) {
                if($row["user2"]<>$name) $_SESSION['pal_'.$i] = $row["user2"];
                    else $_SESSION['pal_'.$i] = $row["user1"];
                $i++;
            }
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