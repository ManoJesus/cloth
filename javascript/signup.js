let firstName = document.querySelector("#first_name")
let last_name = document.querySelector("#last_name")
let email = document.querySelector("#email")
let password = document.querySelector("#password")
let cpassword = document.querySelector("#cpassword")
let form = document.querySelector("#form")



form.addEventListener("submit", (e) => {
    let errorMessage = document.querySelector(".form_error")

    if(isAnyFieldEmpty()){
        errorMessage.innerHTML = "Fields in red cannot be empty!"
        e.preventDefault()
    }
})

cpassword.addEventListener("keyup",() =>{
    let passwordNotMatched = document.querySelector(".password_error")
    if(cpassword.value !== password.value){
        passwordNotMatched.innerHTML = "Password must be equal!"
        document.getElementById("submit").disabled = true
    }else{
        passwordNotMatched.innerHTML = ""
        document.getElementById("submit").disabled = false
    }
})


function isAnyFieldEmpty() {
    let emptyFields = checkEmptyFields()
    if(emptyFields.length > 0) {
        emptyFields.forEach(e => {
            e.style.setProperty("--plc_coll", "red")
        })
        return true;
    }
    return false;
}

function checkEmptyFields(){
    let emptyField = [];
    if(firstName.value === "" || firstName.value == null){
        emptyField.push(firstName)
    }
    if(last_name.value === "" || last_name.value == null){
        emptyField.push(last_name)
    }
    if(email.value === "" || email.value == null){
        emptyField.push(email)
    }
    if(password.value === "" || password.value == null){
        emptyField.push(password)
    }
    if(cpassword.value === "" || cpassword.value == null){
        emptyField.push(cpassword)
    }
    return emptyField;
}





