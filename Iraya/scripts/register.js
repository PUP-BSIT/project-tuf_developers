const form = document.querySelector('form');
const username = document.querySelector('#username');
const password = document.querySelector('#password');
const confirm = document.querySelector('#confirm');

const usernameMessage = document.querySelector('#username_message');
const passwordMessage = document.querySelector('#password_message');
const confirmMessage = document.querySelector('#confirm_message');

let isPasswordValid = false;

function validateUsername() {
    if(username.value.length < 2) {
        usernameMessage.textContent = `Username must be at least 2 or more 
            characters`;
        return;
    } 
    usernameMessage.textContent = '';
}

async function validatePassword(input) {
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

function register(event) {
    validateUsername();
    validatePassword();
    event.preventDefault();

    if(!isPasswordValid)
        return;
    
    event.target.submit();
}

form.addEventListener('submit',register);