let carts = document.querySelectorAll('.add-cart');


//Array of Items
//Changing of prices, etc happens here

let products = [
    {
        name: 'Propeller Hat',
        tag: 'hat',
        price: 5,
        inCart: 0
    },
    {
        name: '6 Pack Shirt',
        tag: '6pack',
        price: 69,
        inCart: 0
    },
    {
        name: 'French Fry Pants',
        tag: 'pants',
        price: 12,
        inCart: 0
    },
    {
        name: 'Fish Slippers',
        tag: 'shoes',
        price: 25,
        inCart: 0
    }
];

for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    });
}

//Loads numbers of items on cart

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if (productNumbers) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

//Stores items, and the amount of items added / changed

function cartNumbers(product, action) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if (action) {
        localStorage.setItem("cartNumbers", productNumbers - 1);
        document.querySelector('.cart span').textContent = productNumbers - 1;
        console.log("action running");
    } else if (productNumbers) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem("cartNumbers", 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

//Adds item to the cart

function setItems(product) {
    // let productNumbers = localStorage.getItem('cartNumbers');
    // productNumbers = parseInt(productNumbers);
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {
        let currentProduct = product.tag;

        if (cartItems[currentProduct] == undefined) {
            cartItems = {
                ...cartItems,
                [currentProduct]: product
            }
        }
        cartItems[currentProduct].inCart += 1;

    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        };
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

//Calculates total cost of all items and or single item

function totalCost(product, action) {
    let cart = localStorage.getItem("totalCost");

    if (action) {
        cart = parseInt(cart);

        localStorage.setItem("totalCost", cart - product.price);
    } else if (cart != null) {

        cart = parseInt(cart);
        localStorage.setItem("totalCost", cart + product.price);

    } else {
        localStorage.setItem("totalCost", product.price);
    }
}
//Displays which items are in the cart

function displayCart() {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    let cart = localStorage.getItem("totalCost");
    cart = parseInt(cart);

    let productContainer = document.querySelector('.products');

    if (cartItems && productContainer) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map((item, index) => {
            productContainer.innerHTML +=
                `<div class="product"><src=".\images${item.tag}" />
                <span class="sm-hide">${item.name}</span>
            </div>
            <div class="price sm-hide">$${item.price}</div>
            <div class="quantity">
                    <span>${item.inCart}</span>  
            </div>
            <div class="total">$${item.inCart * item.price}</div>`;
        });

        productContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class="basketTotalTitle">Basket Total</h4>
                <h4 class="basketTotal">$${cart}</h4>
            </div>`

    }
   
function clearCart() {
 
    localStorage.removeItem("cartNumbers");
    localStorage.removeItem("productsInCart");
    localStorage.removeItem("totalCost");
  
  
    document.querySelector('.cart span').textContent = 0;
  
   
    let productContainer = document.querySelector('.products');
    if (productContainer) {
      productContainer.innerHTML = '';
    }
  }
  

  let clearCartButton = document.createElement("button");
  clearCartButton.textContent = "Clear Cart";
  
  clearCartButton.addEventListener("click", clearCart);
  document.body.appendChild(clearCartButton);
  

}



onLoadCartNumbers();
displayCart();

