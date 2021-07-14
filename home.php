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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <h1>Hello world</h1>

    <script src="./script/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>