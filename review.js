document.addEventListener('DOMContentLoaded', function() {
    const reviewForm = document.querySelector('.review-form form');
    
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const reviewText = document.getElementById('review-text').value;
            
            if (reviewText.trim() === '') {
                alert('Please write a review before submitting.');
                return;
            }
            
            // Create form data
            const formData = new FormData();
            formData.append('review', reviewText);
            
            // Send AJAX request
            fetch('submit_review.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Add the new review to the page
                const reviewsContainer = document.querySelector('.sidebar');
                const newReview = document.createElement('div');
                newReview.className = 'review';
                newReview.innerHTML = `<p>"${reviewText}"</p>`;
                
                // Insert after the heading
                const heading = reviewsContainer.querySelector('h2');
                heading.insertAdjacentElement('afterend', newReview);
                
                // Clear the form
                document.getElementById('review-text').value = '';
                
                // Show success message
                alert('Your review has been submitted successfully!');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting your review. Please try again.');
            });
        });
    }
});
