document.addEventListener('DOMContentLoaded', function() {
    console.log('Category script loaded');
    
    // Get all category buttons
    const categoryButtons = document.querySelectorAll('.category-btn');
    console.log('Found ' + categoryButtons.length + ' category buttons');
    
    // Get all restaurant cards - include both direct cards and those inside links
    const restaurantCards = document.querySelectorAll('.restaurant-card');
    console.log('Found ' + restaurantCards.length + ' restaurant cards');
    
    // Define restaurant categories (based on your requirements)
    const restaurantCategories = {
        'Restaurant': ['Burger King', 'KFC'],
        'Cafe': ['Starbucks'],
        'Sweets': ['KFC', 'Starbucks']
    };
    
    // Function to show/hide restaurant cards based on category
    function filterRestaurants(category) {
        console.log('Filtering by category: ' + category);
        
        restaurantCards.forEach(card => {
            // Find the restaurant name - could be directly in the card or in a nested element
            let restaurantName = '';
            const h3Element = card.querySelector('h3');
            
            if (h3Element) {
                restaurantName = h3Element.textContent.trim();
                console.log('Found restaurant: ' + restaurantName);
                
                // Check if this restaurant belongs to the selected category
                if (category === 'All' || restaurantCategories[category].includes(restaurantName)) {
                    // Show the card or its parent if it's wrapped in a link
                    if (card.parentElement.classList.contains('restaurant-link')) {
                        card.parentElement.style.display = 'block';
                    } else {
                        card.style.display = 'block';
                    }
                } else {
                    // Hide the card or its parent if it's wrapped in a link
                    if (card.parentElement.classList.contains('restaurant-link')) {
                        card.parentElement.style.display = 'none';
                    } else {
                        card.style.display = 'none';
                    }
                }
            }
        });
    }
    
    // Add click event listener to each category button
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            console.log('Category button clicked: ' + this.textContent);
            
            // Remove active class from all buttons
            categoryButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter restaurants based on selected category
            filterRestaurants(this.textContent);
        });
    });
    
    // Create and add "All" button
    const categoriesSection = document.querySelector('.categories');
    if (categoriesSection) {
        const allButton = document.createElement('button');
        allButton.className = 'category-btn active';
        allButton.textContent = 'All';
        categoriesSection.insertBefore(allButton, categoriesSection.firstChild);
        
        // Add click event for "All" button
        allButton.addEventListener('click', function() {
            categoryButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
            
            filterRestaurants('All');
        });
    }
});
