<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // confirm_delete
    $pw = $_GET["confirm_delete"];

    if($_GET['button1']==1) $_SESSION['delete_me'] = $_SESSION['pal_1'];
    if($_GET['button2']==2) $_SESSION['delete_me'] = $_SESSION['pal_2'];
    if($_GET['button3']==3) $_SESSION['delete_me'] = $_SESSION['pal_3'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_SESSION['email'];
    $name = $_SESSION['username'];
    $bye = $_SESSION['delete_me'];

    echo "<h1>no".$_POST['name'.$i]."no</h1>";

    // echo "<h1> email : ".$email."</h1>";
    // echo "<h1> name  : ".$name."</h1>";
    // echo "<h1> bye   : ".$bye."</h1>";
    // echo "<h1> pw    : ".$pw."</h1>";
    
    $sql = "SELECT * FROM Users where email = '$email' AND password = '$pw'";
    
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $sql = "DELETE FROM Route WHERE pen_id IN (SELECT pen_id FROM Penpals WHERE (user1 = '$email' AND user2 = '$bye') OR (user1 = '$bye' AND user2 = '$email'));";
        
        $conn->query($sql);
        
        $sql = "DELETE FROM Penpals WHERE pen_id IN (SELECT pen_id FROM Penpals WHERE (user1 = '$email' AND user2 = '$bye') OR (user1 = '$bye' AND user2 = '$email'));";
        
        $conn->query($sql);
    } 

    $sql = "SELECT * FROM Penpals where user1 = '".$_SESSION['email']."' or user2 = '".$_SESSION['email']."'";
    $result = $conn->query($sql);
    $_SESSION['numOfPenpals'] = mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {    
        $i = 1;
        while($row = $result->fetch_assoc()) {
            if($row["user2"] <> $email) $_SESSION['pal_'.$i] = $row["user2"];
                else $_SESSION['pal_'.$i] = $row["user1"];
            $i++;
        }
    }  
    
    header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
    // header('Location: http://localhost/PHPfiles/PenPals/php/login.php');
    exit;
    

    $conn->close();
?>