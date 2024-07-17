const title = document.querySelector('#title');
const todo = document.querySelector('#todo');
const progress = document.querySelector('#in_progress');
const completed = document.querySelector('#completed');
let taskData;

const endpoint = './api.php';

function displayModal() {
    modal.classList.add('display');
}

function getTaskId() {
    const urlParams = new URLSearchParams(window.location.search);
    const taskId = urlParams.get('task_id');
    return taskId;
}

function addTaskInput(task='') {
    const newTask = document.createElement('div');
    newTask.classList.add('flex');
    newTask.innerHTML = `
        <input type="checkbox">
        <input type="text" class="task-card" value="${task}">
        <button class="delete-icon"></button>`;
    
    const [checkbox, input, remove] = newTask.children;

    remove.addEventListener('click', () => {
        newTask.remove();
        updateTask();
    });

    checkbox.addEventListener('click', () => {
        const parent = newTask.parentNode;

        if(parent.id == 'in_progress') {
            swapTask(newTask,completed);
        }
        else {
            swapTask(newTask,progress);
            checkbox.checked = false;
        }        

        updateTask();
    });

    input.addEventListener('blur', () => {
        updateTask();
    });

    return newTask;
}

async function getTasks() {
    const taskId = getTaskId();
    const data = await customFetch(`${endpoint}?task_id=${taskId}`, 'GET');
    taskData = data;
    populateTasks();
}
getTasks();

function populateTasks() {
    const todoData = (taskData.todo)? JSON.parse(taskData.todo) : [];
    const progressData = (taskData.in_progress)? JSON.parse(taskData.in_progress): [];
    const completedData = (taskData.completed)? JSON.parse(taskData.completed): [];

    title.value = taskData.title;

    for(const item of todoData) {
        const input = addTaskInput(item);
        todo.append(input);
    }

    for(const item of progressData) {
        const input = addTaskInput(item);
        progress.append(input);
    }

    for(const item of completedData) {
        const input = addTaskInput(item);
        const checkbox = input.children[0];
        checkbox.checked = true;
        completed.append(input);
    }
}

function addToDo() {
    todo.append(addTaskInput());
}

function updateTask() {
    const data = customFetch(endpoint, 'PATCH', getJSON());
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

function swapTask(target, destination) {
    destination.append(target);
}

function getJSON() {
    const json = {
        id: getTaskId(),
        title: title.value,
        todo: [],
        progress: [],
        completed: []
    };

    for(const item of todo.children) {
        json.todo.push(item.children[1].value);
    }

    for(const item of progress.children) {
        json.progress.push(item.children[1].value);
    }

    for(const item of completed.children) {
        json.completed.push(item.children[1].value);
    }

    return json;
}