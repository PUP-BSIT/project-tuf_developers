const journals = document.querySelector("#journals");
const search = document.querySelector("#search");

const clearButton = document.querySelector("#clear_button");
const editButton = document.querySelector("#edit_button");
const deleteButton = document.querySelector("#delete_button");

const endpoint = "./api.php";
let journalData;
let searchData;
let selectedJournals = [];

fetch(endpoint)
	.then((result) => result.json())
	.then((data) => {
		journalData = data;
		displayJournals();
	});

function displayJournals() {
	journals.innerHTML = "";

	const FIELD = {
		JOURNAL_ID: 0,
		USER_ID: 2,
		TITLE: 3,
		CONTENT: 4,
		DATE_CREATED: 5,
		DATE_UPDATED: 6,
	};

	for (item of searchData) {
		const row = document.createElement("button");
		row.id = item[FIELD.JOURNAL_ID];
		row.classList.add("card-list");

		const date = new Date(item[FIELD.DATE_UPDATED]).toDateString();

		row.innerHTML = `
                <div class="pad-1 strong"> ${item[FIELD.TITLE]} </div>
                <div class="flex center pad-1 width-100 text-left">
                    <div>${item[FIELD.CONTENT]}</div>
                </div>
                <div>${date}</div>`;

		row.onclick = selectJournal.bind(null, item[FIELD.JOURNAL_ID]);
		journals.append(row);
	}
}

function editJournal(journalId) {
	const edit_endpoint = "edit_journal.php";
	window.location.replace(`./${edit_endpoint}?journal_id=${journalId}`);
}

function searchJournals() {
	searchData = journalData.filter((item) => {
		return (
			item[3].includes(search.value) ||
			item[4].includes(search.value)
		);
	});

	selectedJournals = [];
	sortDate();
}

function selectJournal(journalId, event) {
	const button = event.currentTarget;

	if (button.classList.contains("card-selected")) {
		selectedJournals = selectedJournals.filter(
			(item) => item.id !== button.id
		);
		button.classList.remove("card-selected");

		if (selectedJournals.length == 1)
			editButton.classList.remove("none");
		if (selectedJournals.length == 0) {
			clearButton.classList.add("none");
			editButton.classList.add("none");
			deleteButton.classList.add("none");
		}
		return;
	}

	selectedJournals.push(button);

	button.classList.add("card-selected");
	clearButton.classList.remove("none");
	editButton.classList.remove("none");
	deleteButton.classList.remove("none");

	if (selectedJournals.length > 1) editButton.classList.add("none");

	const edit_endpoint = "edit_journal.php";
	editButton.onclick = () => {
		location.replace(`./${edit_endpoint}?journal_id=${journalId}`);
	};
}

function clearAllSelection() {
	for (const button of selectedJournals) {
		button.classList.remove("card-selected");
	}

	selectedJournals = [];
	clearButton.classList.add("none");
	editButton.classList.add("none");
	deleteButton.classList.add("none");
}

async function deleteAllSelection() {
	for (const item of selectedJournals) {
		await fetch(endpoint, {
			method: "DELETE",
			headers: {
				"Content-type": "application/x-www-form-urlencoded",
			},
			body: `journal_id=${item.id}`,
		});
	}

	window.location.reload();
}

function sortDate() {
	const sortInput = document.querySelector("#sort_journals");
	const SORTDATE = {
		ASCENDING: "date_ascending",
		DESCENDING: "date_descending",
	};

	searchData.sort((a, b) => {
		if (sortInput.value == SORTDATE.ASCENDING) {
			return new Date(a[6]) - new Date(b[6]);
		} else {
			return new Date(b[6]) - new Date(a[6]);
		}
	});

	displayJournals();
}