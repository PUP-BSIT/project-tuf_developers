function downloadCode() {
    const code = document.querySelector('#code').value;

    const blob = new Blob([code], { type: 'text/plain' });

    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'backup_code.txt';

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

if(message) {
    alert(message);
}