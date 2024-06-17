const calendar = document.querySelector(".calendar"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev"),
next = document.querySelector(".next"),
todayBtn = document.querySelector(".today-btn"),
dateInput = document.querySelector(".date-input"),
    eventDay = document.querySelector(".event-day"),
 eventDate = document.querySelector(".event-date"),
 eventsContainer = document.querySelector(".events");

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = 
[
    "Януари",
    "Февруари",
    "Март",
    "Април",
    "Май",
    "Юни",
    "Юли",
    "Август",
    "Септември",
    "Октомври",
    "Ноември",
    "Декември",
];

//zadachi po podrazbirane
let eventsArr =
[
    /*{
        day: 16,
        month: 6,
        year: 2024,
        events:
        [
            {
                title: "Изхвърли боклука",
                time: "10:00 AM"
            },
            {
                title: "Напиши си домашната",
                time: "10:00 AM"
            },
        ]
    },
    {
        day: 22,
        month: 6,
        year: 2024,
        events:
        [
            {
                title: "Изхвърли боклука 2",
                time: "10:00 AM"
            },
            {
                title: "Напиши си домашната we",
                time: "10:00 AM"
            },
        ]
    }*/
]

fetch('fetch-tasks.php')
        .then(response => response.json())
        .then(data => 
        {
            for (let i = 0; i < data.length; i++) 
            {
                const eventDate = new Date(data[i].ttime);
                eventsArr.push(
                {
                    day: eventDate.getDate(),
                    month: eventDate.getMonth() + 1,
                    year: eventDate.getFullYear(),
                    events: [{
                        title: data[i].title,
                        time: data[i].ttime 
                    }]        
                    
                });
            }
        })
        .catch(error => console.error('Error fetching events:', error));

//let eventsArr = [];


/*let fetchedTasks = [
    { task_Task: "Task 1", task_DueDate: "2024-06-13" },
    { task_Task: "Task 2", task_DueDate: "2024-06-14" },
    { task_Task: "Task 3", task_DueDate: "2024-06-15" }
];

// Add each task to the tasks array using a for loop
for (let i = 0; i < fetchedTasks.length; i++) {
    tasks.push(fetchedTasks[i]);
}

console.log(tasks);


fetch('fetch-tasks.php')
    .then(response => response.json())
    .then(data => 
        {
            eventsArr = data.map(event =>
                {
                    const eventDate = new Date(event.task_DueDate);
                    return
                    {
                        day: 22,
                        month: 6,
                        year: 2024,
                        events:
                        [
                            {
                                title: "Изхвърли боклука 2",
                                time: "10:00 AM"
            },
            {
                title: "Напиши си домашната we",
                time: "10:00 AM"
            },
        ]
                    };
                }
            );
            initCalendar(eventsArr);
        }
    );*/

//dobavqne na dni
function initCalendar()
{
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay()
    const nextDays = 7 - lastDay.getDay() - 1;

    //obnovqvane na datata gore v kalendara
    date.innerHTML = months[month] + " " + year;

    //dobavqne na dni
    let days = "";

    //dnite na predishen mesec
    for(let x = day - 1; x > 0; x--)
    {
        days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
    }

    //dnite na segashniq mesec
    for(let i = 1; i <= lastDate; i++)
    {
        //проверка дали има задача на днешния ден
        let event = false;
        eventsArr.forEach((eventObj) => 
        {
            if(eventObj.day === i && eventObj.month === month + 1 && eventObj.year === year)
            {
                event = true;
            }
        });

        //dobavqne na klas today ako denqt e dnes
        if(i === new Date().getDate() && year === new Date().getFullYear() && month === new Date().getMonth())
        {
            activeDay = i;
            getActiveDay(i);
            showEvents(i);

            //ако има задача, да се добави клас event
            //dobavqne na active na today v nachaloto
            if(event)
            {
                days += `<div class="day today active event">${i}</div>`;
            }
            else 
            {
                days += `<div class="day today active">${i}</div>`;
            }
        }
        else
        {
            //добавяне на останалите dni sled proverka
            if(event)
                {
                    days += `<div class="day event">${i}</div>`;
                }
                else 
                {
                    days += `<div class="day">${i}</div>`;
                }
        }

    }

    //dnite na sledvashtiq mesec
    for(let j = 1; j <= nextDays + 1; j++)
    {
        days += `<div class="day next-date">${j}</div>`;
    }

    daysContainer.innerHTML = days;
    //dobavqne na listener sled inicializaciq na kalendara
    addListener();
}

initCalendar();

//predishen mesec
function prevMonth()
{
    month--;
    if(month < 0)
    {
        month = 11;
        year--;
    }
    initCalendar();
}

//sledvasht mesec
function nextMonth()
{
    month++;
    if(month > 11)
    {
        month = 0;
        year++;
    }
    initCalendar();
}

//event listner na prev i next
prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);

//
todayBtn.addEventListener("click", () => 
{
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
})

dateInput.addEventListener("input", (e) =>
{
    //pozvolqvane samo na chisla
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    //nakl cherta pri 2 chisla
    if(dateInput.value.length === 2)
    {
        dateInput.value += "/";
    }
    //ne poveche ot 7 simvola
    if(dateInput.value.length > 7)
    {
        dateInput.value = dateInput.value.slice(0, 7)
    }

    if(e.inputType === "deleteContentBackward")
    {
        if(dateInput.value.length === 3)
        {
            dateInput.value = dateInput.value.slice(0, 2);
        }
    }
});

// gotoBtn.addEventListener("click", gotoDate);

//da otidesh na izbranata data
function gotoDate()
{
    const dateArr = dateInput.value.split("/");

    //validaciq na dannite
    if(dateArr.length === 2)
    {
        if(dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4)
        {
            month = dateArr[0] - 1;
            year = dateArr[1];
            initCalendar();
            return;
        }
    }
}

//dobavqne na funkciq za event listener za rendered dnite
function addListener()
{
    const days = document.querySelectorAll(".day");
    days.forEach((day) => 
    {
        day.addEventListener("click", (e) =>
        {
            //tekushtiqt den e aktiven
            activeDay = Number(e.target.innerHTML);

            //izvikvane na aktiven den sled clickvane
            getActiveDay(e.target.innerHTML);
            showEvents(Number(e.target.innerHTML));

            //premahvane na active ot veche aktiven den
            days.forEach((day) =>
            {
                day.classList.remove("active");
            });

            //pri natiskane na den ot predishniq mesec
            if(e.target.classList.contains("prev-date"))
            {
                prevMonth();
                setTimeout(() => 
                {
                    //izbirane na vsichki dni
                    const days = document.querySelectorAll(".day");

                    //sled otivaneto na den toi stava active
                    days.forEach((day) => 
                    {
                        if(!day.classList.contains("prev-date") && day.innerHTML === e.target.innerHTML)
                        {
                            day.classList.add("active");
                        }
                    });
                }, 100);
            }
            //sledvasht mesec
            else if(e.target.classList.contains("next-date"))
            {
                nextMonth();
                setTimeout(() => 
                {
                    //izbirane na vsichki dni
                    const days = document.querySelectorAll(".day");

                    //sled otivaneto na den toi stava active
                    days.forEach((day) => 
                    {
                        if(!day.classList.contains("next-date") && day.innerHTML === e.target.innerHTML)
                        {
                            day.classList.add("active");
                        }
                    });
                }, 100);
            }
            else
            {
                //ostanalite dni ot meseca
                e.target.classList.add("active");
            }
        });
    });
}

//pokazvane na subitiqta na aktivniq den i datata gore vdqsno
function getActiveDay(date)
{
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.innerHTML = dayName;
    eventDate.innerHTML = date + " " + months[month] + " " + year;
}

//pokazvane na zadachite ot suotvetniq den
//showEvents = updateEvents
function showEvents(date)
{
    let events = "";
    eventsArr.forEach((event) =>
    {
        console.log(event.events);
        //vzimane na zadachite samo ot aktivniq den
        if(date === event.day && month + 1 === event.month && year === event.year)
        {
            //pokazvane na zadachata
            event.events.forEach((event) =>
            {
                events += `
                    <div class="event">
                        <div class="title">
                            <i class="fas fa-circle"></i>
                            <h3 class="event-title">${event.title}</h3>
                        </div>
                        <div class="event-time">
                            <span class="event-time">${event.time}</span>
                        </div>
                    </div>
                    `;
            });
        }
    });

    //ako nqma zadachi
    if(events === "")
    {
        events = `
            <div class="no-event">
                <h3>Няма задачи</h3>
            </div>`;
    }

    console.log(events);
    eventsContainer.innerHTML = events;
}