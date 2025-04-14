<?php
require_once 'connection.php';

try {
    // Create reviews table
    $sql = "CREATE TABLE IF NOT EXISTS `reviews` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `review_text` text NOT NULL,
      `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    
    $pdo->exec($sql);
    echo "Reviews table created successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
