<?php
// Include database connection
require_once 'connection.php';

try {
    // Add restaurant_name column to the reviews table if it doesn't exist
    $sql = "ALTER TABLE reviews ADD COLUMN restaurant_name VARCHAR(255)";
    $pdo->exec($sql);
    echo "Successfully added restaurant_name column to reviews table!";
} catch(PDOException $e) {
    // If the column already exists, PDO will throw an error
    echo "Error or column already exists: " . $e->getMessage();
}
?>
