<?php
session_start();
include 'config.php'; // Include your database connection file

// Check if book_id is provided
$book_id = isset($_GET['book_id']) ? intval($_GET['book_id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $price = htmlspecialchars(trim($_POST['price']));
    $publication_date = htmlspecialchars(trim($_POST['publication_date']));
    $genre = htmlspecialchars(trim($_POST['genre']));
    $author = htmlspecialchars(trim($_POST['author']));
    $description = htmlspecialchars(trim($_POST['description']));
    $book_id = intval($_POST['book_id']); // Ensure book_id is set correctly

    // Validate fields are not empty
    if (empty($title) || empty($price) || empty($publication_date) || empty($genre) || empty($author) || empty($description)) {
        echo "All fields are required.";
        exit;
    }

    // Check if an image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $image_name = basename($image['name']);
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $target = "../images/books/" . $image_name; // Add slash between folder and image name

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
        if (move_uploaded_file($image_tmp_name, $target)) {
            $image_path = $image_name;
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        // If no image is uploaded, keep the current image
        $image_path = htmlspecialchars($_POST['current_image']);
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE book_details SET title = ?, author = ?, publication_date = ?, genre = ?, price = ?, description = ?, image_path = ? WHERE book_id = ?");
    $stmt->bind_param("ssssdssi", $title, $author, $publication_date, $genre, $price, $description, $image_path, $book_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>
                alert("Operation successful!");
                window.location.href = "books.php";
              </script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
} else if ($book_id > 0) {
    // Fetch existing book data
    $stmt = $conn->prepare("SELECT title, author, description, publication_date, genre, price, image_path FROM book_details WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        $title = $book['title'];
        $author = $book['author'];
        $publication_date = $book['publication_date'];
        $genre = $book['genre'];
        $price = $book['price'];
        $description = $book['description'];
        $image_path = $book['image_path'];
    } else {
        echo "No book found with the provided ID.";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid book ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <style>
        body {
            background-image: url('../images/bg/4.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }
        form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
        }
        form:hover {
            transform: scale(1.05);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="file"], input[type="date"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="text"]:focus, input[type="number"]:focus, input[type="file"]:focus, input[type="date"]:focus {
            border-color: #ce7852;
        }
        input[type="submit"] {
            background-color: #ce7852;
            color: white;
            cursor: pointer;
            width: 99%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="submit"]:hover {
            background-color: #d69c78;
        }
    </style>
    <script>
        function validateForm() {
            const fields = ['title', 'price', 'publication_date', 'genre', 'author', 'description'];
            let valid = true;

            fields.forEach(field => {
                const input = document.getElementById(field);
                if (input.value.trim() === '') {
                    alert(field.replace(/_/g, ' ').toUpperCase() + ' cannot be empty!');
                    input.focus();
                    valid = false;
                    return false; // Stop the loop
                }
            });

            return valid;
        }
    </script>
</head>
<body>
    <form method="post" action="updatebook.php" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" id="book_id" name="book_id" value="<?php echo htmlspecialchars($book_id); ?>">
        <input type="hidden" id="current_image" name="current_image" value="<?php echo htmlspecialchars($image_path); ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($author); ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($genre); ?>" required>

        <label for="publication_date">Publication Date:</label>
        <input type="date" id="publication_date" name="publication_date" value="<?php echo htmlspecialchars($publication_date); ?>" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>" required>

        <label for="image">Current Image:</label><br>
        <?php if (!empty($image_path)): ?>
            <img src="../images/books/<?php echo htmlspecialchars($image_path); ?>" alt="Book Image" style="max-width: 150px;"><br><br>
        <?php else: ?>
            <p>No image available.</p>
        <?php endif; ?>

        <label for="image">Upload New Image (Optional):</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Update">
    </form>
</body>
</html>
