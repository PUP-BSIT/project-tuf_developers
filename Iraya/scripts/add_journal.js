const journalTitle = document.querySelector('#journal_title');
const journalContent = document.querySelector('#journal_content');

async function insertJournal() {
    const options = {
        method: 'POST',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `journal_title=${journalTitle.value}&\
            journal_content=${journalContent.value}`
    };

    const response = await fetch('./api.php', options);
    const data = await response.text();

    window.location.replace('./journal_manager.php');
}

function createEntry() {
  const notesContainer = document.querySelector('.notes-container');

  const newNote = document.createElement('div');
  newNote.className = 'note';
  
  const noteContent = document.createElement('p');
  noteContent.className = 'input-box';
  noteContent.contentEditable = 'true';
  
  const deleteIcon = document.createElement('img');
  deleteIcon.src = './assets/images/delete_image.png';
  deleteIcon.alt = 'delete_image';
  deleteIcon.onclick = function() {
    notesContainer.removeChild(newNote);
  };
  
  noteContent.appendChild(deleteIcon);
  newNote.appendChild(noteContent);
  notesContainer.appendChild(newNote);
}