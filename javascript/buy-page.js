
let quantity = document.getElementById('quantity');
let add = document.getElementById('add');
let sub = document.getElementById('sub');

quantity.addEventListener('input', showCount);

add.addEventListener('click', increment);

sub.addEventListener('click', decrement);

quantity.addEventListener('keypress', isNumberKey);


function showCount(){
    var x = quantity.value;
    if(x <= 1){
        quantity.value = 1;
    }else if(x >= 99){
        quantity.value = 99;
    }
    // show.innerHTML = quantity.value;
}

function increment(){
    quantity.value++;
    showCount();
}

function decrement(){
    quantity.value--;
    showCount();
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
