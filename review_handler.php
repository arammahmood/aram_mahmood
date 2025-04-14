<?php
// Include database connection
require_once 'connection.php';

// Initialize variables
$review_text = "";
$review_err = "";
$item_id = isset($_GET['id']) ? $_GET['id'] : 0; // Get item ID from URL

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['review'])) {
    
    // Validate review text
    if (empty(trim($_POST["review"]))) {
        $review_err = "Please enter a review.";
    } else {
        $review_text = trim($_POST["review"]);
    }
    
    // Check input errors before inserting in database
    if (empty($review_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO reviews (item_id, review_text) VALUES (:item_id, :review_text)";
         
        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":item_id", $param_item_id, PDO::PARAM_INT);
            $stmt->bindParam(":review_text", $param_review_text, PDO::PARAM_STR);
            
            // Set parameters
            $param_item_id = $item_id;
            $param_review_text = $review_text;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to the same page to see the new review
                header("location: " . $_SERVER['PHP_SELF'] . "?id=" . $item_id . "&review_added=1");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
}
?>
