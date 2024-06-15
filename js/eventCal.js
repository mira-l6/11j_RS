const calendar = document.querySelector(".calendar"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev");
next = document.querySelector(".next"),
todayBtn = document.querySelector(".today-btn"),
dateInput = document.querySelector(".date-input");

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
const eventsArr =
[
    {
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
    }
]


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

gotoBtn.addEventListener("click", gotoDate);

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