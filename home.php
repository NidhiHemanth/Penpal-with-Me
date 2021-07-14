<?php 
    session_start();

    if(!isset($_SESSION['logged_in'])) {
        header('Location: http://localhost/PHPfiles/WEB/index.php');
        exit;
    }
?>

<!DOCTYPE html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Hello world</h1>
</body>
</html>