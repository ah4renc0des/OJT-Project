<?php
// Database connection
$host = '127.0.0.1';
$db = 'odfs_db';
$user = 'root'; // Change if your MySQL username is different
$pass = ''; // Change if your MySQL password is different
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($feedback)) {
        // Insert data into the database
        $stmt = $pdo->prepare('INSERT INTO surveyfeedback (name, email, feedback) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $feedback]);

        // Display success message
        $success = "Thank you for your feedback!";
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Feedback</title>
    <script>
        function showPopup(message, redirectUrl) {
            alert(message);
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 2000); // Redirect after 2 seconds
        }
    </script>
    <style>
        /* styles.css */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, #363457, #3d89c7);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #1b1a2c, #285880);
        }

        .success, .error {
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Survey Feedback Form</h1>
        <?php if (isset($success)) : ?>
            <div class="success"><?php echo $success; ?></div>
            <script>
                window.onload = function() {
                    showPopup("Thank you for your feedback!", "../index.php");
                };
            </script>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
