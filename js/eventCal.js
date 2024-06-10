const calendar = document.getElementById('calendar');
const taskModal = document.getElementById('taskModal');
const modalDate = document.getElementById('modalDate');
const taskList = document.getElementById('taskList');
const closeModal = document.getElementsByClassName('close')[0];

const tasks = {
    '2024-06-01': ['Task 1', 'Task 2'],
    '2024-06-02': ['Task 3'],
    '2024-06-05': ['Task 4', 'Task 5', 'Task 6']
};

function createCalendar(year, month) {
    calendar.innerHTML = '';
    const firstDay = new Date(year, month).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('div');
        calendar.appendChild(emptyCell);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const date = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayCell = document.createElement('div');
        dayCell.className = 'day';
        dayCell.innerHTML = `<span>${day}</span>`;

        if (tasks[date]) {
            tasks[date].forEach(task => {
                const taskDiv = document.createElement('div');
                taskDiv.className = 'task';
                taskDiv.textContent = task;
                dayCell.appendChild(taskDiv);
            });
        }

        dayCell.addEventListener('click', () => showTasks(date));
        calendar.appendChild(dayCell);
    }
}

function showTasks(date) {
    modalDate.textContent = `Tasks for ${date}`;
    taskList.innerHTML = '';

    if (tasks[date]) {
        tasks[date].forEach(task => {
            const taskItem = document.createElement('li');
            taskItem.textContent = task;
            taskList.appendChild(taskItem);
        });
    } else {
        taskList.innerHTML = '<li>No tasks</li>';
    }

    taskModal.style.display = 'block';
}

closeModal.onclick = function() {
    taskModal.style.display = 'none';
};

window.onclick = function(event) {
    if (event.target == taskModal) {
        taskModal.style.display = 'none';
    }
};

createCalendar(2024, 5);  // June 2024
