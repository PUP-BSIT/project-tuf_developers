const taskList = document.querySelector('#task_list'); 
const endpoint = './api.php';
let taskData;

async function getTasks() {
    const data = await customFetch(endpoint);
    taskData = data;
    sortDate();
}
getTasks();


function displayTasks() {
    taskList.innerHTML = '';

    for(const item of taskData) {
        const todo = (item.todo)? JSON.parse(item.todo) : '';
        const progress = (item.in_progress)? JSON.parse(item.in_progress) : '';
        const completed = (item.completed)? JSON.parse(item.completed) : '';
        const dateTime = new Date(item.datetime_updated).toLocaleString();

        const row = document.createElement('div');
        row.innerHTML = `
            <div class="card fit inverted secondary">
                <div class="flex between">
                    <div>${item.title}</div>
                    <button class="delete-icon inverted-btn"></button>
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
                <div>${dateTime}</div>
            </div>`;
        const remove = row.querySelector('.delete-icon');
        const buttons = row.querySelectorAll('.btn');

        remove.addEventListener('click', () => {
            customFetch(endpoint, 'DELETE', { task_id: item.task_id });
            window.location.reload();
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
    const sortInput = document.querySelector('#sort_tasks');
    const ascending = "date_ascending";

    taskData.sort((a, b) => {
		if (sortInput.value == ascending) {
			return new Date(a.datetime_updated) - new Date(b.datetime_updated);
		} else {
			return new Date(b.datetime_updated) - new Date(a.datetime_updated);
		}
	});

    displayTasks();
}

async function newTask() {
    const data = await customFetch(endpoint,'POST');
    window.location.replace(`add_task.php?task_id=${data.task_id}`);
}

window.onclick = (event) => {
    if(event.target.classList.contains('more-icon')) return;

    const dropdowns = document.querySelectorAll('.dropdown-content');
    for(const item of dropdowns){
        item.classList.add('none');
    }
};