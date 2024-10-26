
<?php
include 'config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $price = htmlspecialchars($_POST['price']);
    $pb_date = htmlspecialchars($_POST['publication_date']);
    $genre = htmlspecialchars($_POST['genre']);
    $description = htmlspecialchars($_POST['description']);
    $author = htmlspecialchars($_POST['author']);
    
    $image = $_FILES['image'];
    $image_name = basename($image['name']);
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    
    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
    $target = "../images/books/" . $image_name;

    // Check file type and size
    if (!in_array($image_ext, $allowed_exts)) {
        echo "Invalid file type. Only JPG, PNG, and GIF files are allowed.";
        exit;
    }
    if ($image_size > 5 * 1024 * 1024) { // 5MB limit
        echo "File is too large. Maximum size is 5MB.";
        exit;
    }
    if ($image_error !== UPLOAD_ERR_OK) {
        echo "Error uploading file.";
        exit;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image_tmp_name, $target)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO book_details (title, author, description, publication_date, genre, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssds", $title, $author, $description, $pb_date, $genre, $price, $image_name);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
                alert('New book added successfully.');
                window.location.href='books.php';
              </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Book</title>
    <style>
        body {
            background-image: url('../images/bg/11.jpg'); /* Replace with your image URL */
            background-size: cover; /* This makes the background image cover the entire page */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            transition: background-color 0.5s ease; /* Transition for background color */
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
       input[type="text"], input[type="file"], input[type="submit"] {
    width: 94%; /* Full width */
    padding: 10px; /* Padding for inputs */
    margin-bottom: 15px; /* Spacing between inputs */
    border: 1px solid #ccc; /* Light border */
    border-radius: 5px; /* Rounded corners */
    outline: none; /* Remove the default outline */
}

input[type="text"]:focus, input[type="file"]:focus {
    border-color: #ce7852; /* Change border color on focus if needed */
}

        input[type="submit"] {
            background-color: #ce7852; /* Button background */
            color: white; /* Button text color */
            cursor: pointer; /* Pointer on hover */
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
   <form method="post" action="addnewbook.php" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        
        <label for="publication_date">Publication Date:</label>
        <input type="text" id="publication_date" name="publication_date" required>
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
       
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
        
        <input type="submit" value="Upload">
        <a class="back-link" href="books.php">Back to Books</a>

    </form>
</body>
</html>
