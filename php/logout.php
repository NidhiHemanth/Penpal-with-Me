<?php   
    session_start();    //to ensure you are using same session
    unset($_SESSION['logged_in']);
    session_destroy();  //destroy the session
    
    //to redirect back to "index.php" after logging out
    header('Location: http://penpal-with-me.epizy.com/index.php');
    // header('refresh: 1');
    exit();
?>