<?php
    session_start();

    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "DBMS";

    // confirm_delete
    $context = $_GET["Message"];
    $receiver = $_GET["Sends"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    
    $sql = "select route from route where pen_id = (
        select pen_id from penpals where user1 IN ('".$_SESSION['email']."', '".$receiver."') 
        AND user2 IN ('".$_SESSION['email']."', '".$receiver."') 
                                            ) AND sender = '".$_SESSION['email']."'";
    
    $result = $conn->query($sql);
    

    if (mysqli_num_rows($result) > 0) 
    {   $row = $result->fetch_assoc();
        $route = $row['route'];       
        $sql = "insert into Messages(route,content) values (".$route.",'".$context."')";
        
        $conn->query($sql);
       }
    else {

        $sql = "select pen_id from Penpals where (user1 = '".$_SESSION['email']."' AND user2 = '".$receiver."') OR (user2 = '".$_SESSION['username']."' AND user1 = '".$receiver."')";
        $result = $conn->query($sql);
         if (mysqli_num_rows($result) > 0)
         { 
            $row = $result->fetch_assoc();
            $pen_id = $row['pen_id'];
            $sql = "insert into route (pen_id,sender) values (".$pen_id.",'".$_SESSION['email']."')";
            
            $result = $conn->query($sql);

            $sql = "select route from route where pen_id=".$pen_id." AND sender = '".$_SESSION['email']."'";
            
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $route = $row['route'];
             
             $sql = "insert into Messages(route,content) values (".$route.",".$context.")";
             
             $conn->query($sql);

         }
    } 

 
    
    //header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
    exit;
    

    $conn->close();
?>