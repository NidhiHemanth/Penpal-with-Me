<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // confirm_delete
    $pw = $_POST["confirm_delete"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_SESSION['email'];
    $name = $_SESSION['username'];
    $bye = $_SESSION['delete_me'];
    // echo "<h1> email : ".$email."</h1>";
    // echo "<h1> name  : ".$name."</h1>";
    // echo "<h1> bye   : ".$bye."</h1>";
    // echo "<h1> pw    : ".$pw."</h1>";
    
    $sql = "SELECT * FROM Users where email = '$email' AND password = '$pw';";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $sql = "DELETE FROM Route WHERE pen_id IN (SELECT pen_id FROM Penpals WHERE (user1 = '$email' AND user2 = '$bye') OR (user1 = '$bye' AND user2 = '$email'));";
        $conn->query($sql);
        
        $sql = "DELETE FROM Penpals WHERE pen_id IN (SELECT pen_id FROM Penpals WHERE (user1 = '$email' AND user2 = '$bye') OR (user1 = '$bye' AND user2 = '$email'));";
        $conn->query($sql);
    } 

    header('Location: http://localhost/PHPfiles/PenPals/index.php');
    exit;

    $conn->close();
?>