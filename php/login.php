<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // email, password
    $rem = $_POST["remember"];
    $email = $_POST["email2"];
    $pw = $_POST["pw2"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Users where email = '$email' && password = '$pw'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $row = $result->fetch_assoc();

        $_SESSION['logged_in'] = 1;
        $_SESSION['username'] = $row["name"];
        $_SESSION['email'] = $email;
        $_SESSION['user_pw'] = $pw;

        if(isset($rem)) {
            setcookie ("email2",$_POST["email2"],time()+ 3600);
            setcookie ("pw2",$_POST["pw2"],time()+ 3600);
            echo "Cookies Set Successfuly";
        }

        $sql = "SELECT * FROM Penpals where user1 = '$email' or user2 = '$email'";
        $result = $conn->query($sql);
    
        if (mysqli_num_rows($result) > 0) {    
            $i = 1;
            while($row = $result->fetch_assoc()) {
                $_SESSION['penpal_id_'.$i] = $row["pen_id"];

                if($row["user2"] <> $email)
                {
                    $_SESSION['pal_'.$i] = $row["user2"];
                    $temp = $row["user2"];
                } 
                else
                {
                    $_SESSION['pal_'.$i] = $row["user1"];
                    $temp = $row["user1"];
                } 

                // $sql = "SELECT name FROM Users where email = '$temp'";
                // $result = $conn->query($sql);       
                
                // if (mysqli_num_rows($result) > 0) {    
                //     while($row = $result->fetch_assoc()) {
                //         $_SESSION['pal_name_'.$i] = $row["name"];
                //     } 
                // } 

                $i++;
            }
        } 
    
        // echo "Success";
        header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
        exit;
    } 

    // echo "Fail";
    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();

?>
