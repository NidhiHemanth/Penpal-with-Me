<?php          
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DBMS";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_SESSION['email'];
    $my_interest = $_POST['interest'];

    if(isset($_POST['submit_interest'])){
        if(!empty($my_interest))
        {
            echo $_SESSION['email'];

            $sql = "DELETE FROM Interests WHERE email = '$email'";
            $result = $conn->query($sql);       
        }
        
        foreach($my_interest as $value){
            echo 'updated '.$value.'<br/>';

            $sql = "INSERT INTO Interests VALUES ('$email','$value')";
            $result = $conn->query($sql);       
        }
    }    
    
    header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
    exit;
        
    $conn->close();
       
?>