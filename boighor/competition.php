<?php
include 'dashboard/config.php'; // Include the database connection file

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $story_title = $conn->real_escape_string($_POST['story_title']);
    
    // Assuming user_id is available; for demonstration, using a placeholder
    $user_id = 1; // Replace with actual user_id logic

    // Insert into competition_user table
    $sql = "INSERT INTO competition_user (user_id, gmail, story_name) VALUES ('$user_id', '$email', '$story_title')";
    
    if ($conn->query($sql) === TRUE) {
        $success_message = "New entry created successfully";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Short Story Competition | Books Library eCommerce Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
    padding-top: 20vh;
    background-image: url('images/bg/14.jpg'); /* Add your background image here */
    background-size: cover;
    background-position: center;
    min-height: 105vh;
}
h1, h2 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    color:#874D35 !important;
}

p, label, input, textarea {
    font-family: 'Merriweather', serif;
    font-weight: 300;
}

.competition-page {
    background: rgba(255, 255, 255, 0.9);
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    max-width: 900px;
    margin: 0 auto; /* Centers the container horizontally */
    text-align: center;
    transition: transform 0.3s ease;
    margin-bottom:5vh;
}

.competition-container {
    background:  #e1bca4 !important;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    margin: 0 auto; /* Centers the form horizontally */
    max-width: 500px; /* Limits the width to make the form more centered */
}

.competition-page:hover {
    transform: scale(1.03);
}

/* Other styles remain the same */


    h1, h2 {
        margin-bottom: 20px;
        color: #333;
    }

    p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .competition-details, .past-winners, .upcoming-events {
        margin-bottom: 30px;
    }

    ul {
        list-style-type: none;
    }

    li {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .competition-container {
        background: #f0f8ff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        text-align: left;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        font-size: 14px;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #874D35;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #ce7852;
    }
</style>
</head>
<?php include 'include/header.php'; ?>
<body>
    <div class="competition-page">
        <!-- Competition Details Section -->
        <section class="competition-details">
            <h1>Short Story Competition 2024</h1>
            <p><strong>Start Date:</strong> October 1, 2024</p>
            <p><strong>End Date:</strong> October 31, 2024</p>
            <p><strong>Theme:</strong> Adventure and Discovery</p>
            <p><strong>Prizes:</strong> Gift cards, feature on our website, and free e-books</p>
        </section>

        <!-- Competition Form Section -->
        <div class="competition-container">
            <form class="competition-form" action="" method="POST">
                <h2>Submit Your Story</h2>
                <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
                <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="story_title">Your Story Title:</label>
                <input type="text" id="story_title" name="story_title" placeholder="Enter your story title..." required>

                <button type="submit">Submit Entry</button>
            </form>
        </div>

        <!-- Past Winners Section -->
        <section class="past-winners">
            <h2>Past Winners</h2>
            <ul>
                <li><strong>2023:</strong> John Doe – "The Last Adventure"</li>
                <li><strong>2022:</strong> Jane Smith – "Through the Mist"</li>
                <li><strong>2021:</strong> Emily Brown – "Winds of Change"</li>
            </ul>
        </section>

        <!-- Upcoming Events Section -->
        <section class="upcoming-events">
            <h2>Upcoming Events</h2>
            <ul>
                <li><strong>November 2024:</strong> Poetry Writing Competition</li>
                <li><strong>December 2024:</strong> Flash Fiction Contest</li>
                <li><strong>January 2025:</strong> Best Book Review Competition</li>
            </ul>
        </section>
    </div>
</body>
</html>
