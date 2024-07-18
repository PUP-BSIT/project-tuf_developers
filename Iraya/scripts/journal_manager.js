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
        displayJournals();
	});
    
function displayJournals() {
    const FIELD = {
        JOURNAL_ID: 0,
        USER_ID: 2,
        TITLE: 3,
        CONTENT: 4
    };

    for(item of journalData) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                ${item[FIELD.TITLE]}
            </td>
            <td>
                ${item[FIELD.CONTENT]}
            </td>`;
        
        const {viewButton, editButton, deleteButton} = createActionButtons(
            item[FIELD.JOURNAL_ID]);
        
        const viewColumn = document.createElement('td');
        viewColumn.append(viewButton);
        const editColumn = document.createElement('td');
        editColumn.append(editButton);
        const deleteColumn = document.createElement('td');
        deleteColumn.append(deleteButton);

        row.append(viewColumn);
        row.append(editColumn);
        row.append(deleteColumn);
        
        journals.append(row);
    }
}

function createActionButtons(journalId) {
    const viewButton = document.createElement('button');
    const editButton = document.createElement('button');
    const deleteButton = document.createElement('button'); 

    viewButton.textContent = 'View';
    editButton.textContent = 'Edit';
    deleteButton.textContent = 'Delete';

    viewButton.addEventListener('click', () => viewJournal(journalId));
    editButton.addEventListener('click', () => editJournal(journalId));
    deleteButton.addEventListener('click', () => deleteJournal(journalId));

    return { viewButton, editButton, deleteButton };
}

function viewJournal(journalId) {
    const view_endpoint = 'view_journal.php';
    window.location.replace(`./${view_endpoint}?journal_id=${journalId}`);
}

function editJournal(journalId) {
    const edit_endpoint = 'edit_journal.php';
    window.location.replace(`./${edit_endpoint}?journal_id=${journalId}`);
}

async function deleteJournal(journalId) {
    const options = {
        method: 'DELETE',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `journal_id=${journalId}`
    };

    const response = await fetch(endpoint, options);
    const data = await response.text();

    window.location.replace('./journal_manager.php');
}