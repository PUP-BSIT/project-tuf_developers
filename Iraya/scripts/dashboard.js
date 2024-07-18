const journal = document.querySelector('#journal');
const task = document.querySelector('#task');
const mood = document.querySelector('#mood');

const journalEndpoint = './api.php';
const taskEndpoint = './todo/api.php';
const moodEndpoint = './mood/api.php';

const urlParams = new URLSearchParams(window.location.search);
const reminder = urlParams.get('remind');

let journalData;
let taskData;
let moodData;

async function getData() {
    const journalResponse = await fetch(journalEndpoint);
    const taskResponse = await fetch(taskEndpoint);
    const moodResponse = await fetch(moodEndpoint);

    journalData = await journalResponse.json();
    taskData = await taskResponse.json(); //total progress
    moodData = await moodResponse.json(); //mood this week

    const journalChart = occurences(journalData.map(i => i[6]), true);
    const taskChart = taskProgress(taskData);
    const moodChart = occurences(moodData.map(i => i['mood_status']));

    displayChart(journal, 'line', 'Journals', 
        Object.keys(journalChart), 
        Object.values(journalChart));

    displayChart(task, 'doughnut', 'Task Progress', 
        ['To Do', 'In Progress', 'Completed'],
        Object.values(taskChart));
    
    displayChart(mood, 'pie', 'Mood Tracker', 
        Object.keys(moodChart),
        Object.values(moodChart));

    const [todo, progress] = taskChart;
    if(reminder) 
        setTimeout(() => {
            alert(`Welcome back, ${reminder}! \nYou have ${todo + progress} ` + 
                `Uncompleted Tasks in your To-Do List. \n` +
                `Make sure to check your To-Do List to complete your tasks!`);
        }, 1000);
}

getData();

function displayChart(canvas, type, title, labels, data) {
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
   
    return [todo, progress, completed];
}