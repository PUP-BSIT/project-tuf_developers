const journals = document.querySelector("#journals");
const endpoint = './api.php';
let journalData;

fetch(endpoint)
	.then((result) => result.json())
	.then((data) => {
		journalData = data;
        displayJournals();
	});