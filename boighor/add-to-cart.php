<?php
// session_start();

// // Log the incoming POST request for debugging purposes
// file_put_contents('debug.txt', json_encode($_POST));

// // Check if the request method is POST (for security)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Check if the product_id and qty are sent via AJAX
//     if (isset($_POST['product_id']) && isset($_POST['qty'])) {
//         $product_id = intval($_POST['product_id']);
//         $quantity = intval($_POST['qty']);
        
//         // Retrieve product details from the database
//         include 'dashboard/config.php'; // Ensure this file contains a working $conn variable

//         if ($conn) {
//             $stmt = $conn->prepare("SELECT title, price FROM book_details WHERE book_id = ?");
//             $stmt->bind_param("i", $product_id);
//             $stmt->execute();
//             $result = $stmt->get_result();
//             $product = $result->fetch_assoc();

//             if ($product) {
//                 // Prepare product information for the cart
//                 $cart_item = [
//                     'id' => $product_id,
//                     'title' => $product['title'],
//                     'price' => $product['price'],
//                     'quantity' => $quantity,
//                 ];

//                 // Check if cart is already created in session
//                 if (!isset($_SESSION['cart'])) {
//                     $_SESSION['cart'] = []; // Create an empty cart if it doesn't exist
//                 }

//                 // Check if the product is already in the cart
//                 $found = false;
//                 foreach ($_SESSION['cart'] as &$item) {
//                     if ($item['id'] == $product_id) {
//                         $item['quantity'] += $quantity; // Update quantity if product already exists
//                         $found = true;
//                         break;
//                     }
//                 }

//                 // If the product is not in the cart, add it
//                 if (!$found) {
//                     $_SESSION['cart'][] = $cart_item;
//                 }

//                 echo "Product added to cart successfully!";
//             } else {
//                 echo "Product not found!";
//             }
//         } else {
//             echo "Database connection failed!";
//         }
//     } else {
//         echo "Invalid product or quantity.";
//     }
// } else {
//     echo "Invalid request method.";
// }

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['qty'])) {
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['qty']);
        
        include 'dashboard/config.php';

        $stmt = $conn->prepare("SELECT title, price, image_path FROM book_details WHERE book_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product) {
            // Include image path in the cart item array
            $cart_item = [
                'id' => $product_id,
                'title' => $product['title'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image' => $product['image_path'], // Include the image path
            ];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] += $quantity;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $_SESSION['cart'][] = $cart_item;
            }

            echo "Product added to cart successfully!";
        } else {
            echo "Product not found!";
        }
    } else {
        echo "Invalid product or quantity.";
    }
} else {
    echo "Invalid request method.";
}
