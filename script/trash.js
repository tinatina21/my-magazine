document.addEventListener('DOMContentLoaded', function() {
    // Находит все кнопки "В корзину"
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    // Находит контейнер корзины
    const cartContainer = document.getElementById('cart');

    // Обработчик нажатия на кнопки "В корзину"
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });
        
    // Функция добавления товара в корзину
    function addToCart(event) {
        const button = event.target;
        const product = button.closest('.col-6'); // Подбирайте нужный селектор
        const productId = button.getAttribute('data-id');
        const productTitle = product.querySelector('h3').textContent;
        const productPrice = product.querySelector('.me-2').textContent;
        const productImageSrc = product.querySelector('img').getAttribute('src');

        // Создание элементов товара для корзины
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        const cartItemContents = `
            <img src="${productImageSrc}" alt="Product image">
            <div>
                <h4>${productTitle}</h4>
                <p>${productPrice}</p>
            </div>
            <button class="remove-btn" data-id="${productId}">Удалить</button>
        `;
        cartItem.innerHTML = cartItemContents;

        // Добавление товара в корзину
        cartContainer.appendChild(cartItem);

        // Обработчик нажатия на кнопку "Удалить"
        const removeButton = cartItem.querySelector('.remove-btn');
        removeButton.addEventListener('click', removeFromCart);
    }

    // Функция удаления товара из корзины
    function removeFromCart(event) {
        const removeButton = event.target;
        const productId = removeButton.getAttribute('data-id');
        const cartItem = removeButton.closest('.cart-item');
        cartItem.remove();
        console.log('Товар с ID ' + productId + ' удален из корзины.');
    }

    
});

document.getElementById('view-cart-link').addEventListener('click', function(event) {
    event.preventDefault(); // Предотвращаем переход по ссылке

    var cart = document.getElementById('cart');
    var cartHeader = document.getElementById('cart-header');
    if (cart.style.display === 'none') {
        cart.style.display = 'block';
        cart.scrollIntoView({ behavior: 'smooth' }); // Прокрутка к корзине с плавной анимацией
        cartHeader.innerHTML = `
            <div class="container pb-4 pt-4">
                <div class="align-items-center row">
                    <div class="col">
                        <hr class="mb-0 mt-0"> 
                    </div>
                    <div class="col-auto">
                        <h2 class="fw-normal lead mb-0 text-dark">Корзина</h2> 
                    </div>
                    <div class="col">
                        <hr class="mb-0 mt-0"> 
                    </div>
                </div>
            </div>`;
    } else {
        cart.style.display = 'none';
        cartHeader.innerHTML = '<hr class="mb-0 mt-0">';
    }
});


