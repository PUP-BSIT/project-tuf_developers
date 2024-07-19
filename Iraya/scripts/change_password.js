const form = document.querySelector('form');
const username = document.querySelector('#username');
const password = document.querySelector('#password');
const confirm = document.querySelector('#confirm');

const usernameMessage = document.querySelector('#username_message');
const passwordMessage = document.querySelector('#password_message');
const confirmMessage = document.querySelector('#confirm_message');
const warn = document.querySelector('#message');

let isPasswordValid = false;

function validatePassword(input) {
    warn.innerHTML = '';

    const lowercase = /[a-z]/;
    const uppercase = /[A-Z]/;
    const digit = /\d/;
    const specialChar = /[@$!%*?&]/;

    if(password.value != confirm.value) {
        passwordMessage.textContent = ''; 
        confirmMessage.textContent = 'Passwords do not match';
    }
    else if(password.value.length < 8) {
        passwordMessage.textContent = confirmMessage.textContent =
            `Password must be at least 8 characters`;
    } 
    else if(!lowercase.test(input.value) || !uppercase.test(input.value) || 
        !digit.test(input.value) || !specialChar.test(input.value)) {

        passwordMessage.textContent = confirmMessage.textContent = `
            Password must have an upper and lower case character, at least 
            one digit, and a special character`;
    }
    else {
        passwordMessage.textContent = confirmMessage.textContent = '';
        isPasswordValid = true;
    }
}

function changePassword() {
    if(!isPasswordValid) {
        event.preventDefault();
        return;
    }

    alert('Password changed successfully!');
}

form.onsubmit = changePassword;

const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

if(message) {
    alert(message);
    location.replace('dashboard.php?');
}