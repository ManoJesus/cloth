let quantity = document.querySelectorAll('.product__quantity');


quantity.forEach(function(element){
    element.addEventListener('keypress', isNumberKey);
});


function updateQuantity(el,product_name){
    function changeQuantityWithValue(product_name,value) {
        const request = new XMLHttpRequest();
        const vars = `value=${value}&name=${product_name}`;

        request.open('post', `cart_functions.php`, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
            console.log(request);
        }
        request.send(vars);
    }
    let value = el.value;
    console.log(value)
    changeQuantityWithValue(product_name,value);
}

function increment(product_name){
    let quantity_product = document.getElementById(`quantity_${product_name}`);
    if(quantity_product.value >= 99){
        quantity_product.value = 99;
    }else {
        quantity_product.value++;
        changeQuantity('increment', product_name);
    }
}

function decrement(product_name){
    let quantity_product = document.getElementById(`quantity_${product_name}`);
    if(quantity_product.value <= 1){
        quantity_product.value = 1;
    }else {
        quantity_product.value--;
        changeQuantity('decrement', product_name);
    }
}

function isNumberKey(e){
    var charValue = String.fromCharCode(e.which);
    if(charValue.match(/\d/) != null){
        if(quantity.value === 1){
            quantity.value = "";
        }
    }else{
        e.preventDefault();
    }

}

function changeQuantity(func,product_name){
    const request = new XMLHttpRequest();
    const vars = `func=${func}&name=${product_name}`;

    request.open('post', `cart_functions.php`, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function() {
        console.log(request);
    }
    request.send(vars);
}