const STATUS_TYPE = {
    SUCCESS: 'success',
    WARN: 'warn'
};

const messageText = document.querySelector('#message');

const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');
let type = urlParams.get('type');

if(!type) { 
    type = STATUS_TYPE.WARN;
}

if(message) {
    messageText.classList.add(type);
    alert(message);
}