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
        //dobavqne na klas today ako denqt e dnes
        if(i === new Date().getDate() && year === new Date().getFullYear() && month === new Date().getMonth())
        {
            days += `<div class="day today">${i}</div>`;
        }
        else
        {
            //добавяне на останалите dni
            days += `<div class="day">${i}</div>`;
        }

    }

    //dnite na sledvashtiq mesec
    for(let j = 1; j <= nextDays + 1; j++)
    {
        days += `<div class="day next-date">${j}</div>`;
    }

    daysContainer.innerHTML = days;
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

dateInput.addEventListener("keyup", (e) =>
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
})