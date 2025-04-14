document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const restaurantCards = document.querySelectorAll('.restaurant-card');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        restaurantCards.forEach(card => {
            const restaurantName = card.querySelector('h3').textContent.toLowerCase();
            const restaurantDesc = card.querySelector('p').textContent.toLowerCase();
            
            // Check if the restaurant name or description contains the search term
            if (restaurantName.includes(searchTerm) || restaurantDesc.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
