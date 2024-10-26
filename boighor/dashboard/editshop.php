<?php
session_start();
include 'config.php'; // Include your database connection file

// Check if shop_id is provided
$shop_id = isset($_GET['shop_id']) ? intval($_GET['shop_id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shop_name = htmlspecialchars(trim($_POST['shop_name']));
    $location = htmlspecialchars(trim($_POST['location']));
    $manager_name = htmlspecialchars(trim($_POST['manager_name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $contact_number = htmlspecialchars(trim($_POST['contact_number']));
    $email = htmlspecialchars(trim($_POST['email']));
    $shop_id = intval($_POST['shop_id']); // Ensure shop_id is set correctly

    // Validate fields are not empty
    if (empty($shop_name) || empty($location) || empty($manager_name) || empty($description) || empty($contact_number) || empty($email)) {
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
        $target = "../images/books/" . $image_name; // Adjust the path as needed

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
    $stmt = $conn->prepare("UPDATE shops SET shop_name = ?, location = ?, manager_name = ?, description = ?, contact_number = ?, email = ?, image_path = ? WHERE shop_id = ?");
    $stmt->bind_param("sssssssi", $shop_name, $location, $manager_name, $description, $contact_number, $email, $image_path, $shop_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>
                alert("Operation successful!");
                window.location.href = "shops.php";
              </script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
} else if ($shop_id > 0) {
    // Fetch existing shop data
    $stmt = $conn->prepare("SELECT shop_name, location, manager_name, description, contact_number, email, image_path FROM shops WHERE shop_id = ?");
    $stmt->bind_param("i", $shop_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $shop = $result->fetch_assoc();
        $shop_name = $shop['shop_name'];
        $location = $shop['location'];
        $manager_name = $shop['manager_name'];
        $description = $shop['description'];
        $contact_number = $shop['contact_number'];
        $email = $shop['email'];
        $image_path = $shop['image_path'];
    } else {
        echo "No shop found with the provided ID.";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid shop ID.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Shop</title>
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
        input[type="text"], input[type="email"], input[type="file"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="file"]:focus {
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
            const fields = ['shop_name', 'location', 'manager_name', 'description', 'contact_number', 'email',];
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
    <form method="post" action="editshop.php" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" id="shop_id" name="shop_id" value="<?php echo htmlspecialchars($shop_id); ?>">
        <input type="hidden" id="current_image" name="current_image" value="<?php echo htmlspecialchars($image_path); ?>">

        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" value="<?php echo htmlspecialchars($shop_name); ?>" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>" required>

        <label for="manager_name">Manager Name:</label>
        <input type="text" id="manager_name" name="manager_name" value="<?php echo htmlspecialchars($manager_name); ?>" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>" required>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

        <label for="image">Current Image:</label><br>
        <?php if (!empty($image_path)): ?>
            <img src="../images/books/<?php echo htmlspecialchars($image_path); ?>" alt="Shop Image" style="max-width: 150px;"><br><br>
        <?php else: ?>
            <p>No image available.</p>
        <?php endif; ?>

        <label for="image">Upload New Image (Optional):</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Update">
    </form>
</body>
</html>
