<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.0/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 8px;
    }
</style>

<body>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Initializing FullCalendar...');

            const calendarEl = document.getElementById('calendar');
            if (!calendarEl) {
                console.error('Calendar element not found!');
                return;
            }

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                selectable: true,
                events: '../controller/events.php?action=get', // Fetch events from the backend
                eventDrop: function (info) {
                    console.log('Event drop detected:', info.event);
                    // Update event in the backend
                    $.ajax({
                        url: '../controller/events.php?action=update',
                        method: 'POST',
                        data: {
                            id: info.event.id,
                            start: info.event.start.toISOString(),
                            end: info.event.end ? info.event.end.toISOString() : null,
                        },
                        success: function (response) {
                            console.log('Event updated successfully:', response);
                            alert('Event updated!');
                        },
                        error: function (xhr) {
                            console.error('Failed to update event:', xhr.responseText);
                            alert('Failed to update event.');
                        },
                    });
                },
                eventClick: function (info) {
                    console.log('Event clicked:', info.event);
                    if (confirm('Delete this event?')) {
                        // Delete event from the backend
                        $.ajax({
                            url: '../controller/events.php?action=delete',
                            method: 'POST',
                            data: { id: info.event.id },
                            success: function (response) {
                                console.log('Event deleted successfully:', response);
                                calendar.refetchEvents();
                                alert('Event deleted!');
                            },
                            error: function (xhr) {
                                console.error('Failed to delete event:', xhr.responseText);
                                alert('Failed to delete event.');
                            },
                        });
                    }
                },
                select: function (info) {
                    console.log('New event selection:', info.startStr, info.endStr);
                    const title = prompt('Enter event title:');
                    if (title) {
                        // Add event to the backend
                        $.ajax({
                            url: '../controller/events.php?action=add',
                            method: 'POST',
                            data: {
                                title: title,
                                start: info.startStr,
                                end: info.endStr,
                            },
                            success: function (response) {
                                console.log('Event added successfully:', response);
                                calendar.refetchEvents();
                                alert('Event added!');
                            },
                            error: function (xhr) {
                                console.error('Failed to add event:', xhr.responseText);
                                alert('Failed to add event.');
                            },
                        });
                    }
                },
            });

            calendar.render();
            console.log('FullCalendar rendered successfully.');
        });
    </script>
</body>
</html>