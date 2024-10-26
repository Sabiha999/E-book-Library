<?php

$message = '';

// Database connection
$host = 'localhost'; // your database host
$db = 'e_book'; // your database name
$user = 'root'; // your database username
$pass = ''; // your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize product details
$product = [
    'book_id' => '',
];

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure it's an integer
   
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT book_id, title, price, description, publication_date, genre, author, image_path FROM book_details WHERE book_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product exists
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
}

// Capture selected values from the URL
$selectedBookType = isset($_GET['book_type']) ? $_GET['book_type'] : '';
$selectedPrice = isset($_GET['price']) ? $_GET['price'] :''; // Default to product price
$selectedQuantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1; // Default to 1

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $book_id = (int)$_POST['book_id'];
    $total_price = (float)$_POST['total_price'];
    $quantity = (int)$_POST['quantity'];
    $address = $conn->real_escape_string($_POST['address']);
    $order_date = $conn->real_escape_string($_POST['order_date']);
    $book_type = $conn->real_escape_string($_POST['book_type']);
 
    ///NEW WORK//
     // Insert into user table
     $user_query = "INSERT INTO user_deatail (username, email) VALUES ('$username', '$email')";
     if ($conn->query($user_query) === TRUE) {
         $user_id = $conn->insert_id; // Get the user ID after inserting

         // Insert into trip table
         $book_query = "INSERT INTO book_details (book_id) VALUES ('$book_id')";
         if ($conn->query($book_query) === TRUE) {
             $book_id = $conn->insert_id; // Get the trip ID after inserting

             // Insert into booking table
             $order_query = "INSERT INTO orders (user_id, user_name, user_email, book_id ,quantity, address, order_date ,book_type , total_price) VALUES ('$user_id','$username','$email', '$book_id', '$quantity', '$address', '$order_date','$book_type','$total_price')";
             if ($conn->query($order_query) === TRUE) {
                echo '<script>
            alert("Operation successful!");
            window.location.href = "index.php";
          </script>';
             } else {
                 $message = 'Error order: ' . $conn->error;
             }
         } else {
             $message = 'Error inserting order data: ' . $conn->error;
         }
     } else {
         $message = 'Error inserting user data: ' . $conn->error;
     }

}


$conn->close();
$title = 'My Order Details';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
   
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('/boighor/images/bg/9.jpg');
            background-size: cover;
            height: 100vh;
        }

        .order-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 500px;
            margin: auto;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 60vw;
        }
    </style>
</head>

<body>

<div class="order-form-container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="p-4 rounded shadow">
        <h2 class="mb-4">Order Details</h2>
       
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="book_id">Book ID:</label>
            <input type="text" id="book_id" name="book_id" value="<?php echo htmlspecialchars($product['book_id']); ?>" class="form-control" readonly>
        </div>
       
        <div class="form-group">
            <label for="total_price">Total Price:</label>
            <input type="number" id="total_price" name="total_price" value="<?php echo htmlspecialchars($selectedPrice); ?>" class="form-control" readonly>
        </div>
       
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($selectedQuantity); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>
       
        <div class="form-group">
            <label for="order_date">Order Date:</label>
            <input type="date" id="order_date" name="order_date" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="book_type">Book Type:</label>
            <input type="text" id="book_type" name="book_type" value="<?php echo htmlspecialchars($selectedBookType); ?>" class="form-control" readonly>
        </div>
       
        <button type="submit" class="btn m-2" style="background-color:#ce5872">Place Order</button>
    </form>
</div>

</body>
</html>