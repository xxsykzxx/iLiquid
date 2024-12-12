function showBootstrapAlert(message, type = 'success', timeout = 3000) {
    const alertContainer = document.getElementById('alert-container');

    // Vytvoření elementu upozornění
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`; // Bootstrap třídy
    alert.role = 'alert';
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zavřít"></button>
    `;

    // Přidání do kontejneru
    alertContainer.appendChild(alert);

    // Automatické odstranění upozornění po určitém čase
    setTimeout(() => {
        alert.classList.remove('show'); // Fade-out animace
        setTimeout(() => alert.remove(), 150); // Po animaci element odstraníme
    }, timeout);
}

document.addEventListener('DOMContentLoaded', function () {
    fetch('get_cart_count.php')
        .then(response => response.json())
        .then(data => {
            updateCartCount(data.totalItems);
        })
        .catch(error => console.error('Error:', error));
});

function updateCartCount(count) {
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = count;
    }
}

// Událost na kliknutí tlačítka
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-product-id');

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ productId: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Bootstrap upozornění
                showBootstrapAlert('Produkt byl úspěšně přidán do košíku.', 'success');

                // Dynamická aktualizace počtu v košíku
                updateCartCount(data.totalItems);

            } else {
                showBootstrapAlert('Chyba při přidávání produktu.', 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showBootstrapAlert('Došlo k chybě. Zkuste to prosím znovu.', 'danger');
        });
    });
});


