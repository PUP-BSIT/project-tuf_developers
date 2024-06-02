const journals = document.querySelector("#journals");
let journalData;

fetch("./apis/get_journals.php")
	.then((result) => result.json())
	.then((data) => {
		journalData = data;
        displayJournals();
	});

function displayJournals() {
    const FIELD = {
        JOURNAL_ID: 0,
        USER_ID: 1,
        TITLE: 2,
        CONTENT: 3,
        STICKER: 4
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
        
        const {editButton, deleteButton} = createActionButtons(
            item[FIELD.JOURNAL_ID]);
        
        const editColumn = document.createElement('td');
        editColumn.append(editButton);
        const deleteColumn = document.createElement('td');
        deleteColumn.append(deleteButton);

        row.append(editColumn);
        row.append(deleteColumn);
        
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
    window.location.replace(`./edit_journal.php?journal_id=${journalId}`);
}

async function deleteJournal(journalId) {
    const formBody = new FormData();
    formBody.append('journal_id',journalId);
    const data = { method: 'POST', body: formBody };

    await fetch('./apis/delete_journal.php', data)
        .then((data) => console.log(data.text()))

    window.location.reload();
}