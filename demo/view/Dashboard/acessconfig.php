<?php

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=yardieadventures"; // or your database server
$username = "{DB_USER_HERE}";
$password = "{PASSWORD_HERE}";
$access="";
try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to select access level from the users table
    $sql = "SELECT access FROM users WHERE username='$username2'";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if there are results
    if ($results) {
        foreach ($results as $row) {
            echo "Access Level: " . $row["access"] . "<br>";
            $access=$row["access"];
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection (PDO does this automatically when the script ends)

?>
