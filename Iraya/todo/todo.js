const taskList = document.querySelector('#task_list'); 
const endpoint = './api.php';
let taskData;

async function getTasks() {
    const data = await customFetch(endpoint);
    taskData = data;
    displayTasks();
}
getTasks();


function displayTasks() {
    taskList.innerHTML = '';

    for(const item of taskData) {
        const todo = (item.todo)? JSON.parse(item.todo) : '';
        const progress = (item.in_progress)? JSON.parse(item.in_progress) : '';
        const completed = (item.completed)? JSON.parse(item.completed) : '';

        const row = document.createElement('div');
        row.innerHTML = `
            <div class="card fit inverted">
                <div class="flex right">
                    <button class="more-icon inverted-btn"></button>
                </div>
                <div class="dropdown-content none">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>

                <div class="btn inverted-btn">
                    To-Do: ${todo.length}
                </div>
                <div class="btn inverted-btn">
                    In Progress: ${progress.length}
                </div>
                <div class="btn inverted-btn">
                    Completed: ${completed.length}
                </div>
            </div>`;
        const more = row.querySelector('.more-icon');
        const dropdown = row.querySelector('.dropdown-content');
        const buttons = row.querySelectorAll('.btn');

        more.addEventListener('click', () => {
            dropdown.classList.remove('none');
        });

        for(const button of buttons) {
            button.addEventListener('click', () => {
                window.location.replace(`add_task.php?task_id=${item.task_id}`);
            });
        }

        taskList.append(row);
    }
}

async function customFetch(endpoint, method='GET', data) {
    const options = {
        method: method,
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

   // displayMoodList();
}

async function newTask() {
    const data = await customFetch(endpoint,'POST');
    window.location.replace(`add_task.php?task_id=${data.task_id}`);
}

window.onclick = () => {
    console.log('test');
    const dropdowns = document.querySelectorAll('.dropdown-content');
    for(const item of dropdowns){
        console.log(item)
        item.classList.add('none');
    }
};