const journals = document.querySelector("#journals");
const search = document.querySelector('#search');

const clearButton = document.querySelector('#clear_button');
const editButton = document.querySelector('#edit_button');
const deleteButton = document.querySelector('#delete_button');

const endpoint = './api.php';
let journalData;
let searchData;
let selectedJournals = [];

fetch(endpoint)
	.then((result) => result.json())
	.then((data) => {
		journalData = data;
        
        searchJournals();
	});
    
function displayJournals() {
    journals.innerHTML = '';

    const FIELD = {
        JOURNAL_ID: 0,
        USER_ID: 2,
        TITLE: 3,
        CONTENT: 4
    };

    for(item of searchData) {
        const row = document.createElement('button');
        row.id = item[FIELD.JOURNAL_ID];
        row.classList.add('card-list');
        row.innerHTML = `
            <div class="pad-1 strong"> ${item[FIELD.TITLE]} </div>
            <div class="pad-1"> ${item[FIELD.CONTENT]} </div>`;
        
        const {editButton, deleteButton} = createActionButtons(
            item[FIELD.JOURNAL_ID]);
        
        const actionColumn = document.createElement('div');
        actionColumn.classList.add('flex','center','pad-1');
        actionColumn.append(editButton);
        actionColumn.append(deleteButton);

        row.onclick = selectJournal.bind(null, item[FIELD.JOURNAL_ID]);

        journals.append(row);
    }
}

function createActionButtons(journalId) {
    const editButton = document.createElement('button');
    const deleteButton = document.createElement('button'); 

    editButton.textContent = 'Edit';
    deleteButton.textContent = 'Delete';

    editButton.addEventListener('click', () => editJournal(journalId));
    deleteButton.addEventListener('click', () => deleteJournal(journalId));

    return { editButton, deleteButton };
}

function editJournal(journalId) {
    const edit_endpoint = 'edit_journal.php';
    window.location.replace(`./${edit_endpoint}?journal_id=${journalId}`);
}

function searchJournals() {
    searchData = journalData.filter((item) => {
        return item[4].includes(search.value) ||
            item[5].includes(search.value);
    });
    
    selectedJournals = [];
    displayJournals();
}

function selectJournal(journalId, event) {
    const button = event.currentTarget;

    if(button.classList.contains('card-selected')) {
        selectedJournals = selectedJournals.filter(item => item.id !== button.id);
        button.classList.remove('card-selected');
        
        if(selectedJournals.length == 1)
            editButton.classList.remove('none');
        if(selectedJournals.length == 0) {
            clearButton.classList.add('none');
            editButton.classList.add('none');
            deleteButton.classList.add('none');
        }
        return;
    } 

    selectedJournals.push(button);

    button.classList.add('card-selected');
    clearButton.classList.remove('none');
    editButton.classList.remove('none');
    deleteButton.classList.remove('none');
    
    if(selectedJournals.length > 1)
        editButton.classList.add('none');

    const edit_endpoint = 'edit_journal.php';
    editButton.onclick = () => {
        location.replace(`./${edit_endpoint}?journal_id=${journalId}`);
    };
}

function clearAllSelection() {
    for(const button of selectedMoods) {
        button.classList.remove('card-selected');
    }

    selectedMoods = [];
    clearButton.classList.add('none');
    editButton.classList.add('none');
    deleteButton.classList.add('none');
}

async function deleteAllSelection() {
    for(const item of selectedJournals) {
        await fetch(endpoint, {
            method: 'DELETE',
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
            },
            body: `journal_id=${item.id}`
        });
    }

    window.location.reload();
}