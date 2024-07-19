const username = document.querySelector('#username').textContent;
const journal = document.querySelector('#journal');
const task = document.querySelector('#task');
const mood = document.querySelector('#mood');

const journalEndpoint = './api.php';
const taskEndpoint = './todo/api.php';
const moodEndpoint = './mood/api.php?type=week';

let journalData;
let taskData;
let moodData;

async function getData() {
    const journalResponse = await fetch(journalEndpoint);
    const taskResponse = await fetch(taskEndpoint);
    const moodResponse = await fetch(moodEndpoint);

    journalData = await journalResponse.json();
    taskData = await taskResponse.json(); 
    moodData = await moodResponse.json();

    const journalChart = occurences(journalData.map(i => i[6]), true);
    const taskChart = taskProgress(taskData);
    const moodChart = occurences(moodData.map(i => i['mood_status']));

    const urlParams = new URLSearchParams(window.location.search);
    const remind = urlParams.get('remind');    

    displayChart(journal, 'line', 'Journal', 
        Object.keys(journalChart), 
        Object.values(journalChart));

    displayChart(task, 'doughnut', 'Task', 
        ['To Do', 'In Progress', 'Completed'],
        Object.values(taskChart));
    
    displayChart(mood, 'pie', 'Mood', 
        Object.keys(moodChart),
        Object.values(moodChart));

    let [todo, progress] = taskChart;
    todo = todo ?? 0;
    progress = progress ?? 0;
    const uncompleted = todo + progress;

    if(uncompleted != 0 && remind) 
        setTimeout(() => {
            alert(`Welcome back, ${username}! \n You have ${uncompleted} ` +
                  `uncompleted tasks in your To-Do List. \n Make sure to ` +
                  `check your To-Do List to complete your tasks!`);
        }, 1000);
}

getData();

function displayChart(canvas, type, title, labels, data) {
    if(!data.length) {
        const message = canvas.nextElementSibling;
        message.textContent = `Add your first ${title} to view the chart`;
        return;
    }

    const context = canvas.getContext('2d');
    const chart = new Chart(context, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: title,
                data: data 
            }]
        },
        options: {
            layout: {
                width: 200,
                height: 200
            }
        }
    });
}

function occurences(list, isDate=false) {
    const total = list.length;
    const map = {};
    let count = 1;
    
    list.sort((a,b) => new Date(a) - new Date(b));

    for(let item of list) {
        if(isDate) item = new Date(item).toDateString();

        if(map[item]) map[item] += count; 
        else map[item] = count;
    }

    return map;
}

function taskProgress(list) {
    let todo = 0;
    let progress = 0;
    let completed = 0;

    for(let item of list) {
        if(item.todo)
            todo += JSON.parse(item.todo).length;
        if(item.in_progress)
            progress += JSON.parse(item.in_progress).length;
        if(item.completed)
            completed += JSON.parse(item.completed).length;
    }
   
    if(!todo && !progress && !completed) {
        return [];
    }

    return [todo, progress, completed];
}