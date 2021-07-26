<?php          
    session_start();

    $servername = "sql107.epizy.com";
    $username = "epiz_29240958";
    $password = "ZMqd5XG3XFlgIo5";
    $dbname = "epiz_29240958_DBMS";
    
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
    
    header('Location: http://penpal-with-me.epizy.com/dashboard.php');
    exit;
        
    $conn->close();
       
?>