<?php          
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
    
    // $my_lang = $_POST['lang'];

    if(isset($_POST['submit_lang'])){
        if(!empty($my_lang))
        {
            echo "hiiiii";

            // echo $_SESSION['email'];
            // $sql = "DELETE * FROM Languages WHERE email = '".$_SESSION['email']."'";
            // $result = $conn->query($sql);       
        }
        
        foreach($_POST['lang'] as $value){
            echo $value.'<br/>';

            // $sql = "SELECT * FROM Users where email = '$email' AND password = '$pw';";
            // $result = $conn->query($sql);       
        }
    }    
    
    // header('Location: http://localhost/PHPfiles/PenPals/php/login.php');
    exit;
        
    $conn->close();
       
?>