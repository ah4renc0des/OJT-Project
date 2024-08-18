<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Montserrat:wght@400&display=swap');
        
        /* About Us heading style */
        .wellness-heading {
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
            font-weight: bold;
            font-size: 28px; /* Reduced font size */
            line-height: 70px; /* Reduced line height */
        }

        /* About Us text style */
        .wellness-text {
            margin: 0 0 10px 0; /* Reduced margin */
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px; /* Reduced font size */
        }

        /* HR style */
        .hr-style {
            margin: 0;
            padding: 0;
            border: none;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
        
        /* Container styles */
        #Content {
            margin: 0;
            padding: 0;
            position: relative;
        }

        .groups-section {
            background-color: #fff;
            padding: 20px; /* Reduced padding */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 20px auto; /* Reduced margin */
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 20px; /* Reduced gap */
        }

        .groups-column {
            flex: 1;
            padding: 20px; /* Reduced padding */
            background-color: #f8f8f8;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .groups-column:last-child {
            margin-right: 0; /* Remove any extra right margin from the last column */
        }

        .groups-column h2 {
            color: #333;
            margin-bottom: 15px; /* Reduced margin */
            font-size: 22px; /* Reduced font size */
        }

        .groups-column p {
            margin-bottom: 30px; /* Reduced margin */
            font-size: 14px; /* Reduced font size */
            line-height: 1.5; /* Adjusted line height */
        }

        .groups-column button {
            color: #3498db;
            border: none;
            padding: 10px 20px; /* Reduced padding */
            font-size: 14px; /* Reduced font size */
            cursor: pointer;
            border-radius: 6px; /* Reduced border radius */
            transition: background-color 0.3s ease;
        }

        .groups-column button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .groups-section {
                flex-direction: column;
            }

            .groups-column {
                margin-bottom: 15px; /* Reduced margin */
                margin-right: 0; /* Ensure no right margin on small screens */
            }
        }
    </style>
</head>
<?php
// insert code here
?>


<<body>
    <!-- Your PHP-generated table content goes here -->
    <div class="events-heading">
            Intern Groups
    </div>  
    <div class="achievements-section">   
   
        <div class="achievements-column">
            <h2>Group 1</h2>
            <p>Group details...</p>
            <button>View Details</button>
        </div>
        <div class="achievements-column">
            <h2>Group 2</h2>
            <p>Group details...</p>
            <button>View Details</button>
         </div>
        <div class="achievements-column">
            <h2>Group 3</h2>
            <p>Group details...</p>
            <button>View Details</button>
        </div>
    </div>
</body>