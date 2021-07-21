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
    $my_lang = $_POST['lang'];

    if(isset($_POST['submit_lang'])){
        if(!empty($my_lang))
        {
            echo $_SESSION['email'];

            $sql = "DELETE FROM Languages WHERE email = '$email'";
            $result = $conn->query($sql);       
        }
        
        foreach($my_lang as $value){
            echo 'updated '.$value.'<br/>';

            $sql = "INSERT INTO Languages VALUES ('$email','$value')";
            $result = $conn->query($sql);       
        }
    }    
    
    header('Location: http://localhost/PHPfiles/PenPals/dashboard.php');
    exit;
        
    $conn->close();
       
?>