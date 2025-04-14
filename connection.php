<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'deg_menu');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    // Also create $conn for backward compatibility
    $conn = $pdo;
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
