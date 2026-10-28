const buyBtn = document.getElementById('buyBtn');
const modalCancel = document.getElementById('modalCancel');
const quantityInput = document.getElementById('quantity');
const modalQuantity = document.getElementById('modalQuantity');

if (buyBtn && modalCancel) {
    buyBtn.addEventListener('click', function() {
        modalQuantity.value = quantityInput.value;        
        document.getElementById('purchaseModal').style.display = 'block';
    });

    modalCancel.addEventListener('click', function() {
        document.getElementById('purchaseModal').style.display = 'none';
    });
}
