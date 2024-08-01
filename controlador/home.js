document.addEventListener('DOMContentLoaded', function() {
    const btnCart = document.querySelector('.container-cart-icon button');
    const containerCartProducts = document.querySelector('.container-cart-products');
    const rowProduct = document.querySelector('.row-product');
    let allProducts = [];// Array para almacenar todos los productos agregados al carrito
    const valorTotal = document.querySelector('.total-pagar');
    const countProducts = document.querySelector('#contador-productos');
    const cartEmpty = document.querySelector('.cart-empty');
    const cartTotal = document.querySelector('.cart-total');

    // click en el boton del carrito para mostrar/ocultar el contenido del carrito
    btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('hidden-cart');
    });

    // Itera sobre cada elemento de producto y agrega un event listener al botón "Agregar al carrito"
    const productsList = document.querySelectorAll('.item');

    productsList.forEach(product => {
        const btnAddCart = product.querySelector('.btn-add-cart');
        const title = product.querySelector('h3').textContent;
        const price = product.querySelector('.price').textContent;

        // Crea un objeto con la información del producto seleccionado
        btnAddCart.addEventListener('click', () => {
            const infoProduct = {
                quantity: 1,
                title: title,
                price: price,
            };

            // Verifica si el producto ya está en el carrito
            const exists = allProducts.some(product => product.title === infoProduct.title);

            // Si el producto ya esta en el carrito, aumenta su cantidad
            if (exists) {
                const products = allProducts.map(product => {
                    if (product.title === infoProduct.title) {
                        product.quantity++;
                    }
                    return product;
                });
                allProducts = [...products];
            } else {
                allProducts.push(infoProduct);// Si el producto no esta en el carrito, lo agrega al array
            }

            showHTML();// Actualiza el carrito
        });
    });
// clic en el botón de eliminar producto del carrito
    rowProduct.addEventListener('click', e => {
        if (e.target.classList.contains('icon-close')) {
            const product = e.target.closest('.cart-product');
            const title = product.querySelector('.titulo-producto-carrito').textContent;
            allProducts = allProducts.filter(product => product.title !== title);
            showHTML();
        }
    });
// Función para mostrar el contenido del carrito en la interfaz
    const showHTML = () => {
        if (!allProducts.length) {
            // Si el carrito está vacio, muestra el carrito vacio y oculta otros elementos
            cartEmpty.classList.remove('hidden');
            rowProduct.classList.add('hidden');
            cartTotal.classList.add('hidden');
        } else {
             // Si hay productos en el carrito, muestra la lista de productos y el total
            cartEmpty.classList.add('hidden');
            rowProduct.classList.remove('hidden');
            cartTotal.classList.remove('hidden');
        }

        rowProduct.innerHTML = '';

        let total = 0;
        let totalOfProducts = 0;
// Itera sobre cada producto en el carrito y muestra su información
        allProducts.forEach(product => {
            const containerProduct = document.createElement('div');
            containerProduct.classList.add('cart-product');

            containerProduct.innerHTML = `
                <div class="info-cart-product"> 
                    <span class="cantidad-producto-carrito">${product.quantity}</span>
                    <p class="titulo-producto-carrito">${product.title}</p>
                    <span class="precio-producto-carrito">${product.price}</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-close" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>`;

            rowProduct.append(containerProduct);
            // Calcula el total de la compra y el numero total de productos en el carrito
            total += parseFloat(product.price) * product.quantity;
            totalOfProducts += product.quantity;
        });

        valorTotal.innerText = `$${total.toFixed(2)}`;
        countProducts.innerText = totalOfProducts;
    };

    const btnFinalizarCompra = document.querySelector('#btn-finalizar-compra');

    btnFinalizarCompra.addEventListener('click', () => {
        // Convierte  los datos del carrito a una cadena JSON
        const datosCarritoJSON = JSON.stringify(allProducts);
        const total = calcularTotal(allProducts);
        

        // Establece el valor del input "datos-carrito" con los datos del carrito
        document.querySelector('#datos-carrito').value = datosCarritoJSON;
        document.querySelector('#total-pagar').value = total;

        // Enviar el formulario
        document.querySelector('#form-detalles-compra').submit();
        
    });


    // Función para calcular el total de la compra
        function calcularTotal(products) {
            let total = 0;
            products.forEach(product => {
                total += parseFloat(product.price) * product.quantity;
            });
            return total.toFixed(2); // Devuelve el total con dos decimales
        }
    
    
});
