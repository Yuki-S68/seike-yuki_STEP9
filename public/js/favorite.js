document.addEventListener('DOMContentLoaded', () => {
    const favoriteBtn = document.getElementById('favorite-btn');

    if (favoriteBtn) {
        favoriteBtn.addEventListener('click', () => {
            const productId = favoriteBtn.dataset.productId;

            fetch(`/favorite/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (date.status === 'added') {
                    favoriteBtn.style.color = "red";
                } else {
                    favoriteBtn.style.color = 'black';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});