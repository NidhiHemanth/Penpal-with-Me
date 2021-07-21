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
    
    $sql ="SELECT * FROM Penpals WHERE user1 ='".$_SESSION['email']."' OR user2 ='".$_SESSION['email']."'";
                    
    $result = $conn->query($sql);
                    
    if (mysqli_num_rows($result) < 3)
    {              

        $sql = "CREATE VIEW my_pals AS  SELECT y.email, MAX(y.num)-1 AS counters FROM (SELECT COUNT(email) AS num, email 
                FROM Interests
                WHERE interest_name IN   
                (SELECT interest_name FROM Interests  
                WHERE email = '".$_SESSION['email']."')  
                AND email <> '".$_SESSION['email']."'  
                GROUP BY email) y
                GROUP BY email
                
                ORDER BY counters DESC";

        $conn->query($sql);

        $sql = "CREATE VIEW potentials AS 
                SELECT DISTINCT my_pals.email, my_pals.counters FROM 
                my_pals NATURAL JOIN Languages 
                WHERE language IN 
                (SELECT language FROM Languages 
                WHERE email = '".$_SESSION['email']."')";
                    
        $conn->query($sql);                               
                    
        $sql = "CREATE VIEW filtered AS 
                SELECT * FROM potentials WHERE 
                !(email IN (SELECT user1 FROM Penpals WHERE user2 = '".$_SESSION['email']."') 
                OR email IN (SELECT user2 FROM Penpals WHERE user1 ='".$_SESSION['email']."'))";
                    
        $conn->query($sql);

        $sql = "SELECT email FROM filtered
                WHERE counters =
                (SELECT MAX(counters) FROM filtered) 
                LIMIT 1";

        $result = $conn->query($sql);
        
        if (mysqli_num_rows($result) > 0)
        { 
            $row = $result->fetch_assoc();
            $sql = "INSERT INTO Penpals (user1, user2) VALUES ('".$_SESSION['email']."','".$row['email']."')";
            
            $conn->query($sql);
        }
        else 
            echo "Invalid user"; 
        
        $sql= "DROP VIEW my_pals";
        $conn->query($sql);
        
        $sql = "DROP VIEW potentials";
        $conn->query($sql);
        
        $sql="DROP VIEW filtered";
        $conn->query($sql);

    }
                      
    $sql = "SELECT * FROM Penpals where user1 = '".$_SESSION['email']."' or user2 = '".$_SESSION['email']."'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {    
        $i = 1;
        while($row = $result->fetch_assoc()) {
            if($row["user2"] <> $email) $_SESSION['pal_'.$i] = $row["user2"];
                else $_SESSION['pal_'.$i] = $row["user1"];
            $i++;
        }
    }  

    header('Location: http://localhost/PHPfiles/PenPals/php/login.php');
    exit;
        
    $conn->close();
       
?>