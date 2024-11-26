<?php

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=yardieadventures"; // or your database server
$username = "{FIN_USERNAME_HERE}";
$password = "{FIN_PASSWORD_HERE}";
$price = 0; // Initialize $price as an integer
$count=0;
$tran1= array();

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to select price from the orders table
    $sql = "SELECT price FROM orders WHERE affiliate='$username2'";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if there are results
    if ($results) {
        foreach ($results as $row) {
            $count+=1;
            
            $tran1[$count]="Total price :". $row["price"]."</br>";
            echo "Price: " . $row["price"] . "<br>";
            $price += $row["price"]; // Add each price to the total
        }
        echo "Total Price: " . $price; // Output the total price
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection (PDO does this automatically when the script ends)

?>
