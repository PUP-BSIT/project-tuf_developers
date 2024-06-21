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