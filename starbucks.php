<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starbucks - Digital Menu</title>
    <link rel="stylesheet" href="css/rest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="dark-mode">
    <header>
        <div class="header-content">
            <img src="images/starbucks.png" alt="kfc Logo" class="logo">
            <h1>Starbucks</h1>
        </div>
    </header>

    <main>
        <div class="content-wrapper">
            <!-- Restaurant Info Section -->
            <section class="restaurant-info">
                <div class="description">
                    <p>Starbucks the best of fast food.</p>
                </div>

                <div class="location">
                    <h3>Location</h3>
                    <div class="map-container">
                        <!-- Replace with actual map or embed link -->
                        <img src="images/map.png" alt="Location Map" class="map" style="width: 1000px;">
                    </div>
                </div>

                <div class="contact">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone-alt"></i> 0780 778 9399</p>
                    <p><i class="fas fa-envelope"></i> contact@burgerking.com</p>
                </div>
            </section>

            <!-- Sidebar for Customer Reviews -->
            <?php
// Include database connection
require_once 'connection.php';

// Check if a review was just added
$review_added = isset($_GET['review_added']) && $_GET['review_added'] == 1;

// Fetch reviews for Starbucks from the database
try {
    $restaurant_name = "Starbucks";
    $stmt = $pdo->prepare("SELECT * FROM reviews WHERE restaurant_name = ? ORDER BY created_at DESC");
    $stmt->execute([$restaurant_name]);
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // If there's an error, set reviews to empty array
    $reviews = [];
}
?>

            <aside class="sidebar">
                <h2>Customer Reviews for Starbucks</h2>
                
                <?php if ($review_added): ?>
                    <div class="success-message" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 4px; margin-bottom: 10px;">
                        Your review for Starbucks has been submitted successfully!
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($reviews)): ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="review">
                            <p>"<?php echo htmlspecialchars($review['review_text']); ?>"</p>
                            <small><?php echo date('M d, Y', strtotime($review['created_at'])); ?></small>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default Starbucks-specific reviews -->
                    <div class="review">
                        <p>"Great coffee and cozy atmosphere!"</p>
                    </div>
                    <div class="review">
                        <p>"The perfect place to work or study."</p>
                    </div>
                <?php endif; ?>
                
                <!-- Review Submission Form -->
                <section class="review-form">
                    <h3 style="font-size: smaller; font-weight: 300;">Write a Review for Starbucks</h3>
                    <form action="submit_review.php" method="post">
                        <input type="hidden" name="restaurant_name" value="Starbucks">
                        <textarea style="width: 95%;" name="review" id="review-text" rows="4" placeholder="Write your Starbucks review here..." required></textarea>
                        <button style="width: 100%;" type="submit" class="submit-btn">Submit Starbucks Review</button>
                    </form>
                </section>
            </aside>
        </div>

          <!-- Menu Items Section -->
          <section class="menu-items">
            <h2>Menu Items</h2>
            
           


            <a style="text-decoration: none;" href="item.php" class="restaurant-link">
                <div class="item">
                    <img src="images/burger.jpg" alt="Whopper">
                    <h3 style="color: white;">Burger</h3>
                    <p style="color: white;">A flame-grilled burger with fresh ingredients.</p>
                    <p><strong>$5.99</strong></p>
                </div>
            </a>
            <a style="text-decoration: none;" href="item.php" class="restaurant-link">
            <div class="item">
                <img src="images/pizza.jpg" alt="Fries">
                <h3 style="color: white;">Pizza</h3>
                <p style="color: white;">Crispy golden fries, the perfect side.</p>
                <p><strong>$2.49</strong></p>
            </div>
            </a>
            <a style="text-decoration: none;" href="item.php" class="restaurant-link">
            <div class="item">
                <img src="images/spageti.jpg" alt="Milkshake">
                <h3 style="color: white;">Spageti</h3>
                <p style="color: white;">Rich and creamy milkshakes in various flavors.</p>
                <p><strong>$3.49</strong></p>
            </div>
            </a>
        </section>
    </main>
</body>
</html>
