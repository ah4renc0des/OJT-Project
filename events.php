<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .day {
            position: relative;
        }

        .event-link {
            display: block;
            background-color: #c2c5ff;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 12px;
            text-decoration: none;
            color: #000;
        }

        .event-link:hover {
            background-color: #858bff;
        }

        .calendar-box {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nav-button {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 10px;
        }

        .nav-button:hover {
            text-decoration: underline;
        }

        .modal {
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

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .modal-close {
            float: right;
            cursor: pointer;
            font-size: 20px;
            color: red;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        td.day {
            vertical-align: top;
            height: 80px;
        }
    </style>
</head>

<?php
// Function to generate the calendar
function generateCalendar($year, $month) {
    $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayOfMonth = date('w', strtotime("$year-$month-01"));

    // Calendar header
    echo '<div class="calendar-box">';
    echo '<div class="calendar-header">';
    echo '<a href="?year=' . $year . '&month=' . $month . '&prev=1" class="nav-button">Prev</a>';
    echo '<h2>' . date('F Y', strtotime("$year-$month-01")) . '</h2>';
    echo '<a href="?year=' . $year . '&month=' . $month . '&next=1" class="nav-button">Next</a>';
    echo '</div>';
    echo '<table>';
    echo '<thead><tr>';
    foreach ($daysOfWeek as $day) {
        echo "<th>$day</th>";
    }
    echo '</tr></thead><tbody><tr>';

    // Empty cells before the first day of the month
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        echo '<td></td>';
    }

    // Days of the month
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $date = "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);
        $event = isset($GLOBALS['events'][$date]) ? "<a href='#' class='event-link' data-date='$date'>{$GLOBALS['events'][$date]}</a>" : '';
        echo "<td class='day'><span>$day</span>$event</td>";

        if (($firstDayOfMonth + $day) % 7 == 0) {
            echo '</tr><tr>';
        }
    }

    // Fill remaining cells in the last row
    if (($firstDayOfMonth + $daysInMonth) % 7 != 0) {
        $remainingCells = 7 - (($firstDayOfMonth + $daysInMonth) % 7);
        for ($i = 0; $i < $remainingCells; $i++) {
            echo '<td></td>';
        }
    }

    echo '</tr></tbody></table>';
    echo '</div>';
}

// Handle navigation
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');

// Handle navigation to previous or next month
if (isset($_GET['prev'])) {
    if ($month == 1) {
        $month = 12;
        $year--;
    } else {
        $month--;
    }
} elseif (isset($_GET['next'])) {
    if ($month == 12) {
        $month = 1;
        $year++;
    } else {
        $month++;
    }
}

// Example events with details
$events = [
    '2024-08-10' => 'Community Clean-up: 10 AM - 1 PM',
    '2024-08-15' => 'Photography Workshop: 2 PM - 5 PM',
    '2024-08-25' => 'Fitness Marathon: 6 AM - 12 PM'
];
$GLOBALS['events'] = $events;
?>

<body>

<!-- Calendar and Navigation -->
<?php generateCalendar($year, $month); ?>

<!-- Modal for Event Details -->
<div class="modal" id="event-modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">x</span>
        <h3>Event on <span id="event-date"></span></h3>
        <p id="event-details">No event details available</p>
    </div>
</div>

<script>
    document.querySelectorAll('.event-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const date = this.getAttribute('data-date');
            const details = this.textContent;
            document.getElementById('event-date').textContent = date;
            document.getElementById('event-details').textContent = details;
            document.getElementById('event-modal').style.display = 'flex';
        });
    });

    function closeModal() {
        document.getElementById('event-modal').style.display = 'none';
    }
</script>

<section class="py-5">
    <div class="container">
        <?php include "events-achievements.php" ?>
    </div>
    <div class="container">
        <?php include "events-groups.php" ?>
    </div>
</section>


</body>
</html>
