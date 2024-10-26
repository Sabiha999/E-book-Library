<?php
session_start();
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shop_name = htmlspecialchars($_POST['shop_name']);
    $location = htmlspecialchars($_POST['location']);
    $manager_name = htmlspecialchars($_POST['manager_name']);
    $description = htmlspecialchars($_POST['description']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $email = htmlspecialchars($_POST['email']);

    // Server-side validation for empty fields
    if (empty($shop_name) || empty($location) || empty($manager_name) || empty($description) || empty($contact_number) || empty($email)) {
        echo "<script>
                alert('All fields are required. Please fill out every field.');
                window.history.back();
              </script>";
        exit;
    }

    // Check if an image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Image handling code
        $image = $_FILES['image'];
        $image_name = basename($image['name']);
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $target = "../images/books/" . $image_name;

        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        // Check file type and size
        if (!in_array($image_ext, $allowed_exts)) {
            echo "Invalid file type. Only JPG, PNG, and GIF files are allowed.";
            exit;
        }
        if ($image_size > 3 * 1024 * 1024) { // 3MB limit
            echo "File is too large. Maximum size is 3MB.";
            exit;
        }
        if ($image_error !== UPLOAD_ERR_OK) {
            echo "Error uploading file.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($image_tmp_name, $target)) {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        echo "Image is required.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO shops (shop_name, location, manager_name, description, contact_number, email, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $shop_name, $location, $manager_name, $description, $contact_number, $email, $image_name);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('New shop added successfully.');
                window.location.href='shops.php';
              </script>";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Shop</title>
    <style>
        body {
            background-image: url('../images/bg/11.jpg'); /* Replace with your image URL */
            background-size: cover; /* This makes the background image cover the entire page */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            color: #fff; /* Change text color for better contrast */
        }
        form {
            max-width: 400px; /* Limit form width */
            margin: 100px auto; /* Center the form vertically and horizontally */
            padding: 20px; /* Add padding */
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            transition: transform 0.3s; /* Smooth transform transition */
        }
        form:hover {
            transform: scale(1.05); /* Scale up on hover */
        }
        label {
            display: block;
            margin-bottom: 5px; /* Spacing between label and input */
        }
        input[type="text"], input[type="email"], input[type="file"], textarea {
            width: 94%; /* Full width */
            padding: 10px; /* Padding for inputs */
            margin-bottom: 15px; /* Spacing between inputs */
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px; /* Rounded corners */
            outline: none; /* Remove the default outline */
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="file"]:focus, textarea:focus {
            border-color: #ce7852; /* Change border color on focus if needed */
        }
        input[type="submit"] {
            background-color: #ce7852; /* Button background */
            color: white; /* Button text color */
            cursor: pointer; /* Pointer on hover */
            width: 99%; /* Full width */
    padding: 10px; /* Padding for inputs */
    margin-bottom: 15px; /* Spacing between inputs */
    border: 1px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    outline: none; /* Remove the default outline */

        }
        input[type="submit"]:hover {
            background-color: #d69c78; /* Lighter shade on hover */
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ce7852; /* Link color */
            text-decoration: none; /* Remove underline */
        }
        .back-link:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <form method="post" action="addshop.php" enctype="multipart/form-data">
        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="manager_name">Manager Name:</label>
        <input type="text" id="manager_name" name="manager_name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <input type="submit" value="Add Shop" >
        <a class="back-link" href="books.php">Back to Shops</a>

    </form>
</body>
</html>
