const form = document.querySelector('form');
const journalId = document.querySelector('#journal_id');
const journalTitle = document.querySelector('#journal_title');
const journalContent = document.querySelector('#journal_content');

async function editJournal() {
    const options = {
        method: 'PATCH',
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        body: `journal_id=${journalId.value}&\
            journal_title=${journalTitle.value}&\
            journal_content=${journalContent.value}`
    };

    const response = await fetch('./api.php', options);
    const data = await response.text();

    window.location.assign('./journal_manager.php');
}