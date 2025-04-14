<?php
// Start session
session_start();

// Include database connection
require_once 'connection.php';

// Initialize variables
$review_text = "";
$restaurant_name = "";
$error_message = "";
$success_message = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['review'])) {
    // Get the review text and restaurant name
    $review_text = trim($_POST['review']);
    $restaurant_name = trim($_POST['restaurant_name'] ?? '');
    
    // Validate review text
    if (empty($review_text)) {
        $error_message = "Please enter a review before submitting.";
    } else {
        try {
            // Prepare an insert statement
            $sql = "INSERT INTO reviews (review_text, restaurant_name) VALUES (:review_text, :restaurant_name)";
            
            if ($stmt = $pdo->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":review_text", $review_text, PDO::PARAM_STR);
                $stmt->bindParam(":restaurant_name", $restaurant_name, PDO::PARAM_STR);
                
                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    $success_message = "Your review has been submitted successfully!";
                    
                    // Redirect back to the referring page if available
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        header("Location: " . $_SERVER['HTTP_REFERER'] . "?review_added=1");
                        exit;
                    }
                } else {
                    $error_message = "Something went wrong. Please try again later.";
                }
                
                // Close statement
                unset($stmt);
            } else {
                $error_message = "Database error. Please try again later.";
            }
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Submission - Digital Menu</title>
    <link rel="stylesheet" href="css/homeStyle.css">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: white;
        }
        
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="dark-mode">
    <header>
        <img style="width: 75px;" src="images/logo.png" alt="Logo">
        <h1>Digital Menu</h1>
    </header>
    
    <main>
        <div class="container">
            <h2>Review Submission</h2>
            
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
                <p>Please go back and try again.</p>
                <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home.php'; ?>" class="btn">Go Back</a>
            <?php else: ?>
                <div class="error-message">
                    An unexpected error occurred.
                </div>
                <p>Please go back and try again.</p>
                <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'home.php'; ?>" class="btn">Go Back</a>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
