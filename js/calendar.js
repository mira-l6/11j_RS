document.addEventListener('DOMContentLoaded', function() 
{
    const calendarBody = document.getElementById('calendar-body');
    const monthYear = document.getElementById('month-year');
    const prevMonth = document.getElementById('prev-month');
    const nextMonth = document.getElementById('next-month');
    
    let currentDate = new Date();

    function renderCalendar(date) 
    {
        calendarBody.innerHTML = '';
        const currentMonth = date.getMonth();
        const currentYear = date.getFullYear();

        monthYear.textContent = date.toLocaleDateString('bg-BG', { month: 'long', year: 'numeric' });

        // Get the day of the week of the first day of the month
        let firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        // Adjust for Monday as the first day of the week
        firstDayOfMonth = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1;

        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        let dateCell = 1;
        for (let i = 0; i < 6; i++) 
        {
            let row = document.createElement('tr');
            for (let j = 0; j < 7; j++) 
            {
                let cell = document.createElement('td');
                if (i === 0 && j < firstDayOfMonth) 
                {
                    cell.textContent = '';
                } 
                else if (dateCell > daysInMonth) 
                {
                    cell.textContent = '';
                } 
                else 
                {
                    cell.textContent = dateCell;
                    dateCell++;
                }
                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }
    }

    prevMonth.addEventListener('click', function() 
    {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextMonth.addEventListener('click', function() 
    {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
});
