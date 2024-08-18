<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Achievements</title>
    <style>
        /* Your provided CSS styles */
        .events-heading {
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
            font-weight: bold;
            font-size: 28px;
            line-height: 70px;
        }
        .events-text {
            margin: 0 0 10px 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
        }
        .hr-style {
            margin: 0;
            padding: 0;
            border: none;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
        #Content {
            margin: 0;
            padding: 0;
            position: relative;
        }
        .achievements-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 20px;
        }
        .achievements-column {
            flex: 1;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .achievements-column:last-child {
            margin-right: 0;
        }
        .achievements-column h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 22px;
        }
        .achievements-column p {
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.5;
        }
        .achievements-column button {
            color: #3498db;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        .achievements-column button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .achievements-section {
                flex-direction: column;
            }
            .achievements-column {
                margin-bottom: 15px;
                margin-right: 0;
            }
        }
    </style>
</head>

<?php 
// include("database.php"); // Include the database connection

//$tableName = "developers"; // Your table name
//$columns = ['id', 'fullName', 'gender', 'email', 'mobile', 'address', 'city', 'state'];

//function fetch_data($db, $table, $columns) {
//    $query = "SELECT " . implode(", ", $columns) . " FROM $table";
//    $result = $db->query($query);
//    return $result->fetch_all(MYSQLI_ASSOC);
// }

//$userAchievements = fetch_data($conn, $tableName, $columns);
?>

<body>
    <!-- Your PHP-generated table content goes here -->
    <div class="events-heading">
            Intern Achievements
    </div>  
    <div class="achievements-section">   
   
        <div class="achievements-column">
            <h2>User 1</h2>
            <p>Achievement details...</p>
            <button>View Details</button>
        </div>
        <div class="achievements-column">
            <h2>User 1</h2>
            <p>Achievement details...</p>
            <button>View Details</button>
         </div>
        <div class="achievements-column">
            <h2>User 1</h2>
             <p>Achievement details...</p>
             <button>View Details</button>
        </div>
    </div>
</body>
</html>
