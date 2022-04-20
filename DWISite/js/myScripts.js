//Adds click event to hamburger icon - Runs toggles a class to create dropdown!
var hamburger = document.getElementsByClassName('hamburger');
var nav = document.querySelector('.navContent');

hamburger[0].addEventListener("click", () => {
	nav.classList.toggle("navContentShow");
});




var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;