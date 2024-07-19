const list = document.querySelector('#mood_list');
const modal = document.querySelector('.modal');
const warning = document.querySelector('#warn_text');
const search = document.querySelector('#search');
const description = document.querySelector('#mood_description');

const add = document.querySelector('#add');
const edit = document.querySelector('#edit');

const clearButton = document.querySelector('#clear_button');
const editButton = document.querySelector('#edit_button');
const deleteButton = document.querySelector('#delete_button');

let moodData;
let searchData;
let moodValue;
let selectedMoods = [];
const endpoint = './api.php';

function displayModal(buttonName='add') {
    if(buttonName == 'add') {
        showButton('add');    
    } else {
        showButton('edit');
    }

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

    const data = post(endpoint,{
        'mood_status' : moodValue,
        'mood_description' : description.value
    });
    
    location.reload();
}

async function editMood() {
    console.log(selectedMoods[0].id)
    const response = await fetch(endpoint, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: selectedMoods[0].id,
            status: moodValue,
            description: description.value
        })
    });

    await getMoods();
    removeModal();
}

function showButton(buttonName) {
    switch(buttonName) {
        case 'add': 
            add.classList.remove('none');
            edit.classList.add('none');
            break;
        case 'edit': 
            edit.classList.remove('none');
            add.classList.add('none');
            break;
    }
}

async function getMoods() {
    const response = await fetch(endpoint);
    const data = await response.json();
    moodData = data;
    
    searchMoods();
    sortDate();
}
getMoods();

function displayMoodList() {
    list.innerHTML = '';

    for(const item of searchData) {
        const row = document.createElement('button');
        row.id = item.mood_id;
        row.classList.add('card-list');
        const date = new Date(item.datetime_created).toLocaleString()

        row.innerHTML = `
            <div>
                <img src="../assets/images/mood_${item.mood_status}.png" 
                    alt="emoji">
            </div>
            <div class="text-left">${item.mood_description}</div>
            <div class="bottom-right">${date}</div>`;
        row.onclick = selectMoods;
        list.append(row);
    }
}

function set(button) {
    if(button?.classList.contains('card-selected')) {
        button.classList.remove('card-selected');
        return;
    }

    const moodButtons = document.querySelectorAll('.mood-btn');
    for(const moodButton of moodButtons) {
        moodButton.classList.remove('card-selected');
    }

    moodValue = button?.value;
    button?.classList.add('card-selected');

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

    searchData.sort((a, b) => {
		if (sortInput.value == ascending) {
			return new Date(a.datetime_created) - new Date(b.datetime_created);
		} else {
			return new Date(b.datetime_created) - new Date(a.datetime_created);
		}
	});

    displayMoodList();
}

function filterMood() {
    const filterInput = document.querySelector('#filter_mood');

    list.innerHTML = '';

    for(const item of searchData) {
        if(filterInput.value != 'all' && filterInput.value != item.mood_status) 
            continue;

        const row = document.createElement('button');
        row.classList.add('card-list');
        const date = new Date(item.datetime_created).toLocaleString()

        row.innerHTML = `
            <div>
                <img src="../assets/images/mood_${item.mood_status}.png" 
                    alt="emoji">
            </div>
            <div class="text-left">${item.mood_description}</div>
            <div class="bottom-right">${date}</div>`;
        row.onclick = selectMoods;
        list.append(row);
    }
}

function searchMoods() {
    searchData = moodData.filter((item) => {
        return item.mood_description.includes(search.value);
    });
    
    selectedMoods = [];
    sortDate();
}

function selectMoods(event) {
    const button = event.currentTarget;
   
    if(button.classList.contains('card-selected')) {
        selectedMoods = selectedMoods.filter(item => item.id !== button.id);
        button.classList.remove('card-selected');
        
        if(selectedMoods.length == 1) 
            editButton.classList.remove('none');
        if(selectedMoods.length == 0) {
            clearButton.classList.add('none');
            editButton.classList.add('none');
            deleteButton.classList.add('none');
        }
        return;
    } 

    selectedMoods.push(button);

    button.classList.add('card-selected');
    clearButton.classList.remove('none');
    editButton.classList.remove('none');
    deleteButton.classList.remove('none');
    
    if(selectedMoods.length > 1)
        editButton.classList.add('none');
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
    console.log(moodValue)
    const statusButton = document.querySelector(`#mood_${moodValue}`);
    const descriptionText = document.querySelector('#mood_description');
    descriptionText.value = rowData.mood_description;
    set(statusButton);
    displayModal('edit');
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