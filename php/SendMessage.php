<?php
    session_start();

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // confirm_delete
    $email = $_SESSION['email'];
    $context = $_GET["Message"];

    if($_GET['Sends1']==1) $_SESSION['recievers'] = $_SESSION['pal_1'];
    if($_GET['Sends2']==2) $_SESSION['recievers'] = $_SESSION['pal_2'];
    if($_GET['Sends3']==3) $_SESSION['recievers'] = $_SESSION['pal_3'];
    if($_GET['Sends4']==4) $_SESSION['recievers'] = $_SESSION['pal_4'];

    $receiver = $_SESSION['recievers'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT pen_id FROM Penpals WHERE (user1 = '".$email."' AND user2 = '".$receiver."') OR (user2 = '".$email."' AND user1 = '".$receiver."');";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pen_id = $row['pen_id'];


    $sql = "SELECT route FROM Route 
            WHERE pen_id = '$pen_id' 
            AND sender = '$email'";

    
    $result = $conn->query($sql);
    

    if (mysqli_num_rows($result) > 0) 
    {   
        $row = $result->fetch_assoc();
        $route = $row['route'];       
        
        $sql = "INSERT INTO Messages(route,content) VALUES (".$route.",'".$context."')";
        
        $conn->query($sql);
    }
    else 
    {
        $sql = "SELECT pen_id FROM Penpals WHERE (user1 = '".$email."' AND user2 = '".$receiver."') OR (user2 = '".$email."' AND user1 = '".$receiver."');";

        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0)
        { 
            $row = $result->fetch_assoc();
            $pen_id = $row['pen_id'];

            $sql = "INSERT INTO Route (pen_id,sender) VALUES ('$pen_id','$email')";
            
            $result = $conn->query($sql);

            $sql = "SELECT route FROM Route WHERE pen_id = '$pen_id' AND sender = '$email'";
            
            $result = $conn->query($sql);
            
            $row = $result->fetch_assoc();
            $route = $row['route'];
             
            $sql = "INSERT INTO Messages(route, content) VALUES ('$route','$context')";
             
            $conn->query($sql);

        }
    } 

    header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
    exit;

    $conn->close();
?>