const list = document.querySelector('#mood_list');
const modal = document.querySelector('.modal');
const warning = document.querySelector('#warn_text');
const clearButton = document.querySelector('#clear_button');
const editButton = document.querySelector('#edit_button');
const deleteButton = document.querySelector('#delete_button');

let moodData;
let moodValue;
let selectedMoods = [];
const endpoint = './api.php';

function displayModal() {
    modal.classList.add('display');
}

function removeModal(event) {
    if (event && event?.target != modal) return;

    modal.classList.remove('display');
    set();
}

window.onclick = removeModal;

function addMood() {
    if(!moodValue) {
        warning.textContent = 'Please select a mood';
        return;
    }

    const description = document.querySelector('#mood_description');
    const data = post(endpoint,{
        'mood_status' : moodValue,
        'mood_description' : description.value
    });
    
    location.reload();
}

async function getMoods() {
    const response = await fetch(endpoint);
    const data = await response.json();
    moodData = data;

    sortDate();
}
getMoods();

function displayMoodList() {
    list.innerHTML = '';

    for(const item of moodData) {
        const row = document.createElement('button');
        row.id = item.mood_id;
        row.classList.add('card-list');
        const date = new Date(item.datetime_created).toLocaleString()

        row.innerHTML = `
            <div>
                <img src="../assets/images/${item.mood_status}.png" 
                    alt="emoji">
            </div>
            <div class="text-left">${item.mood_description}</div>
            <div class="bottom-right">${date}</div>
            <div>
                <img>
            </div>`;
        row.onclick = selectMoods;
        list.append(row);
    }
}

function set(button) {
    if(button?.classList.contains('mood-btn-selected')) {
        button.classList.remove('mood-btn-selected');
        return;
    }

    const moodButtons = document.querySelectorAll('.mood-btn');
    for(const moodButton of moodButtons) {
        moodButton.classList.remove('mood-btn-selected');
    }

    moodValue = button?.value;
    button?.classList.add('mood-btn-selected');

    warning.textContent = '';
}

async function post(endpoint, data) {
    const options = {
        method: 'POST',
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(data)
    };
    const response = await fetch(endpoint,options);
    return await response.json();
}

function sortDate() {
    const sortInput = document.querySelector('#sort_mood');
    const ascending = "date_ascending";

    moodData.sort((a, b) => {
		if (sortInput.value == ascending) {
			return new Date(a.datetime_updated) - new Date(b.datetime_updated);
		} else {
			return new Date(b.datetime_updated) - new Date(a.datetime_updated);
		}
	});

    displayMoodList();
}

function filterMood() {
    const filterInput = document.querySelector('#filter_mood');

    list.innerHTML = '';

    for(const item of moodData) {
        if(filterInput.value != 'all' && filterInput.value != item.mood_status) 
            continue;

        const row = document.createElement('button');
        row.classList.add('card-list');
        const date = new Date(item.datetime_created).toLocaleString()

        row.innerHTML = `
            <div>
                <img src="../assets/images/${item.mood_status}.png" 
                    alt="emoji">
            </div>
            <div class="text-left">${item.mood_description}</div>
            <div class="bottom-right">${date}</div>
            <div>
                <img>
            </div>`;
        row.onclick = selectMoods;
        list.append(row);
    }

}

function searchMoods() {

}

function selectMoods(event) {
    const button = event.currentTarget;

    if(button.classList.contains('mood-btn-selected')) {
        selectedMoods = selectedMoods.filter(item => item.id !== button.id);
        button.classList.remove('mood-btn-selected');
        
        if(selectedMoods.length == 0) {
            clearButton.classList.add('none');
            editButton.classList.add('none');
            deleteButton.classList.add('none');
        }
        return;
    } 

    selectedMoods.push(button);

    button.classList.add('mood-btn-selected');
    clearButton.classList.remove('none');
    editButton.classList.remove('none');
    deleteButton.classList.remove('none');
    
    if(selectedMoods.length > 1)
        editButton.classList.add('none');
}

function clearAllSelection() {
    for(const button of selectedMoods) {
        button.classList.remove('mood-btn-selected');
    }

    selectedMoods = [];
    clearButton.classList.add('none');
    editButton.classList.add('none');
    deleteButton.classList.add('none');
}

async function editSelection() {
    const button = selectedMoods[0];
    let rowData;

    for(const i in moodData) {
        if(moodData[i].mood_id == button.id) {
            rowData = moodData[i];
            break;
        } 
    }

    if(!rowData) return;

    moodValue = rowData.mood_status;
    const statusButton = document.querySelector(`#${moodValue}`);
    const descriptionText = document.querySelector('#mood_description');
    descriptionText.value = rowData.mood_description;
    set(statusButton);
    displayModal();
}

async function deleteSelection() {
    for(const item of selectedMoods) {
        await fetch(endpoint, {
            method: 'DELETE',
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
            },
            body: `mood_id=${item.id}`
        });
    }

    window.location.reload();
}