document.addEventListener('DOMContentLoaded', () => {
    const favoriteBtn = document.getElementById('favorite-btn');

    if (favoriteBtn) {
        favoriteBtn.addEventListener('click', () => {
            const productId = favoriteBtn.dataset.productId;
            const method = favoriteBtn.style.color === 'red' ? 'DELETE' : 'POST';

            fetch(`/products/${productId}/favorite`, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'added') {
                    favoriteBtn.style.color = "red";
                } else {
                    favoriteBtn.style.color = '';
                }

                document.getElementById('favorite-count').textContent = data.favorites_count;
            })
            .catch(error => console.error('Error:', error));
        });
    }
});