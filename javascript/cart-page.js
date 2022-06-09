let quantity = document.querySelectorAll('.product__quantity');

let allProductsTotal = document.querySelectorAll('.cart__product-total');
let orderSubtotal = document.querySelector('#subtotal span');
let orderTotal = document.querySelector('#total span');


quantity.forEach(function(element) {
    element.addEventListener('keypress', (e) => {
        var charValue = String.fromCharCode(e.which);
        if(charValue.match(/\d/) == null){
            e.preventDefault();
        }
    });
    // element.addEventListener('change', function(e) {
    //     if (e.target.value === '') {
    //         e.target.value = 1;
    //     }
    // });
});


function updateQuantityIn(el,product_name){
    let value = el.value;

    updateValues(product_name,value);
    changeQuantityWithValue(product_name,value);
}
function updateQuantityCh(e,product_name){
    let value = e.target.value;
    if (e.target.value === '') {
        e.target.value = 1;
        value = 1;
        updateValues(product_name,value);
        changeQuantityWithValue(product_name,value);
    }
}

function increment(product_name){
    let quantity_product = document.getElementById(`quantity_${product_name}`);

    let value = quantity_product.value;
    if(value >= 99){
        quantity_product.value = 99;
    }else {
        quantity_product.value++;
        updateValues(product_name,quantity_product.value);
        changeCart('increment', product_name);
    }
}

function decrement(product_name){
    let quantity_product = document.getElementById(`quantity_${product_name}`);
    if(quantity_product.value <= 1){
        quantity_product.value = 1;
    }else {
        quantity_product.value--;
        updateValues(product_name,quantity_product.value);
        changeCart('decrement', product_name);
    }
}

function isNumberKey(e){
    var charValue = String.fromCharCode(e.which);
    if(charValue.match(/\d/) == null){
        e.preventDefault();
    }
}

function changeCart(func,product_name){
    const request = new XMLHttpRequest();
    const vars = `func=${func}&name=${product_name}`;

    request.open('post', `cart_functions.php`, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(vars);
}

function updateValues(product_name,inputValue){
    inputValue = inputValue === '' ? 1 : inputValue;
    let subtotal = 0;
    let price = document.getElementById(`price__${product_name}`);
    let total = document.getElementById(`total__${product_name}`);
    total.innerHTML = convertToCurrency((parseFloat(price.innerHTML.substring(1)) * parseFloat(inputValue)));

    allProductsTotal.forEach(function (el){
        let valueCurrency = el.innerHTML;
        let regex = /([+-]?[0-9|^.|^,]+)[\.|,]([0-9]+)$/igm
        let result = regex.exec(valueCurrency);
        let value = result? result[1].replace(/[.,]/g, "")+ "." + result[2] : valueCurrency.replace(/[^0-9-+]/g, "");
        subtotal += parseFloat(value);
        console.log('amount '+value);
        console.log('subtotal '+subtotal);
    });

    orderSubtotal.innerHTML = convertToCurrency(subtotal);
    orderTotal.innerHTML = convertToCurrency(subtotal + 30 );

}

function convertToCurrency(value){
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2
    });
    return formatter.format(value);
}

function changeQuantityWithValue(product_name,value) {
    const request = new XMLHttpRequest();
    const vars = `value=${value}&name=${product_name}`;

    request.open('post', `cart_functions.php`, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.send(vars);
}

function toHome(){
    window.location = "index.php";
}

function deleteItem(product_name){
    changeCart('delete',product_name);
    window.location = "cart.php";
}

function makeOrder(isLogged){
    let logged = Boolean(isLogged);

    if(logged){
        placeOrder();
        window.location = "index.php";
    }
}

function placeOrder(){
    const request = new XMLHttpRequest();
    const vars = 'func=placeOrder';
    request.open('post', `cart_functions.php`, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(vars);
    console.log(request);

}




//
// element.addEventListener('keydown', (e) => {
//     var key = e.keyCode || e.charCode;
//     console.log('value of down '+element.value)
//     if(key === 8 && element.value === '1'){
//         e.preventDefault();
//     }
// })
// });