<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Digital Menu</title>
    <link rel="stylesheet" href="css/homeStyle.css">
</head>
<body class="dark-mode">
<header>
    <img style="width: 75px;" src="images/logo.png" alt="Logo">
    <h1>Digital Menu</h1>
</header>
<main>
    <!-- Search Section -->
    <section class="search-section">
        <label for="search-input" class="search-label">
            <img src="images/search.png" alt="Search Icon" class="search-icon">
        </label>
        <input type="text" id="search-input" placeholder="Search for restaurants...">
    </section>

    <!-- Categories -->
    <section class="categories">
        <button class="category-btn">Restaurant</button>
        <button class="category-btn">Cafe</button>
        <button class="category-btn">Sweets</button>
    </section>

    <!-- Restaurant List -->
    <section class="restaurant-list">
        <h2>Popular Restaurants</h2>
        <div class="restaurants">
            <!-- Starbucks Card -->
            <div class="restaurant-card">
            <a href="starbucks.php" class="restaurant-link">
                <img src="images/starbucks.png" alt="Cafe">
                <h3 style="color: white;">Starbucks</h3>
                <p>Perfect spot for coffee and snacks.</p>
            </div>

            <!-- Burger King Card (Clickable) -->
            <a href="burgerking.php" class="restaurant-link">
                <div style="height: 200px;" class="restaurant-card">
                    <img src="images/burgerking.png" alt="Restaurant">
                    <h3 style="color: white;">Burger King</h3>
                    <p>Enjoy tasty meals and great service.</p>
                </div>
            </a>

            <!-- KFC Card -->
            <div class="restaurant-card">
            <a href="kfc.php" class="restaurant-link">
                <img src="images/kfc.png" alt="Restaurant">
                <h3 style="color: white;">KFC</h3>

                <p>Delicious cuisine with a cozy atmosphere.</p>
            </div>
        </div>
    </section>
</main>
    <!-- Add this before the closing body tag -->
    <script src="search.js"></script>
    <script src="category.js"></script>
</body>
</html>
