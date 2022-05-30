let failedToSignIn = Boolean(document.getElementById("failed_sign_in").value);
if(failedToSignIn){
   document.getElementById("email").disabled = true;
   document.getElementById("password").disabled = true;
   document.getElementById("submit").disabled = true;
}