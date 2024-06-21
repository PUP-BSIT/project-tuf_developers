const journalTitle = document.querySelector('#journal_title');
const journalContent = document.querySelector('#journal_content');
const sticker = document.querySelector('#sticker');
const endpoint = './api.php';
let journalData;

fetch(endpoint)
	.then((result) => result.json())
	.then((data) => {
		journalData = data;
        displaySticker();
	});

function displaySticker() {
    const id = getParameter('journal_id');

    for(const item of journalData) {
        if (item[0] == id) {
            sticker.src = `./assets/images/${item[4]}.png`;
        }
    }
}

function getParameter(parameter) {
    const url = new URLSearchParams(window.location.search);
    return url.get(parameter);
}