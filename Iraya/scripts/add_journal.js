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