<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        #calendar-container {
            width: 90%;
            max-width: 700px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        #calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
        }

        #calendar-header button {
            background-color: #3e8e41;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }

        #calendar-header button:hover {
            background-color: #369d3f;
        }

        #calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background-color: #f4f4f9;
            text-align: center;
            font-weight: bold;
            padding: 10px 0;
        }

        #calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background-color: #ccc;
        }

        .calendar-cell {
            background: white;
            text-align: center;
            padding: 15px 0;
            cursor: pointer;
            height: 80px;
            position: relative;
        }

        .calendar-cell:hover {
            background-color: #e9f5e9;
        }

        .calendar-cell.today {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        .calendar-cell .events {
            margin-top: 5px;
            font-size: 0.9em;
            color: #555;
        }

        #event-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        #modal-content {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
        }

        #modal-content h3 {
            margin-top: 0;
        }

        #modal-content input, #modal-content button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        #modal-content button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #modal-content button:hover {
            background-color: #369d3f;
        }
    </style>
</head>
<body>
    <div id="calendar-container">
        <div id="calendar-header">
            <button id="prev-month">Previous</button>
            <h2 id="month-year"></h2>
            <button id="next-month">Next</button>
        </div>
        <div id="calendar-days">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div id="calendar-grid"></div>
    </div>

    <div id="event-modal">
        <div id="modal-content">
            <h3>Add Event</h3>
            <input type="text" id="event-title" placeholder="Event title" />
            <button id="save-event">Save Event</button>
        </div>
    </div>

    <script>
        const monthYear = document.getElementById('month-year');
        const calendarGrid = document.getElementById('calendar-grid');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');
        const modal = document.getElementById('event-modal');
        const saveEventBtn = document.getElementById('save-event');
        const eventTitleInput = document.getElementById('event-title');

        let currentDate = new Date();
        let selectedCell = null;

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            monthYear.textContent = new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            calendarGrid.innerHTML = '';

            for (let i = 0; i < firstDay; i++) {
                const cell = document.createElement('div');
                cell.className = 'calendar-cell';
                calendarGrid.appendChild(cell);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const cell = document.createElement('div');
                cell.className = 'calendar-cell';
                cell.textContent = day;

                if (year === new Date().getFullYear() && month === new Date().getMonth() && day === new Date().getDate()) {
                    cell.classList.add('today');
                }

                const eventsContainer = document.createElement('div');
                eventsContainer.className = 'events';
                cell.appendChild(eventsContainer);

                cell.addEventListener('click', () => {
                    selectedCell = cell;
                    modal.style.display = 'flex';
                });

                calendarGrid.appendChild(cell);
            }
        }

        saveEventBtn.addEventListener('click', () => {
            const eventTitle = eventTitleInput.value.trim();
            if (eventTitle && selectedCell) {
                const eventsContainer = selectedCell.querySelector('.events');
                const eventElement = document.createElement('div');
                eventElement.textContent = eventTitle;
                eventsContainer.appendChild(eventElement);

                eventTitleInput.value = '';
                modal.style.display = 'none';
            }
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        prevMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    </script>
</body>
</html>
